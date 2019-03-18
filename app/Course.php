<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $fillable = [
        'name', 'description', 'vacancies', 'workload', 'startSubscription', 'endSubscription', 'startCourse', 'endCourse'
    ];

    protected $guarded = ['id'];
}
