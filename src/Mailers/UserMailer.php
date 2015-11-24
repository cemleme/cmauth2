<?php namespace Cemleme\Cmauth\Mailers;

use Cemleme\Cmauth\models\User;
use Config;

class UserMailer extends Mailer{

	public function welcomeLDAP(User $user)
	{
		$view = "cmauth::emails.userLDAPWelcomeMail";
		$subject=Config::get('app.title')." access information";

		return $this->sendTo($user, $subject, $view);
	}
	
	public function welcome(User $user, $password)
	{
		$view = "cmauth::emails.userWelcomeMail";
		$subject='Welcome to '.Config::get('app.title');

		$data['password']=$password;

		return $this->sendTo($user, $subject, $view, $data);
	}

	public function newPassword(User $user, $password)
	{
		$view = "cmauth::emails.userNewPasswordMailByAdmin";
		$subject=Config::get('app.title').' - New Password';

		$data['password']=$password;

		return $this->sendTo($user, $subject, $view, $data);
	}

}