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
    $jobs = Job::with('employer')->paginate(3);

    return view('job.jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    dd('create');
    return view('job.create');
});

Route::get('/jobs/{id}', function ($id) {
    
    // Use the array helper class to find the first job with the given id
    $job = Job::find($id);
    return view('job.job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});