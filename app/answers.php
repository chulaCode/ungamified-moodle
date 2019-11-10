<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answers extends Model
{
    protected $table = 'answers';
    //
    public function questions()
    {
        return $this->belongsTo(questions::class);
    }
}
