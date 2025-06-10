<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [TasksController::class, 'index']);
Route::post('/tasks', [TasksController::class, 'store'])->name('commons.store');
Route::get('/commons',
 [TasksController::class, 'create']
  )->name('commons.create');
Route::get('tasks/{id}', [TasksController::class, 'show']);
Route::get('tasks/{id}/edit',[TasksController::class,'edit'])->name('commons.edit');
Route::put('tasks/{id}', [TasksController::class, 'update'])->name('commons.update');