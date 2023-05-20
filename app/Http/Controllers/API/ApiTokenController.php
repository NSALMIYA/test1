<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Auth;

use App\Helpers\EmailHelper ;
use App\Helpers\SmsHelper ;




class ApiTokenController extends Controller
{

    public function login(Request $request)
    {
       
        try {
            $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
            if ($request->email) {
                $user = User::where('email', $request->email)->first();
                if (empty($user)) {
                    return response([
                'msg' => 'User not exist.',
                          ], 500);
                }
            } else {
                $user = User::where('email', $request->email)->first();
            }

            if (!$user || !Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
            }
            
            $token = $user->createToken($request->email)->plainTextToken;

            // send SMS 
            
            //  SmsHelper::sendSms(Auth::user()->phone)
            
            return response([
                   'token_type' => 'Bearer',
                   'access_token' => $token,
                   'user' => $user,
                   ], 200)
                  ->header('Content-Type', 'text/plain')
                  ->header('X-Custom-header', 'hey');
        } catch (\Exception $e) {
            return response([
                    'msg' => $e->getMessage(),
                
                          ], 500);
        }
    }

    public function forgotpassword(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'user_device_id' => 'required',
           
        ]);
        try {
            if ($validator->fails()) {
                return response()->json([
                    'msg' => $validator->errors()->first(),
                ], 400);
            }
            // send SMS EMAIL
            //  EmailHelper::sendEmail(Auth::user()->email)
          
            return response([
                'msg' => 'You have successfully.',
                'user'=> Auth::user()
            ], 200);
        } catch (\Exception $e) {
            return response([
                
                'msg' => 'Something went wrong',
                 ], 500);
        }
    }

    


    
}
