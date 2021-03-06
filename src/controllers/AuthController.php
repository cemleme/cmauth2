<?php namespace Cemleme\Cmauth\controllers;

use Illuminate\Routing\Controller;
use View;
use Redirect;
use Input;
use Auth;
use Session;
use Validator;
use Hash;
use DateTime;
use Cemleme\Cmauth\models\User;

use Cemleme\Cmauth\managers\LDAP;

class AuthController extends Controller {


	public function __construct() { 

		$this->middleware('auth', ['except' => ['getLogin', 'postLogin', 'getResetrequest']]); 
		$this->middleware('acl:CmauthAdmin', ['only' => ['getIndex']]); 

	}
	
	public function getIndex() {
		return view("cmauth::cmauthpanel");
	}
	
	public function getLogin() {
		return view(config('cmauth.loginview'));
	}

	public function getResetrequest() {
		return view('cmauth::layouts.requestPasswordReset');
	}

	protected function processLogin($user){
		$user->last_login = new DateTime();
    	$user->save();
	}
	
	public function postLogin(LDAP $ldap) {


		if(!$user = User::where('email', Input::get('email'))->first()){
 			return Redirect::to('/cmauth/login')
				->withInput(Input::except('password'))
				->withErrors([trans("cmauth::gui.loginnousererror")]);
 		}
		

		$remember = (Input::has('remember')) ? true : false;

		if($user->ldap>0 && config('cmauth.ldap')){
			if($ldap->authenticate(strstr(Input::get('email'), '@', true), Input::get('password'))){
	 			Auth::login($user, $remember);
	 			$this->processLogin($user);
	 			return Redirect::intended('/');

			}
			else{
 				return Redirect::to('/cmauth/login')
						->withInput(Input::except('password'))
						->withErrors([Session::get('ldap_error')]);
			}
		}
	
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')),$remember)) {
			$this->processLogin(Auth::user());
			return Redirect::intended('/');
		} 
		else {
			return Redirect::to('/cmauth/login')
				->withInput(Input::except('password'))
				->withErrors([trans("cmauth::gui.loginpwderror")]);
		}         
	}
	
	public function getLogout() {
		Auth::logout();
		return Redirect::to('/cmauth/login')->with('message', trans("cmauth::gui.logoutmessage"));
	}	
	
	public function postChangepassword(){
		$validator = Validator::make(Input::all(), User::$change_password_rules);
	 
		if ($validator->passes()) {

			$user = User::findOrFail(Auth::user()->id);

			if (!Hash::check(Input::get('current_password'), $user->password))
			{ 
			   return Redirect::to('/cmauth/settings')->withErrors(trans("cmauth::gui.currentpwderror"));
			}

			
			$user->password = Hash::make(Input::get('password'));
			$user->pwdchanged = 1;
			$user->save();

			Session::put('pwdchanged', 1);
		 
			return Redirect::to('/')->with('message', 'Password changed');
		} 
		else {
			return Redirect::to('/cmauth/settings')->withErrors($validator)->withInput();
		}
	}


	public function getPassword() {
		if(Auth::user()->ldap>0 && config('cmauth.ldap'))
			return Redirect::to('/')->with('message', trans("cmauth::gui.ldappwdmessage"));
		
		return view('cmauth::layouts.changepassword');
	}	
}


