<?php

namespace App\Models;

require_once ROOT_PATH .  "app/models/BaseModel.php";

class Order extends BaseModel
{
    // TODO: Create orders table
    protected $table = 'orders';
    protected $columns = ['client_id', 'total_cost'];

    public function make_an_order()
    {
        $user_id = logged_in_user()['id'];
        $cart = new Cart();
        $order = $this->insert([$user_id, $cart->total_cost()]);
        $item_purchases = new ItemPurchases();
        $item = new Item();

        // can be improved
        if ( $order ):
            // die(var_dump("SELECT * FROM $this->table WHERE id=(SELECT LAST_INSERT_ID());"));
            $last_order  = $this->last_insert_id();
            $items = $cart->items_in_cart();
            // add items to the purchases table\
            foreach($_SESSION['cart'] as $key => $q){
                $item_purchases->insert([$key, $q, $last_order]);
                $item->transact($key, $q);
            }
            // clean the cart
            $cart->clear_cart();
            return true;
        else:
            die('test => no order made');
        endif;
    }

}
