<?php

namespace App\Http\Controllers;

use App\Models\FoodMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $datas = FoodMenu::all();
        return view('home', compact('datas'));
    }

    public function redirects(){
        $usertype = Auth::user()->usertype;

        if($usertype == '0'){
            $datas = FoodMenu::all();
            return view('home', compact('datas'));
        }
        if($usertype == '1'){
            return view('admin.adminhome');
        }
    }
}
