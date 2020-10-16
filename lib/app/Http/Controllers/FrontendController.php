<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FrontendController extends Controller
{
    public function getHome(){
        //san pham moi 
        $data['featured'] = Product::where('prod_featured',1)->orderBy('prod_id','desc')->take(8)->get();
        // dd($data['featured']);

        $data['new']= Product::orderBy('prod_id','desc')->take(8)->get();
        // dd($data['new']);
        $data['catelist'] = Category::all();
        // dd($data['catelist']);
        return view('frontend.home',$data);
    }
    public function getDetails($id){
        //get list categories
        $data['catelist'] = Category::all();
        $data['item'] =Product::find($id);
        return view('frontend.details',$data);
    }
}
