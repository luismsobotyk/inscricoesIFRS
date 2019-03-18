<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{
    // Esta classe está com nome de agenda para evitar conflito com a classe Schedule do Illuminate

    protected $table = 'schedule';

    protected $fillable = [
        'dayWeek', 'startTime', 'endTime', 'course_id'
    ];

}
