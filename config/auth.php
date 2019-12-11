<?php

use App\Models\Client;

$client = new Client();

function register($name, $email, $password, $address){
    global $client;
    return $client->insert([$name, $email, hash('md5', $password), $address]);
}

// login
function login($email, $password)
{
    global $client;
    $user = $client->query_db("SELECT * FROM clients where  email = $email AND password = ${hash('md5',$password)}");

    if($user) {
        // TODO: start a new session
    } else {
        // TODO: flush message => wrong credentials
    }

    // redirect to appropriate page
}

/*
    TODO: Implement logout
*/

// logout
function logout()
{
    # code...
}

/*
    TODO: Implement start session
*/

// start session
function begin_session()
{
    # code...
}

/*
    TODO: Implement end_session
*/

// kill session
function end_session()
{
    # code...
}
// TODO: is user logged_in?
function logged_in(){
    # code...
}

// TODO: who is the currnt logged in user's full profile
function logged_in_user(){
    # code....
}

