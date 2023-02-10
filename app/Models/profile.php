<?php
namespace App\Models;
use App\Models\Model as ModelsModel;
class profile extends ModelsModel
{

   public $username;
   public $password;
   public $db;

   public function __construct()
   {
      $this->db = new database;
   }
   public function show_email()
   {
      if (isset($_SESSION['ma_user'])) {
         $showtien = 'SELECT email FROM `user` WHERE ma_kh = "' . $_SESSION['ma_user'] . '" ';
         $runshowtien =     $this->db->pdo_query($showtien);

         $email = '';
         foreach ($runshowtien as $rowtien) {

            $email = $rowtien['email'];
         }
         return $email;
      }
   }
   public function get_phone()
   {
      if (isset($_SESSION['ma_user'])) {
         $showtien = 'SELECT phone FROM `user` WHERE ma_kh = ? ';
         $runshowtien = $this->db->pdo_query($showtien,$_SESSION['ma_user']);

         $phone = '';
         foreach ($runshowtien as $rowtien) {

            $phone = $rowtien['phone'];
         }
      }
      return   $phone;
   }
   public function get_user_doimk()
    {
        $sql = 'SELECT * FROM `user` ';
        $user = $this->db->pdo_query($sql);
        return $user;
    }
   public function check_tien_mail() {
      $showtien = 'SELECT tien,email FROM `user` WHERE ma_kh = "' . $_SESSION['ma_user'] . '" ';
      return $this->db->pdo_query($showtien);
   }
   public function doi_mk($passnew, $ma_user) {
      $sql = "UPDATE user SET password='" . $passnew . "' WHERE ma_kh='" . $ma_user . "'";
      $this->db->pdo_query($sql);
   }
}
