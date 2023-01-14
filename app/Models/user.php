<?php

namespace App\Models\user;

use account;

class user extends account
{


    public function login($user, $pass)
    {
        $sql_login = "SELECT * FROM `user` WHERE email = ? || username = ? and password = ?";
        return   $this->db->pdo_query($sql_login, $user, $user, $pass);
    }


    public function get_all_user()
    {
        $sql = 'SELECT * FROM `user` ';
        $user = pdo_query($sql);
        return $user;
    }

    public function get_all_user_one($ma_user)
    {
        $sql = 'SELECT * FROM `user` where ma_kh = ? ';
        $user =      $this->db->pdo_query($sql, $ma_user);
        return $user;
    }

    public function ud_user($phone, $email, $username_show)
    {

        $sql = "UPDATE `user` SET `ten_hien_thi`=?,`email`=?,`phone`=? WHERE ma_kh = ?";
        $this->db->pdo_query($sql, $username_show, $email, $phone, $_SESSION['ma_user']);
        return true;
    }

    public function get_money()

    {
        if (isset($_SESSION['ma_user'])) {
            $showtien = 'SELECT tien,email FROM `user` WHERE ma_kh = ?';

            $kq =      $this->db->pdo_query($showtien, $_SESSION['ma_user']);
            $tien = 0;
            foreach ($kq as  $rowtien) {

                $tien = $rowtien['tien'];
            }
            return $tien;
        }
    }


    public function sign($username, $username_show, $pass, $email,  $phone)
    {
        $sql_sign = "INSERT INTO `user`(`ten_hien_thi`, `username`, `password`, `email`, `phone`, `trang_thai_kh`, `vai_tro`) VALUES (?,?,?,?,?,?,?)";
        pdo_execute($sql_sign, $username_show, $username, $pass, $email, $phone, '0', 'thành viên');
    }
    public function action_email($email)
    {
        $sql = "UPDATE `user` SET `trang_thai_kh` = '1' WHERE email = ?";
        pdo_execute($sql, $email);
    }
    public function check_email($username, $email)
    {
        $check = false;
        $kq =  get_all_user();
        foreach ($kq as $row) {

            if ($row['username'] == $username || $row['email'] == $email) {
                $check = true;
            }
        }
        if ($check == false) {
            return true;
        } else {
            return false;
        }
    }
}
