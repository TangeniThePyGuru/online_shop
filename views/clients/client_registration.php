<?php

use App\Models\Client;

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . "config/config.php";

require_once app('models.php');

$client = new Client()
?>
<?php extend_layout(); ?>


<div id="dash">

    <form action="/app/controllers/auth.controller.php " method="post">
        <input type="hidden" name="register_client" value="post">

        <label for="name">Name:</label>
        <input type="text" name="name">
        <br>
        <br>
        <label for="email">Email:</label>
        <input type="text" name="email">
        <br>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password">
        <br>
        <br>
        <label for="password">Address:</label>
        <input type="text" name="address">
        <br>
        <br>
        <input type="submit" value="Register">
    </form>

</div>


<?php close_layout(); ?>