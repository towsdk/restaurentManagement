<?php

namespace App\Http\Controllers;

use App\Models\FoodMenu;
use App\Models\Chef;
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
            $data = FoodMenu::find($id);
            return view('admin.updateview', compact('data'));
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

    public function deleteMenu($id){
        $deleteMenu = FoodMenu::find($id);
        $deleteMenu->delete();
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

    public function chef(){
        return view('admin.foodchef');
    }
}
