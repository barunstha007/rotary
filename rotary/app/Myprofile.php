<?php

namespace App;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;

class Myprofile extends Model
{
    use Rateable;

    public function users(){
        return $this->hasOne(User::class);
    }
}
