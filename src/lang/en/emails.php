<?php

return [
	'dear' => 'Dear',
    
    'emailfooter' => 'This e-mail was sent by '.Config::get('cmauth.appfulltitle').
                     '<br/>
                     Please do not reply this e-mail.',

    'ldapheader' => 'You are registered to '.Config::get('cmauth.appfulltitle').
                    '<br/>
                    You can access the system with your <b>username as :email</b>, using your e-mail password.',

    'ldapfooter' => 'You can enter the system by clicking the button above or from :url
                    <br/><br/>
                    Please do not share your password with anyone.',

    'pwdresetheader' => 'Please click the button below to reset your password.
                        <br/> 
                        Please disregard this e-mail if you have not asked for password reset.
                        <br/>
                        This form will expire in :minutes minutes.',

    'pwdresetfooter' => 'If the button is not working, you can also copy the link below <br/>and paste it on your browser.
                        <br/>
                        :url',       

    'resetpassword' => 'Reset Password',

    'pwdresettitle' => 'Password Reset Request',

    'subjectldap' => Config::get('cmauth.appfulltitle').' access information',

    'subjectwelcome' => 'Welcome to '.Config::get('cmauth.appfulltitle'),

    'subjectnewpassword' => Config::get('cmauth.appfulltitle').' - New Password',

    'subjectpwdreset' => 'Password Reset Requested'


];