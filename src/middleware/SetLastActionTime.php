<?php namespace Cemleme\Cmauth\middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use DateTime;

class SetLastActionTime {
	
	protected $auth;
	protected $permissionRefresher;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	public function handle($request, Closure $next)
	{
		$response = $next($request);

		$user = $this->auth->user();

		if ($user) {
			date_default_timezone_set('Europe/Istanbul');
			$now = new DateTime();
			$user->last_activity = $now;
			$user->save();
		}

		return $response;
	}

}
