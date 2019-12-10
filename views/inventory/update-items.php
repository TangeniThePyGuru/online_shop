<?php

use App\Models\Item;

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . "config/config.php";

require_once app('models.php');

$item = new Item();
?>
<?php extend_layout(); ?>


<div id="dash">

    <?php
    $item = mysqli_fetch_assoc($item->get_one($_GET['id']));
    ?>

    <form method="<?php controller('item.controller.php') ?>" action="post">
        <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
        <label for="name">Item name:</label>
        <input type="text" name="name" value="<?php echo $item['name'] ?>">
        <label for="description">Items Description:</label>
        <input type="text" name="descripion" value="<?php echo $item['description'] ?>">
        <label for="price">Price</label>
        <input type="text" name="price" value="<?php echo $item['price'] ?>">
        <label for="quantity">Stock Quantity:</label>
        <input type="text" name="quantity" value="<?php echo $item['quantity'] ?>">

        <input type="submit" value="Update">
    </form>

</div>


<?php close_layout(); ?>