<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//navbar Route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/about',[AboutController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('home');
});

// Route::get('/admin',[AdminController::class,'index']);
Route::get('/AllCar', [AdminController::class, 'index'])->name('AllCar');
Route::get('/addcar', [AdminController::class, 'addPage'])->name('addcar');

Route::get('/Allpart', [AdminController::class, 'showPartPage'])->name('Allpart');
Route::get('/AddPart', [AdminController::class, 'addpartPage'])->name('addpart');


//Insert
Route::post('/add_motorcycle',[AdminController::class,'insert_motocycles'])->name('add_motorcycle');

Route::post('/add_parts',[AdminController::class,'insert_parts'])->name('add_parts');



Route::get('/Detail/{motorcycle_ID}',[AdminController::class,'detailPage']);
Route::get('/SoftDeleteCar/{motorcycle_ID}',[AdminController::class,'SoftDeleteCar']);

//Sell
Route::get('/Sell/{motorcycle_ID}',[SellController::class,'index']);
Route::get('/sellcar',[SellController::class,'sellcarDetail'])->name('sellcar');
//Insert Sell
Route::post('/add_sell',[AdminController::class,'insert_sell'])->name('add_sell');

//buy
Route::get('/buycar',[AdminController::class,'buyCarPage'])->name('buycar');
//reserve
Route::get('/reserveCar',[AdminController::class,'reserveCarPage'])->name('reserveCar');


// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/getBrand/{id}', [AdminController::class,'getBrand'])->name('getBrand');
Route::get('/getColor/{id}', [AdminController::class,'getColor'])->name('getColor');

