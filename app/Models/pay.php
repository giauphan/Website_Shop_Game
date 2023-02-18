<?php
namespace App\Models;
use App\Models\Model as ModelsModel;

class pay extends ModelsModel
{
   public $db;
   public function __construct()
   {
      $this->db = new database;
   }
 
   public function showproductcfsp($idacc)
   {
      $sql_anh = "SELECT * FROM sp join loai  on loai.ma_loai = sp.ma_loai  where `ma_sp` = ? GROUP by sp.ma_sp";

      return  $this->db->pdo_query($sql_anh, $idacc);
   }



   public function showsplienquan()
   {
      $sql = "SELECT * FROM  `sp`  where trang_thai_sp = 0 GROUP by sp.ma_sp";
      return $this->db->pdo_query($sql);
   }

 

   public function pay()
   {
      $sl_sql = "SELECT * FROM `sp` WHERE ma_sp = ? GROUP by sp.ma_sp";

      $kq = $this->db->pdo_query($sl_sql, $_GET['id']);

    return $kq;
   }

   public function pay_login()
   {
      $sl_sql = "SELECT * FROM `sp`  WHERE ma_sp = ? GROUP by sp.ma_sp";

      $kq = $this->db->pdo_query($sl_sql, $_GET['id']);

     return $kq;
   }
   public function show_code_sale()
   {
      $sl_sql = "SELECT * FROM tbl_code_sale ";
      $runshow = $this->db->pdo_query($sl_sql);
      // $code_sale_price = 0;
     return $runshow;
   }
   public function show_price_sale()
   {
      $sl_sql = "SELECT * FROM tbl_code_sale ";
      $runshow = $this->db->pdo_query($sl_sql);
      return $runshow;
     
   }

   public function show_category_sale()
   {
      $sl_sql = "SELECT * FROM tbl_code_sale ";
      $runshow = $this->db->pdo_query($sl_sql);
     return $runshow;
     
   }
}
