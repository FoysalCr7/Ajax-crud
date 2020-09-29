<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('post',PostController::class);
/*Route::post('post',[PostController::class, 'insert']);
Route::get('post/{id}',[PostController::class, 'edit']);
Route::get('post/{id}',[PostController::class, 'show']);
Route::post('post/{id}',[PostController::class, 'update']);
Route::get('post/{id}',[PostController::class, 'destroy']);*/
Route::get('allpost',[PostController::class, 'allpost'])->name('all.post');
