<?php
// (A) LOAD LIBRARY
require "2-lib-user.php";

// (B) GET USER
$user = $_USR->get("jon@doe.com");
if ($user===false) { echo $_USR->error . "\r\n"; }
print_r($user);

// (C) SAVE USER
echo $_USR->save("job@doe.com", "123456", 1) ? "OK" : $_USR->error . "\r\n" ;
// echo $_USR->save("joy@doe.com", "123456", 1) ? "OK" : $_USR->error . "\r\n" ;

// (D) DELETE USER
echo $_USR->del(123) ? "OK" : $_USR->error . "\r\n" ;
// echo $_USR->del(4) ? "OK" : $_USR->error . "\r\n" ;