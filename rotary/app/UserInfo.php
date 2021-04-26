<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'name', 'email', 'user_id','district_id','company_id','municipality_id','ward_id','phone_number'
    ];

    public function User()
    {
        return $this->hasOne(User::class);
    

    }
}
