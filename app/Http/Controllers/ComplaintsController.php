<?php

namespace App\Http\Controllers;

use App\Models\Complaints;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{
    //

    public function Store_Complaints(Request $request)
    {
        Complaints::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message
        ]);

        return redirect()->back()->with('message','The Complaint Has Been Added Successfully');
    }

    public function Employe_Complaints(){
        $complaints = Complaints::get();

        return view('Employe/Employe_Complaints' , compact('complaints'));
    }
}
