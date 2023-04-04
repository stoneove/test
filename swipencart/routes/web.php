<?php

use App\Http\Controllers\Admin\AdminController2;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Vendor\VendorController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::prefix('/admin')->group(function () {

    Route::match(['get', 'post'], 'login', [AdminController::class, 'adminlogin']);
    Route::match(['get', 'post'], 'password_reset', [AdminController::class, 'passwordreset']);
    // Route::match(['get','post'],  'reset_password/{token}', [AdminController::class, 'reset_password'])->name('reset_password');
    Route::get('reset_password/{token}', [AdminController::class, 'reset_password'])->name('reset_password');
    Route::post('reset_password', [AdminController::class, 'reset_update_password']);
    Route::middleware(['admin','ifreturn'])->group(function () {
        Route::get('dashboard', [AdminController::class, 'index']);
        Route::get('logout', [AdminController::class, 'adminlogout']);
        Route::match(['get', 'post'], 'password-update', [AdminController::class, 'passwordupdate']);
        Route::post('check_current_password', [AdminController::class, 'check_current_password']);
        Route::post('profile-update', [AdminController::class, 'profileupdate']);
        Route::get('detail-update', [AdminController::class, 'detailupdate']);
        Route::match(['get', 'post'], 'vendor_approve/{id?}', [AdminController2::class, 'vendor_approve']);
        Route::get('vendor_pending', [AdminController2::class, 'vendor_pending']);
        Route::post('terminate/{id?}', [AdminController2::class,'terminate']);
        
        Route::match(['get', 'post'], 'sections', [AdminController2::class, 'sections']);
        // Route::match(['get', 'post'], 'password-update', [AdminController::class, 'passwordupdate']);
        // Route::post('terminate/{id?}', [AdminController2::class,'terminate']);

    });
});

Route::prefix('/vendor')->group(function () {

    Route::match(['get', 'post'], 'login', [VendorController::class, 'vendorlogin']);
    Route::match(['get', 'post'], 'signup', [VendorController::class, 'vendorsignup']);
    Route::get('email_verify', [VendorController::class, 'email_verify'])->name('email_verify');
    Route::view('terminate','vendors.terminate');  
    Route::middleware(['vendor', 'isVendorVerifyEmail','vendor_terminate','ifreturn'])->group(function () {

       
   
        Route::get('logout', [VendorController::class, 'logout']);
        Route::match(['get', 'post'], 'detail-update', [VendorController::class, 'detailupdate']);
        Route::post('check_current_password', [VendorController::class, 'check_current_password']);
        Route::post('profile-update', [VendorController::class, 'profileupdate']);
        Route::match(['get', 'post'], 'password-update', [VendorController::class, 'passwordupdate']);
        Route::middleware(['hasDetailUpdated'])->group(function () {
            Route::get('dashboard', [VendorController::class, 'index']);
        });


    });
});
