<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/



Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();
//------------------ROLES DE LOS USUARIOS--------------------//

// VISTA PARA EDITAR UN POST
Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit');
// EDITAR EL PERFIL DEL USUARIO
Route::put('user/{id}/update', 'UserController@update')->name('user.update');
//VER LOS USUARIOS POR UN ADMIN
Route::get('user', 'UserController@index')->name('user');
//BORRAR UN USUARIO POR UN ADMIN
Route::get('user/{id}/destroy', 'UserController@destroy')->name('user.destroy');
// VISTA PARA CREAR UN USUARIO POR UN ADMIN
Route::get('user/create', 'UserController@create')->name('user.create');
// CREAR UN USUARIO POR UN ADMIN
Route::post('user/store', 'UserController@store')->name('user.store');


//-------- RUTAS DEL POST-----------//
// VER LOS POSTS
Route::get('posts', 'PostController@index')->name('posts');
// VER UN POST CON SUS COMENTARIOS
Route::get('posts/{id}/show', 'PostController@show')->name('posts.show');
// VISTA PARA EDITAR UN POST
Route::get('posts/{id}/edit', 'PostController@edit')->name('posts.edit');
// EDITAR UN POST
Route::put('posts/{id}/update', 'PostController@update')->name('posts.update');
// VISTA PARA CREAR UN POST
Route::get('posts/create', 'PostController@create')->name('posts.create');
// CREAR UN POST
 Route::post('posts/store', 'PostController@store')->name('posts.store');
// BORRAR UN POST
Route::get('posts/{id}/destroy', 'PostController@destroy')->name('posts.destroy');
//-------- RUTAS DEL LOS COMENTARIOS-----------//
// VISTA PARA CREAR UN COMENTARIO
Route::get('comments/(id)/create', 'CommentController@create')->name('comments.create');
// CREAR UN COMMENTARIO
Route::post('comments/{id}/store', 'CommentController@store')->name('comments.store');
//-------- GESTION DE BUSQUEDA-----------//
Route::get('search','SearchController@busqueda')->name('buscar');
Route::middleware(['auth','role:admin'])->prefix('admin')->group(function(){
    Route::get('/',function(){
        return "admin";
    })->name('admin.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('unauthorized',function(){
    return view('unauthorized');
});
