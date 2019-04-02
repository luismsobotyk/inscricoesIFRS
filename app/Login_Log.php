<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login_log extends Model
{
    protected $table = 'login_logs';

    protected $fillable = [
        'user_id', 'ipAdress'
    ];
}
