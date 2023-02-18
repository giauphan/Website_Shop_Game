<?php
namespace App\Models\admin;
use App\Models\database;

class qlAccount extends database
{
     public function show_user()
    {
        $bl_sql = "SELECT * FROM  user  ORDER BY `vai_tro` ASC";
        $query = $this->pdo_query($bl_sql);
      return $query;
    }


     public function lockUser($ma_user)
    {
        $sql_de = 'UPDATE   `user`  SET trang_thai_kh = 0  where ma_kh = ? ';
        $this->pdo_query($sql_de,$ma_user);
    }
}
