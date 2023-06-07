<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [HomeController::class, 'index']);
Route::get('/redirects', [HomeController::class, 'redirects']);


Route::get('/users', [AdminController::class, 'users']);
Route::get('/deleteuser/{id}', [AdminController::class, 'deleteuser']);


Route::controller(AdminController::class)->group(function(){
    Route::get('/foodmenu','foodmenu');
    Route::post('/uploadfood','uploadfood');
    Route::get('/deleteMenu/{id}','deleteMenu');
    Route::get('/updateMenu/{id}','updateMenu');
    Route::post('/update/{id}','update');
});


Route::post('/reservation', [AdminController::class, 'reservation']);
Route::get('/customerreservation', [AdminController::class, 'customerreservation']);


Route::controller(AdminController::class)->group(function(){
    Route::get('/chef','chef');
    Route::post('/uploadchef','uploadchef');
    Route::get('/chefupdate/{id}','chefupdate');
    Route::get('/chefdelete/{id}','chefdelete');
    Route::post('/updatechef/{id}','updatechef');
});

Route::controller(AdminController::class)->group(function(){
    Route::get('/orders', 'orders');
    Route::get('/search', 'search');
});

Route::post('addcart/{id}',[HomeController::class, 'addcart']);
Route::get('showcart/{id}',[HomeController::class, 'showcart']);
Route::get('remove/{id}',[HomeController::class, 'remove']);

Route::post('/orderconfirm', [HomeController::class, 'orderconfirm']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
