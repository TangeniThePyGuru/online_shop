<?php

use App\Models\Client;

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . "config/config.php";
require_once app('models/Client.php');

$client = new Client();

if (get_request('insert')) :

    $client->insert([
        $_GET['name'], $_GET['email'], $_GET['password'], $_GET['address'], $_GET['admin']
    ]);
elseif (get_request('delete')) :
    $client->delete($_GET['id']);
else: # else update
    #....
endif;

redirect_to('client/index.php');

?>