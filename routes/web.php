<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

use function Pest\Laravel\get;

// Route::get('/', function () {
//     return view('home');
// });

// To replace above, with single line (only works for GET requests)
Route::view('/', 'home');

// Index
Route::get('/jobs', [JobController::class, 'index']);


// Route::resource('jobs', JobController::class);

// Create
Route::get('/jobs/create', [JobController::class, 'create']);
// Show
Route::get('/jobs/{job}', [JobController::class, 'show']);
// Store
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
// Edit (Must be authorized and can edit job. Pass job as parameter)
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth')->can('edit-job', 'job');
// Update
Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware('auth')->can('edit-job', 'job');
// Delete
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth')->can('edit-job', 'job');

// The above replaces everything below
// Route::controller(JobController::class)->group(function() {
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}', 'show');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });
// // Create
// Route::get('/jobs/create', [JobController::class, 'create']);
// // Show
// Route::get('/jobs/{job}', [JobController::class, 'show']);
// // Store
// Route::post('/jobs', [JobController::class, 'store']);
// // Edit
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
// // Update
// Route::patch('/jobs/{job}', [JobController::class, 'update']);
// // Delete
// Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);



Route::view('/contact', 'contact');