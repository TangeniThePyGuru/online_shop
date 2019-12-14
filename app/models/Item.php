<?php

namespace App\Models;

require_once ROOT_PATH .  "app/models/BaseModel.php";

class Item extends BaseModel
{
    protected $table = 'items';
    protected $columns = ['name', 'description', 'quantity', 'price'];
    
    public function transact($id, $quantity)
    {
        // update item quantity
        $q = mysqli_fetch_assoc($this->get_one($id))['quantity'];
        $new_quantity = $q - $quantity;
        $query = "UPDATE `online_shop`.$this->table SET `quantity`=$new_quantity WHERE  `id`=$id";
        return $this->query_db($query);
    }
    
}
