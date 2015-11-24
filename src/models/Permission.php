<?php
 
namespace Cemleme\Cmauth\models;
 
use Eloquent;

class Permission extends Eloquent {
	
	protected $table = "cmauth_permissions";
	//protected $primaryKey ="permission_id";
	
	protected $fillable = array(
		'name', 'description'
	);
	
	public $timestamps = false;
	
	public function groups()
	{
	    return $this->belongsToMany('Cemleme\Cmauth\models\Group','cmauth_group_permission','permission_id','group_id');
	}
 
}