<?php
class account_ctv extends account
{

    public function get_money()
    {
        if (isset($_SESSION['ma_user'])) {
            $showtien = 'SELECT tien,email FROM `user` WHERE ma_kh = ?';

            $kq =  $this->db->pdo_query($showtien, $_SESSION['ma_user']);
            $tien = 0;
            foreach ($kq as  $rowtien) {
                $tien = $rowtien['tien'];
            }
            return $tien;
        }
    }

}
