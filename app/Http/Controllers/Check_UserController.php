<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Check_UserController extends Controller
{
    //
    public function CheckUserType()
    {
       
        if(!Auth::user())
        {
            return redirect()->route('welcome');
        }
        if(Auth::user()->UserType === 'Admin'){
            return redirect()->route('admin.dashboard');
        }
        if(Auth::user()->UserType === 'User'){
            return redirect()->route('dashboard');
        }

        if(Auth::user()->UserType === 'Employe'){
            return redirect()->route('employe.dashboard');
        }
      
    }
}
