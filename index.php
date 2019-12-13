<?php

require_once "config/config.php";

?>
<?php extend_layout(); ?>


<div class="center-text">

    <h3>Welcome to the Onlne Store!</h3>

    <form action="login.php" method="get">
        <input type="text" hidden name="role" value="1">
        <input type="submit" value="Admin">
    </form>
    <br>
    <form action="login.php" method="get">
        <input type="text" hidden name="role" value="0">
        <input type="submit" value="Client">
    </form>

</div>


<?php close_layout(); ?>