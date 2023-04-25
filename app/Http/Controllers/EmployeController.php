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
use App\Http\Responses\Employe\LoginResponse;
use App\Models\Ask_Us;
use App\Models\Editing_Check;
use App\Models\Power_Point;
use App\Models\Translate_Cv;
use App\Models\Translate_Graduation;
use App\Models\Write_Artical;
use App\Models\Write_Cv;
use App\Models\Write_Market_Content;
use App\Models\Write_Research;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
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
        return view('auth.login',['guard'=>'employe']);
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

    
//الصفحة الرئيسية
     public function Employe_Dashboard()
     {
        return view('Employe/Employe_Dashboard');
     }


//صفحة ترجمة مشاريع التخرج
     public function Employe_Translate_graduation()
     {
    
        $graduation_Order = Translate_Graduation::with('user')->get();
       

        return view('Employe/Employe_Translate_graduation',compact('graduation_Order'));

     }

     //صفحة ترجمة السيرة الذاتية
    
     public function Employe_Translate_Cv()
     {
        $cv_order = Translate_Cv::with('user')->get();
        return view('Employe/Employe_Translate_Cv',compact('cv_order'));
     }
  
     //صفحة كتابة المحتوى

     public function Employe_Write_Content(){
        $market_content = Write_Market_Content::with('user')->get();

        return view('Employe/Employe_Write_Content',compact('market_content'));
     }
    
    //صفحة كتابة المقالات 

    public function Employe_Write_Article(){
        $write_article = Write_Artical::with('user')->get();
        return view('Employe/Employe_Write_Article',compact('write_article'));
    }

    //صفحة كتابة الابحاث

    public function Employe_Write_Research()
    {
        $write_research = Write_Research::with('user')->get();

        return view('Employe/Employe_Write_Research',compact('write_research'));
    }

    //صفحة التدقيق والتحرير اللغوي

    public function Employe_Edit_Check(){
        $edit_check = Editing_Check::with('user')->get();

        return view('Employe/Employe_Edit_Check',compact('edit_check'));
    }

//صفحة التحكيم والاستشارة
    public function Employe_Ask_Us(){
        $ask_us = Ask_Us::with('user')->get();

        return view('Employe/Employe_Ask_Us',compact('ask_us'));
    }

    //صفحة كتابة السيرة الذاتية

    public function Employe_Write_Cv(){
        $write_cv = Write_Cv::with('user')->get();

        return view('Employe/Employe_Write_Cv',compact('write_cv'));
    }

    //صفحة العروض التقديمية

    public function Employe_Power_Point(){

        $power_point = Power_Point::with('user')->get();

        return view('Employe/Employe_Power_Point',compact('power_point'));
    }

   

   
}
