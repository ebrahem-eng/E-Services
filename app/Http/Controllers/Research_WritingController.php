<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Write_Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Employe_notifications;

class Research_WritingController extends Controller
{
    //
    public function Show_Research_Academic(){
        return view('Student/Research_Write/Research_Academic');
       
    }
    public function Store_Research_Academic(Request $request)
    {
       $Write_Research= Write_Research::create([
            'Title'=>$request->title,
            'user_id'=>Auth()->user()->id,
            'Type'=>"اكاديمي",
            'Secound_Title'=>$request->secound_title,
        ]);


    $users = User::where('UserType','=','Employe')->get();
    $name_user = auth()->user()->name;
      Notification::send($users,new Employe_notifications($Write_Research->id , $name_user , $Write_Research->Title));

        return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }

    public function Show_Research_Scientific(){
        return view('Student/Research_Write/Research_Scientific');
    }

    public function Store_Research_Scientific(Request $request)
    {
        $Write_Research= Write_Research::create([
            'Title'=>$request->title,
            'user_id'=>Auth()->user()->id,
            'Type'=>"علمي",
            'Secound_Title'=>$request->secound_title,
        ]);

        $users = User::where('UserType','=','Employe')->get();
        $name_user = auth()->user()->name;
          Notification::send($users,new Employe_notifications($Write_Research->id , $name_user , $Write_Research->Title));
        return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }

    public function Show_Research_Economic()
    {
        return view('Student/Research_Write/Research_Economic');
    }

    public function Store_Research_Economic(Request $request)
    {
        $Write_Research = Write_Research::create([
            'Title'=>$request->title,
            'user_id'=>Auth()->user()->id,
            'Type'=>"اقتصادي",
            'Secound_Title'=>$request->secound_title,
        ]);

        $users = User::where('UserType','=','Employe')->get();
        $name_user = auth()->user()->name;
          Notification::send($users,new Employe_notifications($Write_Research->id , $name_user , $Write_Research->Title));
        return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }

    public function Show_Research_Legal()
    {
        return view('Student/Research_Write/Research_Legal');
    }


    public function Store_Research_Legal(Request $request)
    {
        $Write_Research = Write_Research::create([
            'Title'=>$request->title,
            'user_id'=>Auth()->user()->id,
            'Type'=>"قانوني",
            'Secound_Title'=>$request->secound_title,
        ]);

        $users = User::where('UserType','=','Employe')->get();
        $name_user = auth()->user()->name;
          Notification::send($users,new Employe_notifications($Write_Research->id , $name_user , $Write_Research->Title));
        return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }


    public function Show_Research_Seminars(){
        return view('Student/Research_Write/Research_Seminars');
    }

    public function Store_Research_Seminars(Request $request)
    {
        $Write_Research =   Write_Research::create([
            'Title'=>$request->title,
            'user_id'=>Auth()->user()->id,
            'Type'=>"حلقات بحث",
            'Secound_Title'=>$request->secound_title,
        ]);

        $users = User::where('UserType','=','Employe')->get();
        $name_user = auth()->user()->name;
          Notification::send($users,new Employe_notifications($Write_Research->id , $name_user , $Write_Research->Title));
        return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }
}

