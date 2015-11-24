<?php

namespace Cemleme\Cmauth\controllers;

use Illuminate\Routing\Controller;
use View;
use Redirect;
use Input;
use Hash;
use Config;

use Cemleme\Cmauth\models\User;
use Cemleme\Cmauth\models\Group;
use Cemleme\Cmauth\models\Permission;

use Cemleme\Cmauth\Mailers\UserMailer;

class UsersController extends Controller {

    protected $mailer;
	
	public function __construct(UserMailer $mailer) {

		$this->mailer = $mailer;

		//$this->beforeFilter('acl.permitted:AppsUsersEdit'); 
	}
	
	public function getIndex() {

		
		$users = User::all();
		$users->load('groups', 'groups.permissions');
		
		$groups = Group::all();

		return view('cmauth::usergroups', compact('users','groups'));
	}

	public function getGroups() {

		
		$groups = Group::all();
		$groups->load('permissions');
		
		$permissions = Permission::all();
		
		return view('cmauth::grouppermissions', ['permissions' => $permissions, 'groups'  => $groups]);
	}

	public function connectUserGroup($id)
	{
		$user = User::find($id);		
		$group = Group::find(Input::get('group'));

		if(!$user->groups->contains($group)){
			$user->groups()->attach(Input::get('group'));

			$user->permissionchanged = 1;
			$user->save();
		}

		return Redirect::to('/cmauth/usersapp');
	}

	public function deleteUserGroup($uid, $gid)
	{
		$user = User::find($uid);
		$user->groups()->detach($gid);
		
		$user->permissionchanged = 1;
		$user->save();

		return Redirect::to('/cmauth/usersapp');
	}

	public function connectGroupPermission($id)
	{
		$group = Group::find($id);
		$permission = Permission::find(Input::get('permission'));

		if(!$group->permissions->contains($permission)){
			$group->permissions()->attach(Input::get('permission'));
		}

		return Redirect::to('/cmauth/usersapp/groups');
	}

	public function deleteGroupPermission($gid, $pid)
	{
		$group = Group::find($gid);
		$group->permissions()->detach($pid);

		return Redirect::to('/cmauth/usersapp/groups');
	}

	public function sendNewPasswordMailToUser($id){
		$user = User::find($id);
		//$newPassword = $this->setUserPasswordRandomly($user);
		$this->mailer->newPassword($user, $user->newRandomPassword());

		return Redirect::to('/cmauth/users')->with('message', 'New password is sent to '.$user->email);
	}

	public function sendWelcomeMailToUser($id){
		$user = User::find($id);
		//$newPassword = $this->setUserPasswordRandomly($user);
		$this->mailer->welcome($user, $user->newRandomPassword());

		$user->welcomeMailIsSent();
		//$this->setUserWelcomeMailIsSent($user);

		return Redirect::to('/cmauth/users')->with('message', 'Welcome mail is sent to '.$user->email);
	}

	public function sendLDAPWelcomeMailToUser($id){
		$user = User::find($id);
		$this->mailer->welcomeLDAP($user);

		return Redirect::to('/cmauth/users')->with('message', 'LDAP Welcome mail is sent to '.$user->email);
	}

}