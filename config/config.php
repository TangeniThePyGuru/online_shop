<?php

use App\Models\Session;

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/');
// bring up the global session variable
require_once app('models.php');
$sessionInstance =  Session::getInstance();

// global variables and configurations
function app_footer() {
    return view("partials/footer.php");
}

function app_header() {
    return require_once view("partials/header.php");
}

function view($file_name) {
   return ROOT_PATH . "views/$file_name";
}

function app($file_name)
{
    return ROOT_PATH . "app/$file_name";
}

function assets($file_name)
{
    return ROOT_PATH . "assets/$file_name";
}

function config($file_name)
{
    return ROOT_PATH . "config/$file_name";
}

function extend_layout($layout = "views/layouts/layout.php") {
    return require_once ROOT_PATH. $layout;
}

// close every page that extends the layout page with this method
function close_layout() {
    return app_footer();    
}

// get request
function get_request($key)
{
    return isset($_GET) && array_key_exists($key, $_GET);   
}

// post request
function post_request($key)
{
    return isset($_POST) && array_key_exists($key, $_POST) ;
}

function controller($file_name)
{
    return "/app/controllers/$file_name"; 
}

function redirect_to($file_name, $param = null){
    if ($param != null):
        header("Location: $file_name?id=$param");
    else:
        header("Location: $file_name");
    endif;
}

function hidden_field($field_name) {
    return `<input type="text" hidden name="${field_name}" value="${field_name}">`;
}