<?php namespace Cemleme\Cmauth\managers;

use Auth;
use Session;

class UserPermissionRefresher {
	
	public function refreshPermissions($forceRefresh = false){
		$this->checkAndGetSessionUserData($forceRefresh);
	}

	public function checkAndGetSessionUserData($forceRefresh=false){

		if($forceRefresh || !Session::has('userGroupNames') || !Session::has('userPermissionNames')){
			$user = Auth::user();
			$user->load('groups', 'groups.permissions');

			$i=0;
			$j=0;
			$userGroupNames[0]="";
			$userPermissionNames[0]="";

			foreach($user->groups as $group) {		
				$userGroupNames[$i++]=$group->name;
				foreach($group->permissions as $permission) {	
					$userPermissionNames[$j++]=$permission->name;
				}
			}

			Session::put('userGroupNames', $userGroupNames);
			Session::put('userPermissionNames', $userPermissionNames);
			Session::put('username', $user->name);
			Session::put('useremail', $user->email);
			Session::put('pwdchanged', $user->pwdchanged);
		}
	}


}