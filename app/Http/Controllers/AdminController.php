<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Pipeline;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;
use App\Actions\Fortify\AttemptToAuthenticate;
use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable;
use App\Http\Responses\Admin\LoginResponse;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Cast\String_;

class AdminController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function LoginForm(){
        return view('auth.login',['guard'=>'admin']);
    }

    /**
     * Show the login view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LoginViewResponse
     */
    public function create(Request $request): LoginViewResponse
    {
        return app(LoginViewResponse::class);
    }

    /**
     * Attempt to authenticate a new session.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return mixed
     */
    public function store(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            return app(LoginResponse::class);
        });
    }

    /**
     * Get the authentication pipeline instance.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Pipeline\Pipeline
     */
    protected function loginPipeline(LoginRequest $request)
    {
        if (Fortify::$authenticateThroughCallback) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                call_user_func(Fortify::$authenticateThroughCallback, $request)
            ));
        }

        if (is_array(config('fortify.pipelines.login'))) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                config('fortify.pipelines.login')
            ));
        }

        return (new Pipeline(app()))->send($request)->through(array_filter([
            config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
            Features::enabled(Features::twoFactorAuthentication()) ? RedirectIfTwoFactorAuthenticatable::class : null,
            AttemptToAuthenticate::class,
            PrepareAuthenticatedSession::class,
        ]));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LogoutResponse
     */
    public function destroy(Request $request): LogoutResponse
    {
        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }

    public function Store_Add_Employe(Request $request){
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'UserType'=>'Employe',
            'password'=>Hash::make('password'),
        ]);
        return redirect()->back()->with("message" , "تم اضافة الموظف بنجاح");
    }

    //عرض جدول الموظفين

    public function Show_Employe(){
        $employe = User::get()->where('UserType','=','Employe');
        return view('Admin/Show_Employe',compact('employe'));
    }

    public function Employe_GivePowers(){
        $employe = User::get()->where('UserType','=','Employe');
        return view('Admin/Employe_GivePowers',compact('employe'));
    }

    public function Delete_Employe($id){
        User::findorfail($id)->delete();
        return redirect()->back();
    }
    
    //<========Archives======>

    
    public function Get_Employe_Archives(){
        $employedelete = User::onlyTrashed()->get()->where('UserType','=','Employe');
        return view('Admin/Employe_Archives',compact('employedelete'));
    }



    public function Restore_Employe_Archives($id)
    {
        User::withTrashed()->where('id',$id)->restore();
        return redirect()->back();
    }


    public function Force_Employe_Archives($id)
    {
        User::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back();
    }



   public function Edite_Employe($id){
    $editemploye = User::where('id',$id)->first();
    return view('Admin/Edite_Employe',compact('editemploye'));
   }



   public function Update_Employe(Request $request ,$id){
        $updatemploye = User::findorFail($id);
        $updatemploye->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        return redirect()->back();
   }
   //<=============end archives==========>



   //<============ Analaytic section ===========>



       //عرض صفحة البيانات التحليلة

       public function Show_Analytical_Data(){
        $user_number = User::where('UserType','User')->count();
        $employe_number = User::where('UserType','Employe')->count();
        $order = DB::select('SELECT 
        (SELECT COUNT(id) FROM translate__graduations ) as table1Count, 
        (SELECT COUNT(id) FROM translate__cvs ) as table2Count,
        (SELECT COUNT(id) FROM write__market__contents ) as table3Count');
        //return $order;
       return view('Admin/Analytical_Data',compact('user_number','employe_number','order'));
       }
  
   
}
