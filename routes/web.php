<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\IssuesController;

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

Route::view('/', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::controller(ProjectsController::class)->middleware(['auth'])->group(function() {
    Route::get('/projects', 'index')->name('projects');
    Route::get('/projects/{id}/', 'show')->name('projects.show');
});

Route::controller(IssuesController::class)->middleware(['auth'])->group(function() {
    Route::get('/projects/{project_id}/issues/{issue_number}/', 'show')->name('project.issue.show');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
