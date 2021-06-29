<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
	use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'company', 'password', 'is_permission', 'is_active', 'picture'
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
	
	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
	protected $dates = [
		'deleted_at'
	];
	
	// Adding Picture Accessor
	protected $path = '/storage/images/';
	
	public function getPictureAttribute($picture)
    {
        return $this->path . $picture;
    }

	// User has many Post
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
	
	// Get the Information record associated with the user table
	public function information() 
	{
		return $this->hasOne('App\Information');
	}
}

