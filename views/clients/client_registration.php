<?php

use App\Models\Client;

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . "config/config.php";

require_once app('models.php');

$client = new Client()
?>
<?php extend_layout(); ?>


<div id="dash">

    <form action=" <?php echo app('controllers/auth.controller.php')  ?> " method="post">
        <?php echo hidden_field('register_client') ?>

        <label for="name">Name:</label>
        <input type="text" name="name">

        <label for="email">Email:</label>
        <input type="text" name="email">

        <label for="password">Password:</label>
        <input type="password" name="password">

        <input type="submit" value="Register">
    </form>

</div>


<?php close_layout(); ?>