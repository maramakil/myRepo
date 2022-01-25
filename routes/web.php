<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleAdminController;

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

//Route::get('/', function () {
//    return view('pages.articles');
//});
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/' , [\App\Http\Controllers\ArticleController::class , 'index']);
Route::get('/details/{id}' , [\App\Http\Controllers\ArticleController::class , 'show'])->name('details');
Route::group(['middleware' => 'auth' , 'prefix' => 'admin'], function () {
    Route::get('/index',[ArticleAdminController::class,'index']);

    Route::get('/create',function(){
        return view('admin.create');
    });

    Route::post('/article',[ArticleAdminController::class,'store']);
    Route::delete('/delete/{id}',[ArticleAdminController::class,'destroy']);
    Route::get('/edit/{id}',[ArticleAdminController::class,'edit']);

    Route::delete('/delete-image/{id}',[ArticleAdminController::class,'deleteimage']);
    Route::delete('/delete-main-image/{id}',[ArticleAdminController::class,'deletemain']);

    Route::put('/update/{id}',[ArticleAdminController::class,'update']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
