<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    protected $fillable = [
        'districts'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
