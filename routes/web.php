<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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
Route::match(
    ['get', 'post'], 
    '/login', 
    [AuthController::class, 'loginUser']
)->name('routeLoginUser');

Route::get('/logout', 
    [AuthController::class, 'logoutUser']
)->name('routeLogoutUser');

Route::match(
    ['get', 'post'], 
    '/register', 
    [UserController::class, 'registerUser']
)->name('routeRegisterUser');

// A url /create redirecionará para /register
//Route::get('/create', [UserController::class, 'registerUser'])->name('routeRegisterUser');

Route::middleware('auth')->group(function(){
    // O middleware garante a autenticação para executar as rotas do usuário
    Route::get('/users', [UserController::class, 'listAllUsers'])->name('routeListAllUsers');
    Route::get('/users/{uid}', [UserController::class, 'listUserByID'])->name('routeLitsUserByID');
    Route::get('/users/{uid}/edit', [UserController::class, 'editUser'])->name('routeEditUser');
    Route::get('/users/{uid}/delete', [UserController::class, 'deleteUser'])->name('routeDeleteUser');
});

