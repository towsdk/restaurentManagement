<?php

namespace App\Http\Controllers;

use App\Models\FoodMenu;
use App\Models\Chef;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users(){
        $datas = User::all();
        return view('admin.users', compact("datas"));
    }

    public function deleteuser($id){
        $deleteData = User::find($id);
        $deleteData->delete();
        return redirect()->back();
    }

   public function updateMenu($id){
           //return $id;
            $data = FoodMenu::find($id);
            return view('admin.updateview', compact('data'));
   }

   public function deleteMenu($id){
    ////return $id;
    $deleteMenu = FoodMenu::find($id);
    $deleteMenu->delete();
    return redirect()->back();
}
    public function foodmenu(){
        $datas = FoodMenu::orderBy('id', 'DESC')->get();
        return view('admin.foodmenu', compact('datas'));
    }

    public function uploadfood(Request $request){
        $data = new FoodMenu();

        $image = $request->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        $data->image = $imagename;

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;

        $data->save();

        return redirect()->back();
    }

  

    public function update(Request $request, $id)
    {
        $data = FoodMenu::find($id);

        $image = $request->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        $data->image = $imagename;

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;

        $data->save();

        return redirect()->back();
    }
   


    public function reservation(Request $request)
    {
        $data = new Reservation();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;

        $data->save();

        return redirect()->back();
    }

 

    public function customerreservation (){
        $datas = Reservation::all();

       return view('admin.customerreservation', compact('datas'));
    }

  
    //fro food chef
    
    
    public function uploadchef(Request $request){
        $data = new chef();

        $image = $request->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage', $imagename);
        $data->image = $imagename;

        $data->name = $request->name;
        $data->speciality = $request->speciality;

        $data->save();

        return redirect()->back();
    }

    public function chef(){
        $datas = chef::all();
        return view('admin.foodchef', compact('datas'));
    }

      
        
    public function chefupdate($id){
       //return $id;
        $data = Chef::find($id);
        return view('admin.updatechef', compact('data'));
    }

    public function chefdelete($id){
       //return $id;
        $deleteMenu = Chef::find($id);
        $deleteMenu->delete();
        return redirect()->back();
    }

    public function updatechef(Request $request, $id)
    {
        $data = Chef::find($id);

        $image = $request->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage', $imagename);
        $data->image = $imagename;

        $data->name = $request->name;
        $data->speciality = $request->speciality;

        $data->save();

        return redirect()->back();
    }



    public function orders(){


        $datas = Order::all();
        return view('admin.orders', compact('datas'));
    }
    public function search(Request $request){

        $search = $request->search;

        $datas = Order::where('name','Like','%'.$search.'%')
        ->orwhere('foodname', 'Like', '%'.$search.'%')
        ->get();
        return view('admin.orders', compact('datas'));
    }
}
