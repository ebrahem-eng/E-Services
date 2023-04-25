<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Write_Artical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Employe_notifications;
class Articles_WritingController extends Controller
{
    //
    public function Show_Academic_Articles(){
        return view('Student/Articles_Write/Academic_Articles');
    }

    public function Store_Academic_Articles(Request $request)
    {
  $Write_Artical =  Write_Artical::create([
        'Title'=>$request->title,
        'user_id'=>Auth()->user()->id,
        'Type'=>"اكاديمية",
        'Secound_Title'=>$request->secound_title,
     ]);

     $users = User::where('UserType','=','Employe')->get();
     $name_user = auth()->user()->name;
       Notification::send($users,new Employe_notifications($Write_Artical->id , $name_user , $Write_Artical->Title));

     return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }
//
    public function Show_Literary_Articles()
    {
        return view('Student/Articles_Write/Literary_Articles');
    }

    public function Store_Literary_Articles(Request $request)
    {
        $Write_Artical = Write_Artical::create([
        'Title'=>$request->title,
        'user_id'=>Auth()->user()->id,
        'Type'=>"ادبية",
        'Secound_Title'=>$request->secound_title,
     ]);
     $users = User::where('UserType','=','Employe')->get();
     $name_user = auth()->user()->name;
       Notification::send($users,new Employe_notifications($Write_Artical->id , $name_user , $Write_Artical->Title));
     return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }
//
    public function Show_Technique_Articles()
    {
        return view('Student/Articles_Write/Technique_Articles');
    }

    public function Store_Technique_Articles(Request $request)
    {
        $Write_Artical = Write_Artical::create([
        'Title'=>$request->title,
        'user_id'=>Auth()->user()->id,
        'Type'=>"تقنية",
        'Secound_Title'=>$request->secound_title,
     ]);

     $users = User::where('UserType','=','Employe')->get();
     $name_user = auth()->user()->name;
       Notification::send($users,new Employe_notifications($Write_Artical->id , $name_user , $Write_Artical->Title));
     return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }

    public function Show_Marketing_Articles(){
        return view('Student/Articles_Write/Marketing_Articles');
    }

    public function Store_Marketing_Articles(Request $request)
    {
        $Write_Artical = Write_Artical::create([
        'Title'=>$request->title,
        'user_id'=>Auth()->user()->id,
        'Type'=>"تسويقية",
        'Secound_Title'=>$request->secound_title,
     ]);

     $users = User::where('UserType','=','Employe')->get();
     $name_user = auth()->user()->name;
       Notification::send($users,new Employe_notifications($Write_Artical->id , $name_user , $Write_Artical->Title));
     return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }
}
