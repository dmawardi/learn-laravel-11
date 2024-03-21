<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Arr;

class Job
{
    use HasFactory;

    public static function all(): array {
        return [
            ['title' => 'PHP Developer', 'salary' => '$50,000', 'id' => 1],
            ['title' => 'Python Developer', 'salary' => '$60,000', 'id' => 2],
            ['title' => 'Ruby Developer', 'salary' => '$70,000', 'id' => 3],
            ['title' => 'Java Developer', 'salary' => '$80,000', 'id' => 4],
            ['title' => 'DevOps', 'salary' => '$90,000', 'id' => 5],
            ['title' => 'Node.js Developer', 'salary' => '$100,000', 'id' => 6]
        ];
    }
    public static function find(int $id): array  {
        // Use the array helper class to find the first job with the given id
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);
        if (!$job) {
            return abort(404, "Job not found");
        } else {
            return $job;
        }
    }
}
