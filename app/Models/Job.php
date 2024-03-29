<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Arr;

class Job extends Model
{
    // Use the protected $table property to specify the table name if it is different from the default convention
    // ie. the plural form of the class name
    protected $table = 'job_listings';

    protected $fillable = ['title', 'salary'];

    use HasFactory;

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
    }
}
