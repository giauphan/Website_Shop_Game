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
   public function show_img($img, $hinh)

   {

      // $img = explode("|", $img);
      // $check = true;
      // for ($i = 0; $i < sizeof($img); $i++) {
      //    $img[$i] = trim($img[$i]);
      //    if ($img[$i] != "  " && empty($img[$i]) != true) {
      //       echo ' <p>
      // <a rel="gallery1" data-fancybox="images" href="">
      // <img class="img-responsive img-thumbnail" src="/assets/upload/' . $img[$i] . '" alt="png-image">
      // </a>
      // </p>';
      //    } else {
      //       echo '';
      //       $check = false;
      //    }
      // }
      // if ($check == false) {
      //    echo ' <p>
      // <a rel="gallery1" data-fancybox="images" href="">
      // <img class="img-responsive img-thumbnail" src="/assets/upload/' . $hinh . '" alt="png-image">
      // </a>
      // </p>';
      // }
   }
   public function showproductcfsp($idacc)
   {
      $sql_anh = "SELECT * FROM sp join loai  on loai.ma_loai = sp.ma_loai  where `ma_sp` = ? GROUP by sp.ma_sp";

      return  $this->db->pdo_query($sql_anh, $idacc);
   }

   public function comment($today, $noi_dung)
   {
      $sql_bl = "INSERT INTO `binhluan`( `ngay_bl`, `noi_dung`, `ma_kh_bl`, `ma_sp`) VALUES (?,?,?,?)";

      $this->db->pdo_execute($sql_bl, $today, $noi_dung, $_SESSION['ma_user'], $_GET['id']);
   }

   public function showsplienquan()
   {
      $sql = "SELECT * FROM  `sp`  where trang_thai_sp = 0 GROUP by sp.ma_sp";
      return $this->db->pdo_query($sql);
   }

 

   public function pay()
   {

      $sl_sql = "SELECT * FROM `sp` WHERE ma_sp = " . $_GET['id'] . " GROUP by sp.ma_sp";

      return $this->db->pdo_query($sl_sql);

   }

   public function pay_login()
   {


      $sl_sql = "SELECT * FROM `sp`  WHERE ma_sp = " . $_GET['id'] . " GROUP by sp.ma_sp";

      return $this->db->pdo_query($sl_sql);

   }
   public function show_code_sale()
   {
      $sl_sql = "SELECT * FROM tbl_code_sale ";
      $runshow = $this->db->pdo_query($sl_sql);
      // $code_sale_price = 0;
      echo "[";
      foreach ($runshow as $row) {
         echo  " '" . $row['code'] . "', ";
      }
      echo "],";
      return $runshow;
   }
   public function show_price_sale()
   {
      $sl_sql = "SELECT * FROM tbl_code_sale ";
      $runshow = $this->db->pdo_query($sl_sql);
      // $code_sale_price = 0;
      echo " [";
      foreach ($runshow as $row) {
         echo  " '" . $row['price_sale'] . "', ";
      }
      echo "],";
      return $runshow;
   }

   public function show_category_sale()
   {
      $sl_sql = "SELECT * FROM tbl_code_sale ";
      $runshow = $this->db->pdo_query($sl_sql);
      // $code_sale_price = 0;
      echo " [";
      foreach ($runshow as $row) {
         echo  " '" . $row['ma_loai'] . "', ";
      }

      echo "]";
      return $runshow;
   }
}
