<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'name', 'email', 'password' , 'user','district','company','municipality','ward','number'
    ];
}
