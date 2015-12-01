<?php namespace Cemleme\Cmauth\Mailers;

use Cemleme\Cmauth\models\User;
use Config;

class UserMailer extends Mailer{

	public function welcomeLDAP(User $user)
	{
		$view = "cmauth::emails.userLDAPWelcomeMail";
		$subject = trans('cmauth::emails.subjectldap');

		return $this->sendTo($user, $subject, $view);
	}
	
	public function welcome(User $user, $password)
	{
		$view = "cmauth::emails.userWelcomeMail";
		$subject = trans('cmauth::emails.subjectwelcome');

		$data['password']=$password;

		return $this->sendTo($user, $subject, $view, $data);
	}

	public function newPassword(User $user, $password)
	{
		$view = "cmauth::emails.userNewPasswordMailByAdmin";
		$subject = trans('cmauth::emails.subjectnewpassword');

		$data['password']=$password;

		return $this->sendTo($user, $subject, $view, $data);
	}

}