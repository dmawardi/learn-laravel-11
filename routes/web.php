<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            ['title' => 'PHP Developer', 'salary' => '$50,000', 'id' => 1],
            ['title' => 'Python Developer', 'salary' => '$60,000', 'id' => 2],
            ['title' => 'Ruby Developer', 'salary' => '$70,000', 'id' => 3],
            ['title' => 'Java Developer', 'salary' => '$80,000', 'id' => 4],
            ['title' => 'DevOps', 'salary' => '$90,000', 'id' => 5],
            ['title' => 'Node.js Developer', 'salary' => '$100,000', 'id' => 6]
        ]
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    
    $jobs = [
        ['title' => 'PHP Developer', 'salary' => '$50,000', 'id' => 1],
        ['title' => 'Python Developer', 'salary' => '$60,000', 'id' => 2],
        ['title' => 'Ruby Developer', 'salary' => '$70,000', 'id' => 3],
        ['title' => 'Java Developer', 'salary' => '$80,000', 'id' => 4],
        ['title' => 'DevOps', 'salary' => '$90,000', 'id' => 5],
        ['title' => 'Node.js Developer', 'salary' => '$100,000', 'id' => 6]
    ];
    
    // Use the array helper class to find the first job with the given id
    $job = Arr::first($jobs, fn($job) => $job['id'] == $id);    
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});