<?php

use App\Models\Cart;
use App\Models\Item;

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . "config/config.php";
require_once app('models/Item.php');
$item = new Item();
$cart = new Cart();

if (isset($_POST) && post_request('insert')):
    #....
    $item->insert([
        $_POST['name'], $_POST['description'], $_POST['quantity'], $_POST['price']
    ]);

    if($item == true):
        redirect_to('/views/inventory/index.php');
    else:
        redirect_to('/views/inventory/create.php');
    endif;
elseif (isset($_GET) &&  get_request('delete')):
    #....
    die('lets update an item in the inventory');
elseif (isset($_GET) && get_request('edit_item')): # else update
    #....
    // die(var_dump($_POST));
    redirect_to('/views/inventory/update-items.php', $_GET['id']);
elseif (isset($_POST) &&  post_request('add_to_cart')) : # else update
    #....
    $elems = $cart->add_to_cart($_POST['item_id'], $_POST['quantity']);
    redirect_to('/views/items/browse_items.php');
elseif (isset($_POST) &&  post_request('add_item')) : # else open add form
    #....
    redirect_to('/views/inventory/create.php');
elseif (isset($_POST) &&  post_request('update_item')) : # else edit
    #....
    // TODO: Implement update an item
    die(var_dump($_POST));
elseif (isset($_POST) &&  post_request('clear_cart')) : # else edit
    // die(var_dump($_POST));
    $cart->clear_cart();
    redirect_to('/views/items/shopping_cart.php');
else:
    die(var_dump('else block'));
endif;


?>