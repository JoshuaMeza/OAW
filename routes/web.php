<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

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

Route::controller(HomeController::class)->group(function () {
    Route::get('/posts', [HomeController::class,'index']);
    Route::post('/añadir', 'create');
    Route::post('/eliminar', 'delete');
    Route::post('/actualizar', 'update');
    Route::post('/leer', 'read');
    Route::resource('views',HomeController::class);
    Route::get('/posts/search',[HomeController::class, 'search'])->name('posts.search');
    Route::get('/posts/show',[HomeController::class, 'show'])->name('posts.show');
    Route::post('/posts/filter',[HomeController::class, 'filter'])->name('posts.filter');
});