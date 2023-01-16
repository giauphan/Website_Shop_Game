<?php
namespace App\Models;

use App\Models\Model; 

use App\Models\database as DB;

 class Page_home extends Model
{

   public $db;

   public function __construct()
   {
      $this->db = new DB;
   }


   public function sl_loai($ma_loai)
   {
      $showsl = "SELECT loai.ma_loai,ten_loai, COUNT(sp.ma_loai) as 'so_luong' FROM `loai` LEFT JOIN `sp` on `sp`.ma_loai = `loai`.ma_loai where loai.ma_loai = ? GROUP BY loai.ma_loai ORDER by COUNT(sp.ma_loai); ";
      return $this->db->pdo_query($showsl, $ma_loai);
   }

   public function sl_pay($ma_loai)
   {
      $sql = "SELECT COUNT(trang_thai_sp) as 'sl_ttsp' FROM `sp` WHERE `trang_thai_sp` >= 1 and ma_loai = ?";
      return $this->db->pdo_query($sql, $ma_loai);
   }



   public function danhmuc()

   {

      $sql = 'SELECT * FROM `loai`';

      return $this->db->pdo_query($sql);
   }



   public function product_new()
   {


      $query = "SELECT * FROM `sp`  join sp_lq on sp.ma_sp = sp_lq.ma_sp_ where trang_thai_sp = 0  ORDER by sp.ma_sp DESC";

      return $this->db->pdo_query($query);
   }
   public function showproductSALE()
   {
      $query = "SELECT * FROM `sp` join sp_lq on sp.ma_sp = sp_lq.ma_sp_  where trang_thai_sp = 0  and giam_gia >0";

      return $this->db->pdo_query($query);
   }


   
   public function __destruct()
   {
      $this->db = null;
   }
}
