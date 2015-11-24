<h2>CMAUTH2</h2>

Cmauth2 is a Role Based Access Control Authentication package developed for <b>Laravel 5.1.11</b> applications.<br/>
You can creating unlimited Groups (Roles) and Permissions and assign your users to Groups.

Afterwards you can use your filters and facades to check if the logged in user has proper permission for the current route / controller / method / view part.

<hr/>

<h3>Features:</h3>

<ul>
	<li>Creating and managing Users, Groups (Roles) and Permissions</li>
	<li>Managing login / logout / remember steps</li>
	<li>Permissions checks with filters and facades</li>
	<li>Option to choose different users to have passwords on the system or check credentials through LDAP</li>
	<li>Cmauth admin panel to assign users and permissions to groups</li>
</ul>

<hr/>

<h3>Requirements:</h3>

<ul>
	<li>Laravel 5</li>
	<li>PHP ldap extension (if you require LDAP authentication)</li>
</ul>

<hr/>

<h3>Setup:</h3>

In the require key of <b>composer.json</b> file add the following

```
"cemleme/cmauth2": "dev-master"
```

Run the Composer update comand 

```
$ composer update cemleme/cmauth
```

In your <b>config/app.php</b> add <b>CmauthServiceProvider</b> to the end of the providers array

```
'providers' => [
    ...
    'Cemleme\Cmauth\CmauthServiceProvider',
],
```


Assign same User model at <b>config/auth.php</b>

```
'model' => 'Cemleme\Cmauth\models\User'  //(or \App\User if you extend \Cemleme\Cmauth\models\User)
```

Publish config file <b>config/cmauth.php</b> using artisan publish command:

```
php artisan vendor:publish --provider="Cemleme\Cmauth\CmauthServiceProvider"
```

<hr/>

<h3>Cmauth Config File:</h3>

<ul>
	<li>'mastertemplate' : The template you want to wrap Cmauth admin panel. It looks for @yield('content') at the template page</li>
	<li>'loginview' => Your desired login page. Cmauth is compatible with default Laravel 5 login page. You do not need any extra fields</li>
	<li>'ldap' => Optional. Set it to true if you want to use LDAP authentication</li>
	<li>'ldap_domain' => Required if 'ldap' => true. Your LDAP domain name  </li>
	<li>'ldap_server' => Required if 'ldap' => true. IP address of your LDAP server</li>
	<li>'ldap_port' => Required if 'ldap' => true. Port of your LDAP server</li>
</ul>
