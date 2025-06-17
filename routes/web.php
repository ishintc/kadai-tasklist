<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TasksController;
use App\Models\Task;

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
// Route::get('/', function () {
//     $user = Auth::user();
//     if (!$user) {
//         return view('dashboard');
//     }
//     return redirect()->route('users.show', $user->id);

// });
// Route::get('/dashboard', function () {
//     $user = Auth::user();
//     if (!$user) {
//         return redirect()->route('/');
//     }
//     return view('dashboard', ['user' => $user]);
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [TasksController::class, 'index']);

Route::get('/dashboard', [TasksController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/users/{id}', [UsersController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('users.show');

Route::get('/users', [UsersController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('users.users');

Route::middleware('auth')->group(function () {
    Route::resource('users', UsersController::class, ['only' => ['index', 'show']]);
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('tasks', TasksController::class, ['only' => ['create', 'update', 'store', 'edit', 'destroy']]);
});

Route::get('/commons',[TasksController::class, 'create'])->name('commons.create');
Route::post('/tasks', [TasksController::class, 'store'])->name('commons.store');
Route::get('tasks/{id}/edit', [TasksController::class, 'edit'])->name('commons.edit');
Route::put('tasks/{id}', [TasksController::class, 'update'])->name('commons.update');
require __DIR__ . '/auth.php';