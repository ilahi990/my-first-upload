<?php
use App\Http\Controllers\admin\LoginAdminController;
use App\Http\Controllers\admin\dashboardAdminController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

// use of middleware
Route::group(['middleware'=> 'guest'], function () {

    Route::controller(LoginController::class)->group(function () {

        Route::post('/authenticate', 'authenticate')->name('login.authenticate');
        
        Route::get('/', 'login')->name('login.signup');
    });

    Route::controller(RegisterController::class)->group(function () {

        Route::post('/registerProcess', 'registeration')->name('login.registeration');
        Route::get('/register', 'register')->name('login.register');
    });

});

Route::group(['middleware'=> 'auth'], function () {


Route::get('/dashboard', function () {
    return view('login.dashboard');
})->name('login.dashboard');

// this will show crud routes
Route::controller(CrudController::class)->group(function () {
    Route::get('/create', 'create')->name('crud.create');
    Route::get('/products', 'index')->name('crud.products');
    Route::get('{product}/edit', 'edit')->name('crud.edit');
    Route::put('/{product}', 'update')->name('crud.update');
    Route::post('/store', 'store')->name('crud.store');
    Route::delete('/products/{product}', 'destroy')->name('products.destroy');
});

Route::get('/logout',[LoginController::class,'logout'])->name('login.logout');

});

Route::get('/admin/login',[LoginAdminController::class,'index'])->name('admin.login');
Route::post('/admin/authenticate',[LoginAdminController::class,'authenticate'])->name('admin.authenticate');
Route::get('/admin/dashboard',[DashboardAdminController::class,'dashboard'])->name('admin.dashbord');


