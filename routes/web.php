<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

use function Pest\Laravel\get;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    // paginate automatically looks for a page query parameter, and if it finds it, it will return the corresponding page of results
    // order by created date in descending order
    $jobs = Job::with('employer')->latest()->paginate(3);


    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    
    // Use the array helper class to find the first job with the given id
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3', 'max:255'],
        'salary' => ['required', 'max:255'],
        'employer_id'  => ['required', 'numeric'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});