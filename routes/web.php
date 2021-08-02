<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/groups', [\App\Http\Controllers\GroupController::class, 'index'])->name('groups.index');
Route::get('/groups/{group}/tasks', [\App\Http\Controllers\TaskController::class, 'index'])->name('groups.tasks.index');


