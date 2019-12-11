<?php

namespace App\Models;


class Cart
{
    // TODO: the table is the current authed user's id
    protected $table;

    public function __construct()
    {
        $this->table = Session::getInstance();
    }
    
    public function get_cart(){
        return $this->table;
    }

    function add_to_cart($item){
        array_push($this->table['items'], $item);
    }
}
