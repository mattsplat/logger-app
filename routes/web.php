<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/api/dashboard/get-path', [\App\Http\Controllers\DashboardController::class, 'getPath'])->name('dashboard.get-path');

Route::get('/api/project', [\App\Http\Controllers\ProjectController::class, 'index'])->name('project.index');
Route::post('/api/project', [\App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');
Route::delete('/api/project/{project}', [\App\Http\Controllers\ProjectController::class, 'destroy'])->name('project.destroy');
Route::get('/project/{project}', [\App\Http\Controllers\ProjectController::class, 'show'])->name('project.show');

