<?php
Route::group(array('middleware' => ['auth', 'acl:ViewLog']), function()
{
	Route::get('/mail/test', function(){
		$name="cem";
		$email="cem@eser.com";
		return view('cmauth::emails.userLDAPWelcomeMail', compact('name', 'email'));
	});
});

Route::group(array('middleware' => ['auth', 'acl:ViewLog']), function()
{
	Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});

Route::group(array('middleware' => ['auth']), function()
{

	Route::get('cmauth/user/password', 'Cemleme\Cmauth\controllers\UsersController@changePasswordView');

	Route::put('cmauth/users/{id}/ldapwelcomemail', 'Cemleme\Cmauth\controllers\UsersController@sendLDAPWelcomeMailToUser');
	Route::put('cmauth/users/{id}/welcomemail', 'Cemleme\Cmauth\controllers\UsersController@sendWelcomeMailToUser');
	Route::put('cmauth/users/{id}/yenisifremail', 'Cemleme\Cmauth\controllers\UsersController@sendNewPasswordMailToUser');

	Route::post('cmauth/users/{id}/groups/connect', 'Cemleme\Cmauth\controllers\UsersController@connectUserGroup');
	Route::delete('cmauth/users/{uid}/groups/{gid}', 'Cemleme\Cmauth\controllers\UsersController@deleteUserGroup');
	Route::post('cmauth/groups/{id}/permissions/connect', 'Cemleme\Cmauth\controllers\UsersController@connectGroupPermission');
	Route::delete('cmauth/groups/{gid}/permissions/{pid}', 'Cemleme\Cmauth\controllers\UsersController@deleteGroupPermission');
	Route::controller('cmauth/usersapp', 'Cemleme\Cmauth\controllers\UsersController');

	Route::resource('cmauth/users', 'Cemleme\Cmauth\controllers\UsersRC');
	Route::resource('cmauth/groups', 'Cemleme\Cmauth\controllers\GroupsRC');
	Route::resource('cmauth/permissions', 'Cemleme\Cmauth\controllers\PermissionsRC');



	Route::post('cmauth/notifications/modal', 'Cemleme\Cmauth\controllers\NotificationsController@modalRead');
	Route::resource('cmauth/notifications', 'Cemleme\Cmauth\controllers\NotificationsController');
	Route::put('cmauth/notifications/assign/group', 'Cemleme\Cmauth\controllers\NotificationsController@assignGroup');
	Route::put('cmauth/notifications/assign/user', 'Cemleme\Cmauth\controllers\NotificationsController@assignUser');
	Route::delete('cmauth/notifications/remove/user', 'Cemleme\Cmauth\controllers\NotificationsController@removeUser');
	Route::put('cmauth/notifications/{id}/assign/all', 'Cemleme\Cmauth\controllers\NotificationsController@assignAll');
	Route::put('cmauth/notifications/{id}/remove/all', 'Cemleme\Cmauth\controllers\NotificationsController@removeAll');
	Route::get('/notifications/{id}', 'Cemleme\Cmauth\controllers\NotificationsController@show');
	Route::get('/notifications', 'Cemleme\Cmauth\controllers\NotificationsController@mynotifications');

});

Route::get('login', 'Cemleme\Cmauth\controllers\AuthController@getLogin');
Route::controllers([
	'cmauth' => 'Cemleme\Cmauth\controllers\AuthController',
	'auth' => 'Cemleme\Cmauth\controllers\AuthController',
	'password' => 'Cemleme\Cmauth\controllers\PasswordController',
]);