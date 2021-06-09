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
	
	function getUserPermission($permission) 
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
?>