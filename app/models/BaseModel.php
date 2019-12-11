<?php

namespace App\Models;

use Config\Database\DB;

require_once ROOT_PATH .  "config/db.php";

abstract class BaseModel {

    protected $table;

    public function insert($values)
    {
        return DB::insert_to_db($values , $this->table);
    }

    public function get_one($id)
    {
        return DB::select_one_from_db($this->table, $id);
    }

    public function get_many()
    {
        return DB::select_many_from_db($this->table);
    }

    public function delete($id)
    {
        return DB::delete_from_db($this->table, $id);
    }

    public function query_db($query){
        return DB::query_db($query);
    }
}
