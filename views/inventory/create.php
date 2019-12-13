<?php

use App\Models\Item;

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . "config/config.php";

require_once app('models.php');

$item = new Item();
?>
<?php extend_layout(); ?>


<div class="center-text">

    <h3>Add New Item</h3>

    <form method="post" action="<?php echo "/app/controllers/item.controller.php" ?>">
        <input type="hidden" name="insert">

        <label for="name">Item name:</label>
        <input type="text" name="name">
        <br>
        <br>
        <label for="description">Items Description:</label>
        <input type="text" name="descripion">
        <br>
        <br>
        <label for="price">Price</label>
        <input type="text" name="price" >
        <br>
        <br>
        <label for="quantity">Stock Quantity:</label>
        <input type="text" name="quantity" >
        <br>
        <br>
        <input type="submit" value="+ CREATE">
    </form>

</div>


<?php close_layout(); ?>