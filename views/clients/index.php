<?php

use App\Models\Client;

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . "config/config.php";

require_once app('models.php');

$client = new Client()
?>
<?php extend_layout(); ?>


<div id="dash">

    <p> <?php var_dump($client->get_many()); ?> </p>

</div>


<?php close_layout(); ?>