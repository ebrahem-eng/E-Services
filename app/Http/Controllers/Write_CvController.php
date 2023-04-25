<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\User;
use App\Models\Write_Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Employe_notifications;

class Write_CvController extends Controller
{
    //
    public function Show_Write_Cv(){
        return view('Student/Write_Cv/Write_Cv');
    }
    public function Store_Write_Cv(Request $request)
    {
        $name = $request->file('file_write_cv')->getClientOriginalName();
        $path = $request->file('file_write_cv')->storeAs('Certificate_Write_Cv',$name,'public');
       $write_cv = Write_Cv::create([
            'name'=>$request->name,
            'user_id'=>Auth()->user()->id,
            'language'=>$request->language,
            'details'=>$request->deatils,
            'Acadimic'=>$request->acadimic,
            'Jop'=>$request->jop,
            'Courses'=>$request->course,
            'Skils'=>$request->skils,
            'hobbies'=>$request->hobbies,
            'zakst'=>$request->zakst,
            'path'=>$path
        ]);
         
        $users = User::where('UserType','=','Employe')->get();
        $name_user = auth()->user()->name;
          Notification::send($users,new Employe_notifications($write_cv->id , $name_user , $write_cv->name));
        

        return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }
}
