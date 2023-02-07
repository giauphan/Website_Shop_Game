<?php

namespace App\Models;

use  App\Models\database;

class product extends database
{
    public function product(){
        $sql = 'SELECT * FROM `donhang`';
        $run = $this-> pdo_query($sql);
        return $run;
    }
    public function get_one_product($id){
        $sql = 'SELECT * FROM `sp` where ma_sp =?';
        $run = $this-> pdo_query($sql,$id);
        return $run;
    }
   
}