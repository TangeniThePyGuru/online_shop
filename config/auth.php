<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/'. 'config/config.php');

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
}

// logout

function logout()
{
    end_session();
    redirect_to('/index.php');
}


function end_session()
{
    global $session;
    return $session->destroy();
}

function is_logged_in(){
    global $session;
    return isset($_SESSION['logged_in_user']);
}

function is_admin()
{
    if (is_logged_in() && logged_in_user()['admin']):
        return true;
    else:
        return false;
    endif;
}

// TEST: who is the currnt logged in user's full profile
function logged_in_user(){
    global $client;
    global $session;
    if (is_logged_in()){
        return mysqli_fetch_assoc($client->get_one($session->__get('logged_in_user')));
    }
    return null;
}

