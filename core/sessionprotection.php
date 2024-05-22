<?php
ini_set('session.cookie_httponly',1);
ini_set('session.cookie_samesite','Lax');
ini_set('session.use_only_cookies',1);
ini_set('session.use_strict_mode',0);
ini_set('session.cookie_secure',0);


// $cookieParams = session_get_cookie_params();

// // التحقق من القيم المفعلة
// if ($cookieParams['httponly'] == 1 &&
//     $cookieParams['secure'] == 1 &&
//     $cookieParams['samesite'] == 'Lax') {
//     echo 'تم تفعيل إعدادات الجلسة بنجاح.';
// } else {
//     echo 'فشل في تفعيل إعدادات الجلسة بشكل صحيح.';
// }

?>