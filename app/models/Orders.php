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
        if ( $order ):
            die('test => order made');
            // add items to the purchases table
        else:
            die('test => no order made');
        endif;
    }

}
