<?php

return [
	'dear' => 'Dear',
    
    'emailfooter' => 'This e-mail was sent by '.Config::get('cmauth.apptitle').
                     '<br/>
                     Please do not reply this e-mail.',

    'ldapheader' => 'You are registered to '.Config::get('cmauth.apptitle').
                    '<br/>
                    You can access the system with your <b>username as :email</b>, using your e-mail password.',

    'ldapfooter' => 'You can enter the system by clicking the button above or from :url
                    <br/><br/>
                    Please do not share your password with anyone.'
];