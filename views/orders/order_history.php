<?php

use App\Models\Cart;
use App\Models\Order;

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
require_once config('auth.php')

?>
<?php extend_layout();
$cart = new Cart();
$payment = null;
$name = '';
$billing_address = '';
$order = new Order();
$orders = $order->get_many();


$user = logged_in_user();
// die(var_dump($user));
if (is_logged_in()) :
    $name = $user['name'];
    $billing_address = $user['address'];
endif;
?>

<?php
if (is_logged_in()) :
    ?>
    <h4> Customer: </h4>
    <?php
        print("$name <br /> $billing_address <br />");
        ?>
<?php
endif;
?>

<div class="center-text">


    <table class="center-text" style="margin: auto">
        <caption> Order Hisory </caption>
        <tr>
            <th> Order# </th>
            <th> Quantity Ordered </th>
            <th> Item Cost </th>
            <th> Time Processed </th>
        </tr>
        <?php $count = 0;
        while ($row = mysqli_fetch_assoc($orders)) : ?>

            <tr align="center">
                <td> <?php echo $row['id']  ?> </td>
                <td> <?php echo $order->client()['id']  ?> </td>
                <td> <?php echo $row['total_cost']; ?> </td>
                <td> <?php echo $row['created_at'] ?></td>
            </tr>

        <?php endwhile; ?>
    </table>

</div>
<?php close_layout(); ?>