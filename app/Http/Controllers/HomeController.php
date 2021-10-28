<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Card;
use App\Models\Order;

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

    public function showcard($id){
        $cardcount = Card::where('user_id',$id)->count();

        $data = Card::where('user_id',$id)->join('Food','Cards.food_id',"=",'Food.id')->get();
        $data2 = Card::select('*')->where('user_id','=',$id)->get();

        return view('showcard',compact('cardcount','data','data2'));
    }

    public function removeincard($id){
        $data = Card::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function orderconfirm(Request $req){
        foreach($req->foodname as $key => $foodname){
            $data = new Order;
            $data->foodname = $foodname;
            $data->price = $req->price[$key];
            $data->quantity = $req->quantity[$key];
            $data->name = $req->name;
            $data->phonenumber = $req->phonenumber;
            $data->address = $req->address;
            $data->save();
        }
        return redirect()->back();
    }

}
