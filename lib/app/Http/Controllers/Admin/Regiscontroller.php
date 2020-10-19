<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Regiscontroller extends Controller
{
    public function getRegis(){
        return view('backend.register');
    }
    public function postRegis(Request $request){
        $name = $request ->input("name");
        $email = $request ->input("email");
        $password = $request ->input("password");
        $user = User::where('email',$email)->first();

        if($user){
            return back()->withInput()->with('error','Email này đã tồn tại');
        }
        if($email =='' || $name =='' || $password==''){
            return back()->withInput()->with('error','Các trường không đươc để trống');
        }
        else{
            $userr = new User;
            $userr ->name = $name;
            $userr ->email = $email;
            $userr ->password = Hash::make($password);
            $userr ->level = 1;
            $userr ->save();
            return redirect()->intended('login');
        }

    }
}
