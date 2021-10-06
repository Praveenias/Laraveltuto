<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Food;
use App\Models\reservation;
use App\Models\Foodchef;

class AdminController extends Controller
{
    //
    public function user(){
        $data = user::all();
        return view("admin.users",compact("data"));
    }

    public function deleteuser($id){
        $data = user::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function foodmenu(){
        $data = Food::all();
        return view("admin.foodmenu",compact("data"));
    }

    public function upload(Request $req){
        
        $data = new Food;

        $image = $req->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $req->image->move('foodimage',$imagename);

        $data->image=$imagename;
        $data->title=$req->title;
        $data->price=$req->price;
        $data->description=$req->description;
        $data->save();
        return redirect()->back();
    }

    public function deletefoodmenu($id){
        $data = Food::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function getfoodmenu($id){
        $data = Food::find($id);
        return view("admin.editfoodmenu",compact("data"));
    }

    public function updatefood(Request $req,$id){
        $data = Food::find($id);
        $data->title=$req->title;
        $data->price=$req->price;
        $data->description=$req->description;
        $data->save();
        
        return redirect("foodmenu");
    }

    public function reservation(Request $req){
        $data = new reservation;
        $data->name=$req->name;
        $data->email=$req->email;
        $data->number=$req->phone;
        $data->guest=$req->numberguests;
        $data->date=$req->date;
        $data->time=$req->time;
        $data->message=$req->message;
        $data->save();
        return redirect()->back();
    }

    public function getreservation(){
        $data = reservation::all();
        return view("admin.reservation",compact("data"));
    }

    public function foodchef(){
        $data = Foodchef::all();
        return view("admin.foodchef",compact("data"));
    }

    public function createchef(Request $req){
        $data = new Foodchef;
        $image = $req->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $req->image->move('foodimage',$imagename);

        $data->image=$imagename;
        $data->name=$req->name;
        $data->special=$req->special;
        $data->save();
        return redirect()->back();
    }

    public function deletefoodchef($id){
        $data = Foodchef::find($id);
        $data->delete();
        return redirect()->back();
    }


}
