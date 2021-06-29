<?php
	function checkUserPermission($permission) 
	{
		$userAccess = getUserPermission(Auth::guard('web')->user()->is_permission);
		foreach($permission as $key => $value) 
		{
			if($value == $userAccess)
			{
				return true;
			}
		}
		return false;
	}
	
	function getUserPermission($id) 
	{
		switch($id) {
			case 1:
				return 'author';
				break;
			default:
				return 'user';
				break;
		}
	}
	
	function isFollowing($id) 
	{
		// My Followers
		if(\App\Followship::where('user1_id', $id)->where('user2_id', auth('web')->user()->id)->exists()){
			return "Followers";
		// The users am following
		}elseif(\App\Followship::where('user2_id', $id)->where('user1_id', auth('web')->user()->id)->exists()){
			return "Following";
		}
	}
?>