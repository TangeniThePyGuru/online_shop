<?php

use App\Models\Cart;
use App\Models\Item;

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . "config/config.php";

require_once app('models.php');

$item = new Item();
$cart = new Cart();
?>
<?php extend_layout(); ?>

<div class="center-text">

    <?php

    // loop through the session[cart] and find every element in the db 
    if (!$cart->cart_is_empty()) :
        $items = $cart->items_in_cart();
        $quantities = $cart->quantities();
    endif;
    ?>

    <div">
        <!-- add to cart in the current users session -->
        <?php
        if (!$cart->cart_is_empty()) :
            ?>
            <form action="<?php echo controller('items.controller.php') ?>" method="post">
                <!-- TODO: Implement make an order -->
                <input type="hidden" name="make_order">
                <input type="submit" value="ORDER ITEMS">
            </form>
            <br>
            <form action="<?php echo controller('items.controller.php') ?>" method="post">
                <!--TODO: implement clear cart-->
                <input type="hidden" name="clear_cart">
                <input type="submit" value="REMOVE ITEMS FROM CART">
            </form>
        <?php
        else :

        endif;
        ?>
</div>
<br>
<?php
if (!$cart->cart_is_empty()) :
    ?>
    <table>
        <tr>


            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Image</th>

        </tr>
        <?php
            $count = 0;
            while ($row = mysqli_fetch_assoc($items)) : ?>

            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['description']  ?></td>
                <td><?php echo $row['price'] ?></td>
                <td><?php echo $quantities[$count] ?></td>
                <td> <img src="<?php echo $row['img_url'] ?>" width="100px" alt="item_image"> </td>
            </tr>

        <?php
                $count++;
            endwhile;
        ?>

    </table>
<?php
else:
?>


<p> No Items in Cart!</p>

<?php
endif;
?>
</div>


<?php require_once close_layout(); ?>