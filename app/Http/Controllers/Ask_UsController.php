<?php

namespace App\Http\Controllers;

use App\Models\Ask_Us;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Employe_notifications;
class Ask_UsController extends Controller
{
    //
    public function Show_Ask_Us(){
        return view('Student/Ask_Us/Ask_Us');
    }

    public function Store_Ask_Us(Request $request)
    {
     $Ask_Us = Ask_Us::create([
            'user_id'=>Auth()->user()->id,
            'Title'=>$request->title
        ]);

        $users = User::where('UserType','=','Employe')->get();
        $name_user = auth()->user()->name;
          Notification::send($users,new Employe_notifications($Ask_Us->id , $name_user , $Ask_Us->name));

        return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }
}
