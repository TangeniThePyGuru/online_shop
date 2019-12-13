<?php

use App\Models\Cart;
use App\Models\Item;

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . "config/config.php";

require_once app('models.php');

$item = new Item();
$cart = new Cart();
?>
<?php extend_layout(); ?>

<!-- TODO: Read up on sessions before implementation -->
<div id="dash">

    <p> <?php var_dump($cart->get_cart());
        $items = $item->get_many(); ?> </p>

    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($items)) : ?>

            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['description']  ?></td>
                <td><?php echo $row['price'] ?></td>
                <td> <img src="<?php echo $row['img_url'] ?>" width="100px" alt="item_image"> </td>
            </tr>

        <?php endwhile; ?>
    </table>

    <div>
        <!-- add to cart in the current users session -->
        <form action="<?php echo controller('items.controller.php') ?>" method="post">
            <input type="hidden" name="make_order">
            <input type="submit" value="ORDER ITEMS">
        </form>
    </div>

</div>


<?php require_once close_layout(); ?>