<?php

return [
	'dear' => 'Sayın',
    
    'emailfooter' => 'Bu e-posta '.Config::get('cmauth.appfulltitle').' sistemi tarafından gönderilmiştir.
                     <br/>
                     Lütfen bu e-postayı yanıtlamayınız.',

    'ldapheader' => Config::get('cmauth.appfulltitle').' sistemine kaydınız e-mail hesabınıza entegre edilmiştir.
                    <br/>
                    Sisteme <b>kullanıcı adı olarak :email e-posta adresinizi</b> ve şifresini kullanarak giriş yapabilirsiniz.',

    'ldapfooter' => 'Sisteme girmek için yukarıdaki düğmeye tıklayabilir veya bu adresi kullanabilirsiniz :url
                    <br/><br/>
                    Lütfen şifrenizi kimseyle paylaşmayınız.',

    'pwdresetheader' => 'Şifrenizi değiştirmek için aşağıdaki düğmeye tıklayınız.
                        <br/> 
                        Şifre sıfırlama talep etmediyseniz bu e-postayı siliniz.
                        <br/>
                        Bu form :minutes dakika içerisinde zaman aşımına uğrayacaktır.',

    'pwdresetfooter' => 'Düğme çalışmıyorsa aşağıdaki adresi internet tarayıcınıza kopyalayarak girebilirsiniz.
                        <br/>
                        :url',       

    'resetpassword' => 'Şifreyi Sıfırla',

    'pwdresettitle' => 'Şifre Sıfırlama Talebi',

    'subjectldap' => Config::get('cmauth.appfulltitle').' Erişim Bilgilendirmesi',

    'subjectwelcome' => Config::get('cmauth.appfulltitle').' - Hoşgeldiniz',

    'subjectnewpassword' => Config::get('cmauth.appfulltitle').' - Yeni Şifre',

    'subjectpwdreset' => 'Şifre Sıfırlama Talep Edildi'   
];