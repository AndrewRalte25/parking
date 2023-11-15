<?php


use App\Http\Middleware\CheckRole;
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
Route::get('/dashboard',[HomeController::class,"index"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');
});


//ADMIN ROUTES
Route::middleware(['auth', 'CheckRole:2'])->group(function () {
    Route::get('/adminparking',[AdminController::class,"index"]);
    Route::get('/adminspots',[AdminController::class,"index"]);
    Route::get('/adminvehicles',[AdminController::class,"vehicles"]);
    Route::get('/adminhistory',[AdminController::class,"history"]);
    Route::get('/adminspots',[AdminController::class,"index"]);
    Route::get('/adminaddspot',[AdminController::class,"createspot"]);
    Route::post('/adminaddspot',[AdminController::class,"storespot"]);
    Route::post('/adminadduser',[AdminController::class,"storeuser"]);
    Route::get('/adminadduser',[AdminController::class,"adduser"]);
    Route::get('/adminusers',[AdminController::class,"indexuser"]);
    Route::get('/adminspots',[AdminController::class,"index"]);
    Route::delete('/adminuser/{id}', [AdminController::class, 'destroy']);
    Route::delete('/adminvehicle/{id}', [AdminController::class, 'vehicledestroy']);
    Route::delete('/adminhistory/{id}', [AdminController::class, 'historydestroy']);
    Route::delete('/adminspot/{id}', [AdminController::class, 'spotdestroy']);
    Route::get('/adminspot/{id}/edit', [AdminController::class, 'edit']);
    Route::put('/adminupdatespot/{id}', [AdminController::class, 'update']);
});


//USER ROUTES   

Route::middleware(['auth', 'CheckRole:0'])->group(function () {
    Route::get('/userspot',[UserController::class,"index"]);
    Route::get('/userdash',[UserController::class,"index"]);
    Route::post('/usernew',[UserController::class,"store"]);
    Route::get('/usernew',[UserController::class,"add"]);
    Route::get('/qrgen',[QrController::class,"generateQRCode"]);
});


//BOOKIE ROUTES
Route::middleware(['auth', 'CheckRole:1'])->group(function (){
Route::get('/checkin',[BookieController::class,"checkin"]);
Route::get('/bookiedash',[BookieController::class,"index"]);
Route::post('/checkin',[BookieController::class,"processQRCode"]);
Route::post('/checkout',[BookieController::class,"processQRCodecheckout"]);
Route::get('/checkout',[BookieController::class,"checkout"]);
 
});
