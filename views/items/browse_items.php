<?php

use App\Models\Item;

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . "config/config.php";

require_once app('models.php');

$item = new Item();
?>
<?php extend_layout(); ?>

<!-- TODO: Implement search items | use data tables or something else -->

<div id="dash">

    <?php $items = $item->get_many(); ?>

    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($items)): ?>

            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['description']  ?></td>
                <td><?php echo $row['price'] ?></td>
                <td> <img src="<?php echo $row['img_url'] ?>" width="100px" alt="item_image">  </td>
            </tr>

        <?php endwhile; ?>
    </table>

</div>

<?php close_layout(); ?>