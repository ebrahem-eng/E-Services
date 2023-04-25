<?php

namespace App\Http\Controllers;

use App\Models\Power_Point;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Employe_notifications;
class PowerPointController extends Controller
{
    //
    public function Show_PowerPoint(){
        return view('Student/PowerPoint/PowerPoint');
    }

    public function Store_PowerPoint(Request $request){
    $power_point = Power_Point::create([
        'user_id'=>Auth()->user()->id,
        'Title'=>$request->title,
        'Language'=>$request->language,
        'Secound_Title'=>$request->secound_title
    ]);

    $users = User::where('UserType','=','Employe')->get();
    $name_user = auth()->user()->name;
      Notification::send($users,new Employe_notifications($power_point->id , $name_user , $power_point->name));
    return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }
}
