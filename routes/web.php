<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopicController;

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
Route::get('/',
    [TopicController::class, 'listAllTopics']
)->name('routeHome');

Route::get('/topics/{topic_id}', 
    [TopicController::class, 'listTopicByID']
)->name('routeListTopicByID');

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
    Route::get('/users/{uid}', [UserController::class, 'listUserByID'])->name('routeListUserByID');

    Route::match(
        ['get', 'put'],
        '/users/{uid}/edit', [UserController::class, 'editUser']
    )->name('routeEditUser');

    Route::match(
        ['get', 'put'],
        '/create-topic', [TopicController::class, 'createTopic']
    )->name('routeCreateTopic');

    //Route::put('/users/{uid}/edit', [UserController::class, 'editUser'])->name('routeEditUser');
    Route::delete('/users/{uid}/delete', [UserController::class, 'deleteUser'])->name('routeDeleteUser');
});

