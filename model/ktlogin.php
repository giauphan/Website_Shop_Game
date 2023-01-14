<?php


function login($user, $pass)
{


    $sql_login = "SELECT * FROM `user` WHERE email = ? || username = ? and password = ?";
    return   pdo_query($sql_login,$user,$user,$pass);
  
}


function get_all_user()
{
    $sql = 'SELECT * FROM `user` ';
    $user = pdo_query($sql);
    return $user;
}

function get_all_user_one($ma_user)
{
    $sql = 'SELECT * FROM `user` where ma_kh = ? ';
    $user = pdo_query($sql, $ma_user);
    return $user;
}

function ud_user($phone, $email, $username_show)
{

    $sql = "UPDATE `user` SET `ten_hien_thi`=?,`email`=?,`phone`=? WHERE ma_kh = ?";
    pdo_query($sql, $username_show, $email, $phone, $_SESSION['ma_user']);
    return true;
}

function get_money()

{
  if (isset($_SESSION['ma_user'])) {
    $showtien = 'SELECT tien,email FROM `user` WHERE ma_kh = ?';

    $kq = pdo_query($showtien,$_SESSION['ma_user']);
    $tien = 0;
  foreach ( $kq as  $rowtien ) {

      $tien = $rowtien['tien'];

    }
    return $tien;

  }
}
