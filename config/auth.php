<?php

use App\Models\Client;
use App\Models\Session;

$client = new Client();
$session = Session::getInstance();
$user_table = 'clients';

// register client
function register($name, $email, $password, $address){
    global $client;
    return $client->insert([$name, $email, hash('md5', $password), $address]);
}

// login
function login($email, $password)
{
    global $client;
    global $session;
    global $user_table;
    $password = hash('md5', $password);
    $query = "SELECT * FROM $user_table WHERE  email = '$email' AND password = '$password'";
    // die($query);
    $user = $client->query_db($query);
    // die(var_dump($user));
    if($user != null) {
        $user = mysqli_fetch_assoc($user);
        $session->__set('logged_in_user', $user['id']);
        return $user;
    } else {
        return null;
    } 

    // redirect to appropriate page
    redirect_to(view('items/browse_items.php'));
}

// logout
// TODO: Test logout
function logout()
{
    end_session();
    redirect_to('/index.php');
}

// kill session
function end_session()
{
    global $session;
    return $session->destroy();
}
// is user logged_in?

function is_logged_in(){
    global $session;
    return isset($session['logged_in_user']);
}

// who is the currnt logged in user's full profile
function logged_in_user(){
    global $client;
    global $session;
    if (is_logged_in()){
        return $client->get_one($session['logged_in_user']);
    }
    
    return null;
}

