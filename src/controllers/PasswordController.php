<?php namespace Cemleme\Cmauth\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller {
	
	protected $subject = "";

	use ResetsPasswords;
	
	public function __construct(Guard $auth, PasswordBroker $passwords)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;
		$this->middleware('guest');
		$this->subject = trans("cmauth::emails.subjectpwdreset");
	}

	public function getReset($token = null)
	{
		if (is_null($token))
		{
			throw new NotFoundHttpException;
		}

		return view('cmauth::layouts.resetPassword')->with('token', $token);
	}


}