<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


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


Route::middleware('guest')->group(function(){
    // SignUp
    Route::get('/page_register', [ViewController::class, 'page_register'])->name('register');
    Route::match(['get', 'post'], '/register', [RegisterController::class, 'register']);
    // SignIn
    Route::get('/page_login', [ViewController::class, 'page_login'])->name('login');
    Route::match(['get', 'post'], '/login', [LoginController::class, 'auth']);
});

Route::middleware('auth')->group(function(){
    // Users
    Route::get('/page_users{page?}', [ViewController::class, 'page_users']);
    // Profile
    Route::get('/page_profile/{id}', [ViewController::class, 'page_profile']);
    // Security
    Route::get('/page_security/{id}', [ViewController::class, 'page_security']);
    Route::post('/edit_security_info/{id}', [UserController::class, 'edit_security_info']);
    // Edit info
    Route::get('/page_edit/{id}',[ViewController::class, 'page_edit']);
    Route::post('/edit_user_info/{id}', [UserController::class, 'edit_user_info']);
    // Media
    Route::get('/page_media/{id}', [ViewController::class, 'page_media']);
    Route::post('/set_media/{id}', [UserController::class, 'set_media']);
    // Online status
    Route::get('/page_status/{id}', [ViewController::class, 'page_status']);
    Route::post('/set_online_status/{id}', [UserController::class, 'set_online_status']);
    // Delete & logout
    Route::get('/delete_user/{id}', [UserController::class, 'delete_user']);
    Route::get('/logout', [LoginController::class, 'logout']);
    
});

Route::middleware('admin')->group(function() {
    // Add new user
    Route::get('page_create_user', [AdminController::class, 'page_create_user']);
    Route::post('create_user', [AdminController::class, 'create_user']);
});

use App\Models\UserInfo;
use App\Models\User;

Route::get('/factory', function(){
        User::factory()->count(5)->create();
        UserInfo::factory()->count(5)->create();
    });




















