<?php
 
namespace Cemleme\Cmauth\models;

use Eloquent;

class Group extends Eloquent {
	
	protected $table = "cmauth_groups";
	//protected $primaryKey ="group_id";
	
	protected $fillable = array(
		'name', 'description'
	);
	
	public $timestamps = false;
	
	public function users()
	{
	    return $this->belongsToMany('Cemleme\Cmauth\models\User','cmauth_group_user','group_id','user_id');
	}
	
	public function permissions()
	{
	    return $this->belongsToMany('Cemleme\Cmauth\models\Permission','cmauth_group_permission','group_id','permission_id');
	}
 
}