<?php
// (A) LOAD LIBRARY
require "2-lib-user.php";

// (B) TRY LOGGING IN AS DIFFERENT USERS
echo $_USR->login("jon@doe.com", "123456") ? "OK" : $_USR->error;
// echo $_USR->login("joe@doe.com", "123456") ? "OK" : $_USR->error;

// (C) TO LOGOUT
// if (isset($_SESSION["user"])) { unset($_SESSION["user"]); }

// (D) WHO AM I?
print_r($_SESSION);