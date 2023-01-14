<?php
class pay_sp
{


   public $db;

   public function __construct()
   {
      $this->db = new database;
   }
   public function pay_sp($gia_sp)
   {
      $check = false;
      $sl_sql = "SELECT * FROM `sp` join loai on  sp.ma_loai = loai.ma_loai  WHERE ma_sp = ?";
      $row = $this->db->pdo_query_one($sl_sql, $_GET['id']);
    
         $ma_sp = $row['ma_sp'];
         $trang_thai_Sp = $row['trang_thai_sp'];
         $ten_loai = $row['ten_loai'];
      
      date_default_timezone_set("Asia/Ho_Chi_Minh");
      $mydate = getdate(date("U"));
      $time = "$mydate[year]/$mydate[mon]/$mydate[mday]  $mydate[hours]:$mydate[minutes]:$mydate[seconds]";
      $coupon = $_POST['coupon'];
      if ($trang_thai_Sp == 0) {

         // end don hang
         $sl_sql = "SELECT * FROM `user`  WHERE ma_kh = ?";
         $runshow = $this->db->pdo_query($sl_sql, $_SESSION['ma_user']);
         foreach ($runshow as $row) {
            // check  moneny user
            if ($row['tien'] >= $gia_sp) {
               $check = true;
            }
         }
         if ($check == false) {
            return false;
         } else {
            // donhang
 
            $sql_paysp = "UPDATE `sp` SET `trang_thai_sp`= 1 WHERE  ma_sp = ?";
            $this->db->pdo_execute($sql_paysp,$ma_sp );

            $sql_paytien = "UPDATE `user` SET `tien`=`tien` - " . ($gia_sp) . " WHERE  ma_kh = ?";
            $this->db->pdo_execute($sql_paytien, $_SESSION['ma_user']);

            $sl_sql = "SELECT * FROM `sp`  WHERE ma_sp = ?";
            $runshow = $this->db->pdo_query($sl_sql, $_GET['id']);
            foreach ($runshow as $row) {
               $sql_bl = "INSERT INTO `donhang`( `ngay_nhap_dh`, `ma_giam`, `gia_dh`, `ten_game`, `tai_khoan_game`, `password_game`, `ma_sp`, `ma_kh`) VALUES(?,?,?,?,?,?,?,?)";
               $this->db->pdo_execute($sql_bl, $time, $coupon, $gia_sp, $ten_loai, $row['tai_khoan_game'], $row['password_game'], $row['ma_sp'], $_SESSION['ma_user']);
            }
            return true;
         }
      }
   }
}
