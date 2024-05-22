<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'listAllUsers'])->name('routeListAllUsers');
Route::get('/users/id', [UserController::class, 'listUserByID'])->name('routeLitsUserByID');
Route::get('/users/create', [UserController::class, 'createUser'])->name('routeCreateUser');
Route::get('/users/id/edit', [UserController::class, 'editUser'])->name('routeEditUser');
Route::get('/users/id/delete', [UserController::class, 'deleteUser'])->name('routeDeleteUser');