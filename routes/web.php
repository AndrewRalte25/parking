<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\BookieController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redirects',[HomeController::class,"index"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//ADMIN ROUTES


Route::get('/adminparking',[AdminController::class,"index"]);

Route::get('/adminspots',[AdminController::class,"index"]);
Route::get('/adminaddspot',[AdminController::class,"createspot"]);
Route::post('/adminaddspot',[AdminController::class,"storespot"]);


Route::get('/adminusers',[AdminController::class,"indexuser"]);
Route::get('/adminspots',[AdminController::class,"index"]);


//USER ROUTES   
Route::get('/userspot',[UserController::class,"index"]);
Route::get('/userdash',[UserController::class,"index"]);
Route::post('/usernew',[UserController::class,"store"]);
Route::get('/usernew',[UserController::class,"add"]);
Route::get('/qrgen',[QrController::class,"generateQRCode"]);

//BOOKIE ROUTES
Route::get('/checkin',[BookieController::class,"checkin"]);
Route::get('/checkinsucess',[BookieController::class,"sucess"]);
Route::post('/checkin',[BookieController::class,"processQRCode"]);
Route::get('/checkout',[BookieController::class,"checkout"]);