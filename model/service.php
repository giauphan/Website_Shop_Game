<?php
class service
{

    public $db;

    public function __construct()
    {
        $this->db = new database;
    }

    function get_service_all()
    {
        $sql = 'SELECT * FROM `loai_serive` WHERE 1';
        return       $this->db->pdo_query($sql);
    }

    function get_service_one($ma_service)
    {
        $sql = 'SELECT * FROM `loai_serive` WHERE ma_service = ?';
        return       $this->db->pdo_query($sql, $ma_service);
    }
    function service_san_de($server, $service, $account_game, $password_game, $ma_kh, $time)
    {

        $price = 0;
        $kq = $this->get_service_one($service);
        foreach ($kq as $row) {
            $price = $row['price'];
        }
        $check  = false;
        $check_user = get_all_user($ma_kh);
        $tien_user = 0;
        foreach ($check_user as $row) {
            if ($row['tien'] >= $price) {
                $tien_user = $row['tien'];
                // end check noney
                // sp
                $check = true;
                //end  sp
            }
        }

        if ($check == true) {
            $sql_paytien = "UPDATE `user` SET `tien`=`tien` - (?) WHERE  ma_kh = ?";
            $this->db->pdo_execute($sql_paytien, $price, $_SESSION['ma_user']);
            $sql = "INSERT INTO `service_san_de`( `server`, `loai_service`,price, `account_game`, `password_game`, `time`, `ma_kh`) VALUES (?,?,?,?,?,?,?)";
            $this->db->pdo_execute($sql, $server, $service, $price, $account_game, $password_game, $time, $ma_kh);
            return true;
        } else {
            return false;
        }
    }
    function get_serice_de($ma_user)
    {
        $sql = "SELECT * FROM `service_san_de` join loai_serive on loai_serive.ma_service = service_san_de.loai_service WHERE ma_kh =?";
        return         $this->db->pdo_query($sql, $ma_user);
    }
}
