<?php namespace Cemleme\Cmauth\managers;

use Session;

class LDAP {
 
	public static function authenticate($username, $password){
		

		if(!config('cmauth.ldap')){
			Session::flash('ldap_error', "ldap is not set for this application");
			return false;
		}


		if(empty($username) or empty($password)){
			Session::flash('ldap_error','Error binding to LDAP: username or password empty');
			return false;
		}


		if(!$ldapconn = ldap_connect( config('cmauth.ldap_server'), config('cmauth.ldap_port') )){
			Session::flash('ldap_error', "Could not connect to LDAP server.");
			return false;
		} 
		 
		$ldapRdn = config('cmauth.ldap_domain') . "\\" . $username;
		 
		if ($ldapconn){
			$ldapbind = @ldap_bind($ldapconn, $ldapRdn, $password);
		 
			if ($ldapbind){
				return true;
			} 
			else {
				Session::flash('ldap_error', 'You have entered wrong username and password');
				return false;
			}
		 
			ldap_unbind($ldapconn);
		 
		 } 
		 else {
			Session::flash('ldap_error', 'Error connecting to LDAP.');
			return false;
		 }
		 
		 return false;
	}
}