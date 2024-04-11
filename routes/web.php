<?php

use App\Http\Controllers\JobController;
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


Route::resource('jobs', JobController::class);

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

Route::view('/contact', 'contact');