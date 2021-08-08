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

Route::get('/home', [App\Http\Controllers\TaskController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/groups', [\App\Http\Controllers\GroupController::class, 'index'])->name('groups.index');
Route::post('/groups', [\App\Http\Controllers\GroupController::class, 'store'])->name('groups.store');
Route::get('/groups/create', [\App\Http\Controllers\GroupController::class, 'create'])->name('groups.create');
Route::get('/groups/{group}/edit', [\App\Http\Controllers\GroupController::class, 'edit'])->name('groups.edit');
Route::post('/groups/{group}', [\App\Http\Controllers\GroupController::class, 'update'])->name('groups.update');

Route::get('/groups/{group}/tasks', [\App\Http\Controllers\TaskController::class, 'index'])->name('groups.tasks.index');
Route::post('/groups/{group}/tasks', [\App\Http\Controllers\TaskController::class, 'store'])->name('groups.tasks.store');
Route::get('/groups/{group}/tasks/create', [\App\Http\Controllers\TaskController::class, 'create'])->name('groups.tasks.create');



Route::get('/tasks', [\App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');


