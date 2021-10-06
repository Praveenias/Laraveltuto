<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Food;
use App\Models\Foodchef;

class HomeController extends Controller
{
    //
    public function index(){
        $data = Food::all();
        $datachef = Foodchef::all();
        return view('home',compact("data","datachef"));
    }
    public function redirects(){
        $datachef = Foodchef::all();
        $usertype = Auth::user()->usertype;
        $data = Food::all();

        if($usertype=="1"){
            return view('admin.adminhome');
        }

        else{
            return view('home',compact("data","datachef"));
        }
    }

}
