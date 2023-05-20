<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user', compact('users')); 
    }

    public function addUser(Request $request)
    {
        $rules = [
            'first_name'=>'required',
            'email' => 'required|email|unique:users',
            'phone'=>'required',
            'country'=>'required',
            'city'=>'required',
            'state'=>'required',
            'address1'=>'required',
        ];
        $requestData = $request->all();    
        unset($requestData['_token']);
        $validator = Validator::make($requestData, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {

            $user = [
                'name'=>$request->first_name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'country'=>$request->country,
                'city'=>$request->city,
                'state'=>$request->state,
                'address'=>$request->address1 . ',' . $request->address2,
                'password'=>$request->password,
            ];

            User::insert($user);
            return Redirect::back()->withErrors(['msg' => 'User Added Successfully.']);
        }
    }

    public function edituser($id)
    {
        $users = User::where('id', $id)->first();
        return view('edituser', compact('users')); 
    }

    public function updateUser(Request $request)
    {
        $rules = [
            'first_name'=>'required',
            'email' => 'required|email|unique:users,email,'.$request->userID,
            'phone'=>'required',
            'country'=>'required',
            'city'=>'required',
            'state'=>'required',
            'address1'=>'required',
        ];
        $requestData = $request->all();    
        unset($requestData['_token']);
        $validator = Validator::make($requestData, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $user = [
                'name'=>$request->first_name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'country'=>$request->country,
                'city'=>$request->city,
                'state'=>$request->state,
                'address'=>$request->address1 . ',' . $request->address2,
            ];

            User::where('id',$request->userID)->update($user);
            return redirect('welcome')->withErrors(['msg' => 'User Updated Successfully.']);
        }
    }

    public function deleteuser($id)
    {
        User::where('id',$id)->delete();
        return Redirect::back()->withErrors(['msg' => 'Delete User Successfully.']);
    }

    public function softdelete($id)
    {
        User::find($id)->delete();
        return Redirect::back()->withErrors(['msg' => 'Soft delete Successfully.']);
    }

}
