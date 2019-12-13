<?php

namespace App\Models;


class Cart
{
    protected $table;

    public function __construct()
    {
        // nitialize the table
        $this->table = $_SESSION['cart'];
    }
    
    public function get_cart(){
        if (!$this->cart_is_empty()) :
            return $this->table;
        else :
            return null;
        endif;
    }
    

    public function add_to_cart($key, $quantity){
        if (isset($_SESSION['cart'][$key])) :
           return $_SESSION['cart'][$key] += $quantity;
        else :
           return $_SESSION['cart'][$key] = $quantity;
        endif;
    }

    public function items_in_cart()
    {
        $items = [];
        $itm = new Item();
        // die(var_dump($this->table));
        foreach($this->table as $key => $item):
            // die(var_dump($itm->get_one($key)));
           array_push($items, $key);
        endforeach;

        return $itm->get_in_range($items);
    }

    public function quantities()
    {
        $q = [];
        foreach($this->table as $key => $item):
            array_push($q, $item);
        endforeach;

        return $q;
    }

    public function cart_is_empty(){
        return !isset($_SESSION['cart']);
    }
}
