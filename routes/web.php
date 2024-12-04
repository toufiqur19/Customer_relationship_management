<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //user route
    Route::resource('users',UserController::class);

    //client route
    Route::resource('clients',ClientController::class);

    // role route
    Route::resource('roles',RoleController::class);

    // Permission route
    Route::resource('permissions',PermissionController::class);

    //project route
    Route::resource('projects',ProjectController::class);

    //task route
    Route::resource('tasks',TaskController::class);

    // todolist route
    Route::get('/todos', [TodoListController::class, 'index'])->name('todos.index');
    Route::get('/todos/create', [TodoListController::class, 'create'])->name('todos.create');
    Route::post('/todos', [TodoListController::class, 'store'])->name('todos.store');
    Route::get('/todos/{todo}/edit', [TodoListController::class, 'edit'])->name('todos.edit');
    Route::put('/todos/{todo}', [TodoListController::class, 'update'])->name('todos.update');
    Route::get('/todos/{id}', [TodoListController::class, 'delete'])->name('delete');

    // blogs route
    Route::resource('blogs',PostController::class);

    // category route
    Route::resource('categories', CategoryController::class);
    
    //mark as read
    Route::get('/markAsRead/{id}', [DashboardController::class, 'markAsRead'])->name('markAsRead');      

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
