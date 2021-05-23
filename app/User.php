<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active', 'avatar_id'
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

    // Added Role Relationship to the user
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    // Added Avatar relationship to the user
    public function avatar()
    {
        return $this->belongsTo('App\Avatar');
    }

    // creating is_admin middleware functionality
    public function isAdmin(){
        if ($this->role->name == 'Administrator' && $this->is_active == 1) {
            return true;
        }
        return false;
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}

