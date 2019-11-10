<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class enrol extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function courses()
    {
        return $this->belongsTo(Courses::class);
    }
}
