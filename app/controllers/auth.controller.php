<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . "config/config.php";
require_once config("auth.php");

// die('testing');

if (post_request('admin')) :
    #....
elseif (post_request('client')) :
    #....
endif

?>