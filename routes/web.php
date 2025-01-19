<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VocabularyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\user\GameController;


Route::get('/home', [DashboardController::class, 'word']) ->name('home');
Route::get('/search',[DashboardController::class, 'search'])->name('search');



Route::get('/adminpage', function () {
    return view('admin.adminpage');
}) ->name('admin');




// ค้นหาคำศัพท์ตามพยัญชนะ
Route::view('/consonant', 'users.consonant')->name('consonant');
Route::get('consonant', [UserController::class,'word']);



Route::group(['prefix'=> 'account'], function(){
    
    Route::group(['middleware' => 'guest'],function(){
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegiter');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
    });
    
    Route::group(['middleware' => 'auth'],function(){
        Route::get('dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
        Route::post('logot' ,[LoginController::class, 'logout'])->name('account.logout');
        
        Route::get('game', [GameController::class, 'index'])->name('account.game');
        Route::view('comment' , 'users.comment')->name('accont.commnet');
    });
    
});



Route::group(['prefix'=> 'admin'], function(){
    
    Route::group(['middleware' => 'admin.guest'],function(){
        Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
        
    });
    
    Route::group(['middleware' => 'admin.auth'],function(){
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('logout', [ AdminLoginController::class,'logout'])->name('admin.logout');
        Route::get('create', [VocabularyController::class, 'create'])->name('vocabularies.create');
        Route::post('vocabularies', [VocabularyController::class, 'store'])->name('vocabularies.store');
    });
    
});







