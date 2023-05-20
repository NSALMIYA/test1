<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\SmsHelper ;


use Auth;

class MainController extends Controller
{
    public function checklogin(Request $request)
    {
        $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
        ]);
        $data = Auth::guard('adminss')->attempt(['email' => $request->email, 'password' => $request->password]);
        if (!empty($data)) {

            // SmsHelper::sendSms(Auth::user()->phone);
            
            return view('carlist',compact('data'));
        } else {
            return back()->with('error', 'Wrong Login Details');
        }
    }
}
