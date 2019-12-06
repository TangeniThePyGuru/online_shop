<?php

require_once "config/config.php";

?>
<?php extend_layout(); ?>

<?php

if ($_GET['role'] == 1){
    require_once view('auth/admin_login.php');
} else {
    require_once view('auth/client_login.php');
}
?>

<?php close_layout(); ?>