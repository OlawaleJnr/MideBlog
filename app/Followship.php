<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followship extends Model
{
    // This belongs to the users that are following the currently authenticated user
	public function user1() 
	{
		return $this->belongsTo('App\User', 'user1_id', 'id'); //Related, foreignKey, ownerKey
	}
	
	// This belongs to the users that the currently authenticated users are following
	public function user2()
	{
		return $this->belongsTo('App\User', 'user2_id', 'id'); //Related, foreignKey, ownerKey
	}
}
