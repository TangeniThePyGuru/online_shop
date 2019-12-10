<?php

use App\Models\Item;

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . "config/config.php";

require_once app('models.php');

$item = new Item();
?>
<?php extend_layout(); ?>


<div id="dash">

    <?php
    $items = $item->get_many();
    ?>

    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>In Stock</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($items)) : ?>

            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['description'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td><?php echo $row['quantity'] ?></td>
                <td> <img src="<?php echo $row['img_url'] ?>" width="100px" alt="item_image"> </td>
                <td>
                    <form action="<?php echo controller('item.controller.php') ?>" method="get">
                        <!-- <?php echo hidden_field('edit_item') ?> -->
                        <input type="text" hidden name="edit_item" value="edit_item">
                        <input type="text" hidden name="id" value="<?php echo $row['id'] ?>">
                        <span class="button"><input type="submit" value="EDIT"></span>
                    </form>
                </td>
            </tr>

        <?php endwhile; ?>
    </table>

</div>


<?php close_layout(); ?>