<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Card;

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
            $user_id = Auth::id();
            $cardcount = Card::where('user_id',$user_id)->count();
            return view('home',compact("data","datachef","cardcount"));
        }
    }

    public function addcard(Request $req,$id){
        if(Auth::id()){
            $user_id = Auth::id();
            $food_id = $id;
            $quantity = $req->quantity;

            $card = new Card();
            $card->user_id = $user_id;
            $card->food_id = $food_id ;
            $card->qty_id = $quantity;
            $card->save();


            return redirect()->back();
        }
        else{
            return redirect('/login');
        }
    }

}
