<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . "config/config.php";
require_once app('models/Item.php');

if (get_request('insert')):
    #....
elseif (get_request('delete')):
    #....
else : # else update
    #....
endif

?>