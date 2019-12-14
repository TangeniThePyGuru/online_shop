<?php

use App\Models\Client;

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . "config/config.php";
require_once config("auth.php");
// $client = new Client();

if (post_request('admin')) :
    #....
elseif (post_request('client')) :
#....
elseif (get_request('logout')) :
    logout();
elseif (post_request('auth_admin')):
    #...
    die(var_dump($_POST));
elseif (post_request('auth_client')) :
    #...
    // die(var_dump($_POST));
    $client = login($_POST['email'], $_POST['password']);
    // die(var_dump($client));
    if ($client != null){
        // redirect to appropriate page
        redirect_to('/views/items/browse_items.php');
    } else {
        redirect_to('/views/partials/error.php');
    }
elseif (post_request('register_client')):
    $client = register($_POST['name'], $_POST['email'], $_POST['password'], $_POST['address']);
    if ($client){
        redirect_to('/views/partials/success.php');
    } else {
        redirect_to('/views/partials/error.php');
    }    
endif

?>