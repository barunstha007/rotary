<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password' , 'user','district','company','municipality','ward'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function district(){
        return $this->hasOne(District::class);
    }

    public function municipality(){
        return $this->hasOne(Municipality::class);
    }

    public function ward(){
        return $this->hasOne(Ward::class);
    }

    public function company(){
        return $this->hasOne(Company::class);
    }

    public function userinfo(){
        return $this->hasOne(Userinfo::class);
    }
}
