<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

use function Pest\Laravel\get;

Route::get('/', function () {
    return view('home');
});

// Index
Route::get('/jobs', function () {
    // paginate automatically looks for a page query parameter, and if it finds it, it will return the corresponding page of results
    // order by created date in descending order
    $jobs = Job::with('employer')->latest()->paginate(3);


    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// Create
Route::get('/jobs/create', function () {
    
    return view('jobs.create');
});

// Show
Route::get('/jobs/{id}', function ($id) {
    
    // Use the array helper class to find the first job with the given id
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

// Store
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3', 'max:255'],
        'salary' => ['required', 'max:255'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});

// Edit
Route::get('/jobs/{id}/edit', function ($id) {
    // Use the array helper class to find the first job with the given id
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:3', 'max:255'],
        'salary' => ['required', 'max:255'],
    ]);

    $job = Job::findOrFail($id);
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/' . $job->id);
});

Route::delete('/jobs/{id}', function ($id) {
    $job = Job::findOrFail($id);

    $job->delete();
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});