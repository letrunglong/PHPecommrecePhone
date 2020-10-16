<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class HomeController extends Controller
{
    public function getHome(){
        return view('backend.index');
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->intended('login');
    }
}
