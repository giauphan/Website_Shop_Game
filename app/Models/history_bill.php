<?php

namespace App\Models;

use  App\Models\database;

class history_bill extends database
{
    public function history(){
        $sql = 'SELECT * FROM `donhang`';
        $run = $this-> pdo_query($sql);
        return $run;
    }
    public function get_month_bill(){
       
        $sql = 'SELECT Month(ngay_nhap_dh)as "ngay_nhap_dh",gia_dh ,ma_sp FROM `donhang` WHERE YEAR(ngay_nhap_dh) = YEAR(NOW())';
        $run = $this-> pdo_query($sql);
        return $run;
    }
    public function get_donhang($id){
        $sql = 'SELECT * FROM `donhang` join user  on user.ma_kh= donhang.ma_kh where user.ma_kh = ?';
        $run = $this-> pdo_query($sql,$id);
        return $run;
    }
}