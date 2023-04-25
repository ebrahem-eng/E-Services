<?php

namespace App\Http\Controllers;

use App\Models\Editing_Check;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Notification;
use App\Notifications\Employe_notifications;

class Editing_CheckController extends Controller
{
    //
    public function Show_Editing_Check_Text(){
        return view('Student/Editing_Check/Editing_Check_Text');
    }

    public function Store_Editing_Check_Text(Request $request){
        $name = $request->file('file_check_text')->getClientOriginalName();
        $path = $request->file('file_check_text')->storeAs('Editing_Check_Text',$name,'public');
    $Editing_Check=Editing_Check::create([
            'user_id'=>Auth()->user()->id,
            'Type'=>"نصوص",
            'path'=>$path
        ]);

        $users = User::where('UserType','=','Employe')->get();
        $name_user = auth()->user()->name;
          Notification::send($users,new Employe_notifications($Editing_Check->id , $name_user , $Editing_Check->Type));

        return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }

    public function Show_Editi_Check_Articles(){
        return view('Student/Editing_Check/Editi_Check_Articles');
    }
    
    public function Store_Editi_Check_Articles(Request $request){
        $name = $request->file('file_check_article')->getClientOriginalName();
        $path = $request->file('file_check_article')->storeAs('Editing_Check_Article',$name,'public');
        $Editing_Check=  Editing_Check::create([
            'user_id'=>Auth()->user()->id,
            'Type'=>"مقالات",
            'path'=>$path
        ]);
        $users = User::where('UserType','=','Employe')->get();
        $name_user = auth()->user()->name;
          Notification::send($users,new Employe_notifications($Editing_Check->id , $name_user , $Editing_Check->Type));
        return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }

    public function Show_Editing_Check_Graduation(){
        return view('Student/Editing_Check/Editing_Check_Graduation');
    }

    public function Store_Editing_Check_Graduation(Request $request){
        $name = $request->file('file_check_graduation')->getClientOriginalName();
        $path = $request->file('file_check_graduation')->storeAs('Editing_Check_Graduation',$name,'public');
        $Editing_Check= Editing_Check::create([
            'user_id'=>Auth()->user()->id,
            'Type'=>"مشاريع تخرج",
            'path'=>$path
        ]);
        $users = User::where('UserType','=','Employe')->get();
        $name_user = auth()->user()->name;
          Notification::send($users,new Employe_notifications($Editing_Check->id , $name_user , $Editing_Check->Type));
        return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }

    public function Show_Editing_Check_Research(){
    return view('Student/Editing_Check/Editing_Check_Research');
    }

    public function Store_Editing_Check_Research(Request $request){
        $name = $request->file('file_check_research')->getClientOriginalName();
        $path = $request->file('file_check_research')->storeAs('Editing_Check_Research',$name,'public');
        $Editing_Check= Editing_Check::create([
            'user_id'=>Auth()->user()->id,
            'Type'=>"ابحاث",
            'path'=>$path
        ]);
        $users = User::where('UserType','=','Employe')->get();
        $name_user = auth()->user()->name;
          Notification::send($users,new Employe_notifications($Editing_Check->id , $name_user , $Editing_Check->Type));
        return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }
}
