<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counts extends Model
{
    //
    protected $fillable = [
        'user_id', 'right','wrong' ,'attempts','values'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
