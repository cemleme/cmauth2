<?php
 
namespace Cemleme\Cmauth\models;
 
use Eloquent;

class Notification extends Eloquent {
	
	protected $table = "notifications";
	
	protected $guarded = ['id'];
	
	public function users()
	{
	    return $this->belongsToMany(config('auth.model'),'notification_user','notification_id')->withPivot('read_at');
	}

	public function scopeHaveunread($query)
	{
		 return $query->where('read_at', NULL)->count();
	}

	public function scopeUnread($query)
    {
        return $query->where('read_at', NULL)->orderBy('created_at','desc');
    }

    public function scopeUnreadmodal($query)
    {
        return $query->where('read_at', NULL)->where('showmodal','on')->orderBy('created_at','desc');
    }
    
    public function scopeRead($query)
    {
        return $query->whereNotNull('read_at');
    }
 
}