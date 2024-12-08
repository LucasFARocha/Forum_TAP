<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

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

// Página inicial / Rotas do Tópico
Route::get('/', [TopicController::class, 'listAllTopics']
)->name('routeHome');

Route::get('/topics/{topic_id}', [TopicController::class, 'listTopicByID']
)->name('routeListTopicByID');

// Rotas de Autenticação do Usuário; Login, Logout e Registro
Route::match(['get', 'post'], '/login', [AuthController::class, 'loginUser']
)->name('routeLoginUser');

Route::get('/logout', [AuthController::class, 'logoutUser']
)->name('routeLogoutUser');

Route::match(['get', 'post'], '/register', [UserController::class, 'registerUser']
)->name('routeRegisterUser');

// Rotas da Categoria
// Route::get('/categories', [CategoryController::class, 'listAllCategories']
// )->name('routeListAllCategories');

Route::group(['prefix' => 'categories'], function(){
    Route::get('/', [CategoryController::class, 'listAllCategories']
    )->name('routeListAllCategories');

    Route::get('/{category_id}', [CategoryController::class, 'listCategoryByID']
    )->name('routeListCategoryByID');
});

// Route::group(['prefix' => 'categories', 'middleware' => ['auth']], function(){

// });

// Rotas da Tag
Route::group(['prefix' => 'tags'], function(){
    Route::get('/', [TagController::class, 'listAllTags']
    )->name('routeListAllTags');
    
    Route::get('/{tag_id}', [TagController::class, 'listTagByID']
    )->name('routeListTagByID');
});

// A url /create redirecionará para /register
//Route::get('/create', [UserController::class, 'registerUser'])->name('routeRegisterUser');


Route::middleware('auth')->group(function(){
    // O middleware garante a autenticação para executar as rotas dentro dele

    // ----------- Rotas do usuário -----------
    Route::group(['prefix' => '/users'], function(){
        Route::get('/', [UserController::class, 'listAllUsers']
        )->name('routeListAllUsers');
    
        Route::get('/{uid}', [UserController::class, 'listUserByID']
        )->name('routeListUserByID');
    
        Route::match(['get', 'put'], '/{uid}/edit', [UserController::class, 'editUser']
        )->name('routeEditUser');
        //Route::put('/users/{uid}/edit', [UserController::class, 'editUser'])->name('routeEditUser');
    
        Route::delete('/{uid}/delete', [UserController::class, 'deleteUser']
        )->name('routeDeleteUser');
    });
    
    // ----------- Rotas do Tópico -----------
    Route::match(['get', 'post'], '/create-topic', [TopicController::class, 'createTopic']
    )->name('routeCreateTopic');

    Route::match(['get', 'post'], '/topics/{id}/edit', [TopicController::class, 'editTopic']
    )->name('routeEditTopic');

    Route::delete('/topics/{id}/delete', [TopicController::class, 'deleteTopic']
    )->name('routeDeleteTopic');

    // ----------- Rotas da Categoria -----------
    Route::match(['get', 'post'], '/create-category', [CategoryController::class, 'createCategory']
    )->name('routeCreateCategory');

    Route::match(['get', 'put'], '/categories/{id}/edit', [CategoryController::class, 'editCategory']
    )->name('routeEditCategory');

    Route::delete('/categories/{id}/delete', [CategoryController::class, 'deleteCategory']
    )->name('routeDeleteCategory');

    // ----------- Rotas da Tag -----------
    Route::match(['get', 'post'], '/create-tag', [TagController::class, 'createTag']
    )->name('routeCreateTag');

    Route::match(['get', 'put'], '/tags/{id}/edit', [TagController::class, 'editTag']
    )->name('routeEditTag');

    Route::delete('/tags/{id}/delete', [TagController::class, 'deleteTag']
    )->name('routeDeleteTag');
});

