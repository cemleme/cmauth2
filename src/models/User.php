<?php

namespace Cemleme\Cmauth\models;

use Eloquent;
use Hash;
use Carbon\Carbon;

use Cemleme\Cmauth\models\Permission;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Eloquent implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;
	//public $connection = 'mysqlauthdb';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public $table = 'users';
	protected $guarded = ['id','created_at'];
	protected $dates = ['last_activity', 'last_login'];
	protected $appends = ['last_activity_diff_tr', 'last_login_diff_tr'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static $rules = array(
		'name'=>'required|min:2',
		'email'=>'required|email|unique:users',
		'password'=>'required|alpha_num|between:3,12|confirmed',
		'password_confirmation'=>'required|alpha_num|between:3,12'
		);
	
	public static $rules_new_user = array(
		'name'=>'required|min:2',
		'email'=>'required|email|unique:users'
	);

	public static $change_password_rules = array(
		'current_password'=>'required',
		'password'=>'required|alpha_num|between:6,12|confirmed',
		'password_confirmation'=>'required|alpha_num|between:6,12'
		);


	public function __construct(){
 		setlocale(LC_TIME, 'tr_TR.UTF-8');  
	}

		
	public function groups()
	{
	    return $this->belongsToMany('Cemleme\Cmauth\models\Group','cmauth_group_user','user_id','group_id');
	}

	public function getLastActivityDiffTrAttribute($date){
		if(!$this->last_activity) return "";
 		return $this->last_activity->diffForHumans();
	}	

	public function getLastLoginDiffTrAttribute($date){
 		return $this->last_login->diffForHumans();
	}

	public function newRandomPassword(){
		$password =	substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 6 );
		$this->password = Hash::make($password);
		$this->save();

		return $password;
	}

	public function welcomeMailIsSent(){
		$this->welcomesent = 1;
		$this->save();
	}

	public function hasGroup($group)
    {
        if (is_string($group)) {
            return $this->groups->contains('name', $group);
        }
        return !! $group->intersect($this->groups)->count();
    }

    public function hasPermission(Permission $permission)
    {   
    	if($this->groups->contains('name', 'MAXADMIN'))
    		return true;
    	
        return $this->hasGroup($permission->groups);
    }

    public function hasPermissionString($permission)
    {   
    	$perm = Permission::where('name', $permission)->first();
    	if(!$perm)
    		return false;
    	return $this->hasPermission($perm);
    }
}
