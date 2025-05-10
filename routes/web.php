<?php
use App\Http\Controllers\TasksController;

use Illuminate\Support\Facades\Route;


Route::get('/tasks', [TasksController::class, 'index'])->name('tasks.index');
Route::post('/tasks', [TasksController::class, 'store']);
Route::get('/tasks/{id}', [TasksController::class, 'show']);
Route::get('/tasks/{id}/edit', [TasksController::class, 'edit']);
Route::put('/tasks/{id}', [TasksController::class, 'update']);
Route::delete('/tasks/{id}', [TasksController::class, 'delete']);



