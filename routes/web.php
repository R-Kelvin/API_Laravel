<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

//tela de login
Route::get('/login', [AuthController::class, 'index'])->name('login');

//logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//registrar novo usuário
Route::get('/register-user', [UserController::class, 'register'])->name('users.register');
Route::post('/storeRegister-user', [UserController::class, 'storeRegister'])->name('user.storeRegister');

//editar senha
// Solicitar link para resetar senha
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Formulário para redefinir a senha com o token
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showRequestForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');


//processa dados de login
Route::post('/login', [AuthController::class, 'LoginProcess'])->name('login.process');

//rota restrita
Route::group(['middleware' => 'auth'], function(){

    Route::get('/index-user', [UserController::class, 'index'])->name('user.index');
    Route::get('/show-user/{user}', [UserController::class, 'show'])->name('user.show');

    Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
    Route::post('/store-user', [UserController::class, 'store'])->name('user.store');

    Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update');

    Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});
