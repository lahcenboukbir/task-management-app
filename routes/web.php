<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


// Define a route to display a listing of tasks
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

// Define a route to show the form for creating a new task
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

// Define a route to store a newly created task in the database
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// Route to display a specific task based on its ID
// Maps GET requests to '/tasks/{id}' to the 'show' method of TaskController
// The route name is 'tasks.show', which can be used to generate URLs or redirects
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');

// Route to show the form for editing a specific task based on its ID
// Maps GET requests to '/tasks/{id}/edit' to the 'edit' method of TaskController
// The route name is 'tasks.edit', which can be used to generate URLs or redirects
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

// Route to update an existing task based on its ID
// Maps PUT requests to '/tasks/{id}/edit' to the 'update' method of TaskController
// The route name is 'tasks.update', which can be used to generate URLs or redirects
Route::put('/tasks/{id}/edit', [TaskController::class, 'update'])->name('tasks.update');

// Route to delete a specific task based on its ID
// Maps DELETE requests to '/tasks/{id}' to the 'destroy' method of TaskController
// The route name is 'tasks.destroy', which can be used to generate URLs or redirects
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
