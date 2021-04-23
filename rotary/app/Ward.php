<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $fillable = [
        'Ward'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
