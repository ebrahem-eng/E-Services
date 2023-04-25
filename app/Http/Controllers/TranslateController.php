<?php

namespace App\Http\Controllers;

use App\Http\Requests\Translate_Cv as RequestsTranslate_Cv;
use App\Models\Translate_Cv;
use App\Models\Translate_Graduation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use App\Notifications\Employe_notifications;
use App\Notifications\Order as NotificationsOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;


class TranslateController extends Controller
{
    //
    public function Show_Final_Project()
    {
        return view('Student/Translate/Final_project');
    }

    public function Store_Final_Project(Request $request)
    {
        $name = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('Translate_Final_Project',$name,'public');
      $translate_graduation = Translate_Graduation::create([
        'name'=>$request->name,
        'user_id'=> Auth()->user()->id,
        'Translate_From'=>$request->Translate_from,
        'Translate_To'=>$request->Translate_to,
        'path'=>$path,
      ]);

      $users = User::where('UserType','=','Employe')->get();
      $name_user = auth()->user()->name;
        Notification::send($users,new Employe_notifications($translate_graduation->id , $name_user , $translate_graduation->name));
      return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }


    public function Show_Cv_translate()
    {
        return view('Student/Translate/Cv_translate');
    }

    public function Store_Cv_translate(Request $request)
    {
  
        $name = $request->file('file_translate_cv')->getClientOriginalName();
        $path = $request->file('file_translate_cv')->storeAs('Translate_Cv',$name,'public');
        $translate_cv = Translate_Cv::create([
            'name'=>$request->name,
            'user_id'=> Auth()->user()->id,
            'path'=>$path,
        ]);

        $users = User::where('UserType','=','Employe')->get();
        $name_user = auth()->user()->name;
          Notification::send($users,new Employe_notifications($translate_cv->id , $name_user , $translate_cv->name));
        return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }


   // public function Read_notification($id){
    //  $get_id = DB::table('notifications')->where('data->id_translate',$id)->pluck('id');
    //  DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
     // return redirect()->route('employe.dashboard');
   //}
    
}
