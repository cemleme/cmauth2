<?php namespace Cemleme\Cmauth\Mailers;

use Mail;

abstract class Mailer{
	
	public function sendTo($user, $subject, $view, $data = []){
		$data['name']=$user->name;
		$data['email']=$user->email;

		Mail::send($view, $data, function($message) use ($user, $subject)
		{
			$message->to($user->email)
					->subject($subject);
		});
	}
}