<?php

// if (isset($_GET['keyword']) ) {

//     $query = "SELECT * FROM `sp` WHERE trang_thai_sp = " . $_GET['keyword'] . "  or ma_sp = " . $_GET['keyword'] . " or giasp >= " . $_GET['keyword'] . " or  giasp <= " . $_GET['keyword'] . " or giasp >= " . $_GET['keyword']  . " or rank like '%" . $_GET['keyword']  . "%' or ngoc = " . $_GET['keyword'] . " ";
//     }
//     else {
//       $query = "SELECT * FROM `sp`";
//     }


function search_sp($keyword)
{
        header('location:/duan/admin/?keyword='.$keyword.'');
}
