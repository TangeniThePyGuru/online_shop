<?php

use App\Models\Cart;

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
require_once config('auth.php')

?>
<?php extend_layout();
$cart = new Cart();
$payment = null;
if (!$cart->cart_is_empty()) :
    $items = $cart->items_in_cart();
    $quantities = $cart->quantities();
    $payment = $_POST['payment'];
endif;
?>

<?php
if (is_logged_in()) :
    ?>
    <h4> Customer: </h4>
    <?php
        print("$name <br /> $street <br /> $city <br />");
        ?>
<?php
endif;
?>

<div class="center-text">

    <?php if (!$cart->cart_is_empty()) : ?>
        <table class="center-text" style="margin: auto">
            <caption> Order Information </caption>
            <tr>
                <th> Product </th>
                <th> Unit Price </th>
                <th> Quantity Ordered </th>
                <th> Item Cost </th>
            </tr>
            <?php $count = 0;
                while ($row = mysqli_fetch_assoc($items)) : ?>

                <tr align="center">
                    <td> <?php echo $row['name']  ?> </td>
                    <td> <?php printf("$ %4.2f", $row['price']) ?> </td>
                    <td> <?php echo $quantities[$count]; ?> </td>
                    <td> <?php printf("$ %4.2f", $row['price'] * $quantities[$count]); ?>
                    </td>
                </tr>

            <?php endwhile; ?>
        </table>
    <?php
    endif;
    ?>
    <br>
    <br>
    <div class="center-text">
        <?php
        print("You ordered {$cart->total_items()} items <br/>");
        printf("Your total bill is: {$cart->total_cost()} <br/>");
        print("Your chosen method of payment is: $payment <br/>");
        ?>
    </div>

</div>
<?php close_layout(); ?>