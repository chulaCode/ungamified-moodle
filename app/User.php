<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use App\Counts;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','username' ,'password','image',
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
    
     //boot gets called when a new user is created
     /*
    protected static function boot()
    {
       parent::boot();
       
       static::created(function($user)
    {
        $user->count()->created([
          'user_id'=>$user->id,
        ]);
    });

    }*/

public function profileImage()
{
   
    $imagePath = ($this->image) ? $this->image : 'no_image.png';
    return '/profile/' . $imagePath;
}

    public function counts()
    {
        return $this->hasOne(Counts::class);
    }
    public function Enrol()
    {
        return $this->hasOne(enrol::class);
    }
}