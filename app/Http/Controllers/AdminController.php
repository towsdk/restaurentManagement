<?php

namespace App\Http\Controllers;

use App\Models\FoodMenu;
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

    public function deleteMenu($id){
        $deleteMenu = FoodMenu::find($id);
        $deleteMenu->delete();
        return redirect()->back();
    }
}
