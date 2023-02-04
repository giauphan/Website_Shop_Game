<?php

namespace App\Models;

use App\Models\account;

class user extends account
{

    public function get_money()
    {
       
            $showtien = 'SELECT tien,email FROM `user` WHERE ma_kh = ?';
 
            $kq =      $this->db->pdo_query($showtien, $_SESSION['ma_user']);
            $tien = 0;
            foreach ($kq as  $rowtien) {
 
                $tien = $rowtien['tien'];
            }
            return $tien;
        
    }
 

}
