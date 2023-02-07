<?php

namespace App\Models\admin;

use App\Models\database;

class ql_bill extends database
{
  public  function ql_bill()
  {
    $showtien = 'SELECT ma_dh,Month(ngay_nhap_dh)as "thang_nhap_dh",gia_dh ,donhang.ma_sp,ten_loai,giasp,trang_thai_sp,ten_hien_thi,ngay_nhap_dh FROM donhang join user  join sp join loai on sp.ma_sp= donhang.ma_sp and  loai.ma_loai = sp.ma_loai  and user.ma_kh = donhang.ma_kh   WHERE YEAR(ngay_nhap_dh) = YEAR(NOW()) ORDER BY ngay_nhap_dh DESC';
    // $showtien = 'SELECT * FROM `donhang`join user  join sp join loai on sp.ma_sp= donhang.ma_sp and  loai.ma_loai = sp.ma_loai  and user.ma_kh = donhang.ma_kh  ';
    $runshowtien = $this->pdo_query($showtien);
    return $runshowtien;
  }

  // function de_bill()
  // {
  //   $conn = po_con();
  //   $sql_de = 'DELETE FROM `donhang` WHERE `donhang`.`ma_dh` = ' . $_GET['de'] .  '"  ';
  //   mysqli_query($conn, $sql_de);
  // }
}
