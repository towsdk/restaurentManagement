<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\FoodMenu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $datas = FoodMenu::all();
        $chefs = Chef::all();
        return view('home', compact('datas','chefs'));
    }

    public function redirects(){
        $usertype = Auth::user()->usertype;
       
        $datas = FoodMenu::all();
        $chefs = Chef::all();

        if($usertype == '0'){
            $user_id = Auth::id();
        $count = Cart::where('user_id', $user_id)->count();
            return view('home', compact('datas','chefs', 'count'));
        }
        if($usertype == '1'){
            return view('admin.adminhome');
        }
    }

    public function addcart(Request $request, $id){
        if(Auth::id()){
            $user_id = Auth::id();
            $foodid = $id;
            $quantity = $request->quantity;

            $cart = new Cart();
            $cart->user_id = $user_id;
            $cart->food_id = $foodid;
            $cart->quantity = $quantity;
             $cart->save();
            return redirect()->back();
        }else{
            return redirect('/login');
        }
    }

  public function showcart(Request $request, $id){


    $count = Cart::where('user_id', $id)->count();
    $data2 = Cart::select('*')->where('user_id', '=', $id)->get();
    $datas = Cart::where('user_id', $id)->join('food_menus', 'carts.food_id', '=', 'food_menus.id')->get();
    return view('showcart', compact('count', 'datas', 'data2'));
  }

  public function remove($id){
    $data = Cart::find($id);

    $data->delete();

    return redirect()->back();
  }

  public function orderconfirm(Request $request){

    foreach($request->foodname as $key => $foodname)
    {
        $data = new Order();
        $data->foodname = $foodname;
        $data->price = $request->price[$key];
        $data->quantity = $request->quantity[$key];
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address = $request->address;

        $data->save();
    }
    return redirect()->back();
  }

}
