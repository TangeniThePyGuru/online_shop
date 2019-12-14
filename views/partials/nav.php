<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/' . "config/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/' . "config/auth.php";
?>
<div id="nav">
    <!-- TODO: Add authorizations to this routes -->
    <a href="/index.php">Home</a>
    <!-- <br> -->
    <a href="/views/items/browse_items.php">Browse Items</a>
    <!-- <br> -->
    <!-- <br> -->
    <a href="/views/items/shopping_cart.php">Shopping Cart</a>
    <!-- <br> -->
    <?php
    if (is_admin()) :
        ?>
        <a href="/views/inventory/index.php">Inventory</a>
    <?php
    endif;
    ?>

    <?php
    if (is_logged_in()) :
        ?>
        <a href="/views/orders/make_an_order.php">Order Hitory</a>
        <a href="/app/controllers/auth.controller.php?logout=1">Logout</a>
    <?php
    endif;
    ?>

    <?php
    if (!is_logged_in()) :
    ?>
        <a href="/views/clients/client_registration.php">Register</a>
    <?php
    endif;
    ?>


</div>