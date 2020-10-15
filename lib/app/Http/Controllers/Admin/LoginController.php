<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginController extends Controller
{
    public function getLogin(){
        return view('backend.login');
    }

    public function postLogin(Request $request){
        $email = $request ->input("email");
        $password = $request ->input("password");
        // validate email , password
        // client use bootstrap valdidate empty

        $user = User::where("email",$email)->first();
        if(!$user){
            return back()->withInput()->with('error','Người dùng không tồn tại');
        }
        
        if(Hash::check($password , $user ->password)){
            //  dd('Đăng nhập thành công ');
            return redirect()->intended('admin/home');
        }
        else{
            //  dd('Đăng nhập thất bại');
            return back()->withInput()->with('error','Tài khoản hoặc mật khẩu chưa chính xác');
        }
       
    }
}
