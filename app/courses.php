<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //
    public function Enrol()
    {
        return $this->hasOne(Enrol::class);
    }
}
