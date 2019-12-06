<?php

namespace App\Models;

require_once ROOT_PATH .  "app/models/BaseModel.php";

class Item extends BaseModel
{
    protected $table = 'items';
    
    public function __construct()
    {
        $this->get_many();
    }
}
