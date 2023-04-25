<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Write_Market_Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Employe_notifications;
class Content_WritingController extends Controller
{
    //
    public function Show_Market_content(){
        return view('Student/Content_Writing/Market_content');
    }

    public function Store_Market_content(Request $request)
    {
   $Write_Market_Content=  Write_Market_Content::create([
        'name'=>$request->name,
        'user_id'=>Auth()->user()->id,
        'About_Of_Content'=>$request->about_content
     ]);
     
     $users = User::where('UserType','=','Employe')->get();
     $name_user = auth()->user()->name;
       Notification::send($users,new Employe_notifications($Write_Market_Content->id , $name_user , $Write_Market_Content->name));
     return redirect()->back()->with("message" , "تم رفع الطلب بنجاح");
    }
}
