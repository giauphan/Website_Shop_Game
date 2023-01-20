<?php
namespace App\Models;
use App\Models\Model as ModelsModel;



class ktlogin extends ModelsModel
{
  public $db;
  public function __construct()
  {
    $this->db = new database;
  }

  public function login($user, $pass)
  {


    $sql_login = "SELECT * FROM `user` WHERE email = ? || username = ? and password = ?";
    return $this->db->pdo_query($sql_login, $user, $user, $pass);

  }


  public function get_all_user()
  {
    $sql = 'SELECT * FROM `user` ';
    $user = $this->db->pdo_query($sql);
    return $user;
  }

  public function get_all_user_one($ma_user)
  {
    $sql = 'SELECT * FROM `user` where ma_kh = ? ';
    $user = $this->db->pdo_query($sql, $ma_user);
    return $user;
  }

  public function ud_user($phone, $email, $username_show)
  {

    $sql = "UPDATE `user` SET `ten_hien_thi`=?,`email`=?,`phone`=? WHERE ma_kh = ?";
    $this->db->pdo_execute($sql, $username_show, $email, $phone, $_SESSION['ma_user']);
    return true;
  }

  public function get_money()
  {
    if (isset($_SESSION['ma_user'])) {
      $showtien = 'SELECT tien,email FROM `user` WHERE ma_kh = ?';

      $kq = $this->db->pdo_query($showtien, $_SESSION['ma_user']);
      $tien = 0;
      foreach ($kq as $rowtien) {

        $tien = $rowtien['tien'];

      }
      return $tien;

    }
  }

}
