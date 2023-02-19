<?php

namespace App\Models;

class sanpham extends database
{
   public function phantrang()

   {

      //define total number of results you want per page
   
      $results_per_page = 8;
   
      //find the total number of results stored in the database
   
      if (isset($_GET["danhmuc"])) {
   
         if (isset($_GET['game_id']) && isset($_GET['trang_thai']) && isset($_GET['moneymin']) && isset($_GET['moneymax']) && isset($_GET['Field01'])  && isset($_GET['Field02'])) {
   
            $query = "SELECT * FROM `sp`  WHERE  ma_loai = '" . $_GET['danhmuc'] . "' ";
   
            if ($_GET['game_id'] != "") {
   
               $query .= " and ma_sp = '" . $_GET['game_id'] . "' ";
            }
   
            if ($_GET['trang_thai'] != "") {
   
               $query .= " and trang_thai_sp = '" . $_GET['trang_thai'] . "' ";
            }else {
               $query .= " and trang_thai_sp = '0' ";
            }
   
            if ($_GET['moneymin'] != "" && $_GET['moneymax'] != null) {
   
               $query .= " and giasp >=' " . $_GET['moneymin'] . "' and  giasp <= '" . $_GET['moneymax'] . "' ";
            } else if ($_GET['moneymin'] != "") {
   
               $query .= "and giasp >= '" . $_GET['moneymin']  . "' ";
            }
   
            if ($_GET['danhmuc'] == 1) {
               if ($_GET['Field01']  != "") {
   
                  $query .= "and field2 like '%" . $_GET['Field01']  . "%' ";
               }
   
            } else if ($_GET['danhmuc'] == 3) {
               if ($_GET['Field01']  != "") {
   
                  $query .= "and field1 = '" . $_GET['Field01']  . "' ";
               }
   
               if ($_GET['Field02']  != "") {
   
                  $query .= "and field2 = '" . $_GET['Field02'] . "' ";
               }
               if ($_GET['Field03']  != "") {
   
                  $query .= "and field3 = '" . $_GET['Field03'] . "' ";
               }
               if ($_GET['Field04']  != "") {
   
                  $query .= "and field4 = '" . $_GET['Field04'] . "' ";
               }
            }
            $query .= " GROUP by sp.ma_sp";
         } else {
            $query = "SELECT * FROM `sp` WHERE trang_thai_sp = 0 and  ma_loai = '" . $_GET['danhmuc'] . "' GROUP by sp.ma_sp   ";
         }
   
   
         $result = $this->pdo_query($query);
         $number_of_result = count($result);

         $number_of_page = ceil($number_of_result / $results_per_page);
         return $number_of_page;
         //determine which page number visitor is currently on
   
   
      }
   }
   public function showsp()
   {
      $results_per_page = 8;
      if (!isset($_GET['page'])) {
         $page = 1;
      } else {
         $page = $_GET['page'];
      }

      //determine the sql LIMIT starting number for the results on the displaying page

      $page_first_result = ($page - 1) * $results_per_page;

      //retrieve the selected results from database

      if (isset($_GET['game_id']) && isset($_GET['trang_thai']) && isset($_GET['moneymin']) && isset($_GET['moneymax']) && isset($_GET['Field01'])  && isset($_GET['Field02'])) {
      $query = "SELECT * FROM `sp`  WHERE  ma_loai = '" . $_GET['danhmuc'] . "' ";
      
         if ($_GET['game_id'] != "") {

            $query .= " and ma_sp = '" . $_GET['game_id'] . "' ";
         }

         if ($_GET['trang_thai'] != "") {

            $query .= " and trang_thai_sp = '" . $_GET['trang_thai'] . "' ";
         } else {
            $query .= " and trang_thai_sp = '0' ";
         }

         if ($_GET['moneymin'] != "" && $_GET['moneymax'] != null) {

            $query .= " and giasp between'" . $_GET['moneymin'] . "' and  '" . $_GET['moneymax'] . "' ";
         } else if ($_GET['moneymin'] != "") {

            $query .= "and giasp >= '" . $_GET['moneymin']  . "' ";
         }
         if ($_GET['danhmuc'] == 1) {
            $tuong =  $_GET['Field01'];

                $tuong = explode('-', $tuong);

                $tuong_min = $tuong[0];

                $tuong_max = null;
                if (isset($tuong[1])) {
                    $tuong_max = $tuong[1];
                }

            if ($tuong_min != "" && $tuong_max != null) {

               $query .= " and CAST(field1 AS INTEGER) between '" . $tuong_min . "' and  '" . $tuong_max . "' ";
            } else if ($tuong_min != "") {

               $query .= "and CAST(field1 AS INTEGER) >= '" . $tuong_min  . "' ";
            }

            $trangphuc =  $_GET['Field03'];

                $trangphuc = explode('-', $trangphuc);

                $trangphuc_min = $trangphuc[0];

                $trangphuc_max = null;
                if (isset($trangphuc[1])) {
                    $trangphuc_max = $trangphuc[1];
                }

            if ($trangphuc_min != "" && $trangphuc_max != null) {

               $query .= " and CAST(field3 AS INTEGER) between'" . $trangphuc_min . "' and  '" . $trangphuc_max . "' ";
            } else if ($trangphuc_min != "") {

               $query .= "and CAST(field3 AS INTEGER) >= '" . $trangphuc_min  . "' ";
            }

            if ($_GET['Field02']  != "") {

               $query .= "and field2 like '%" . $_GET['Field02']  . "%' ";
            }

            if ($_GET['Field04']  != "") {

               $query .= "and field4 = '" . $_GET['Field04'] . "' ";
            }
         } 
         
         else if ($_GET['danhmuc'] == 2) {
            
            if ($_GET['Field02']  != "") {

               $query .= "and field2 like '%" . $_GET['Field02']  . "%' ";
            }

            $tuong =  $_GET['Field01'];

                $tuong = explode('-', $tuong);

                $tuong_min = $tuong[0];

                $tuong_max = null;
                if (isset($tuong[1])) {
                    $tuong_max = $tuong[1];
                }

            if ($tuong_min != "" && $tuong_max != null) {

               $query .= " and CAST(field1 AS INTEGER) between '" . $tuong_min . "' and  '" . $tuong_max . "' ";
            } else if ($tuong_min != "") {

               $query .= "and CAST(field1 AS INTEGER) >= '" . $tuong_min  . "' ";
            }

            $trangphuc =  $_GET['Field03'];

                $trangphuc = explode('-', $trangphuc);

                $trangphuc_min = $trangphuc[0];

                $trangphuc_max = null;
                if (isset($trangphuc[1])) {
                    $trangphuc_max = $trangphuc[1];
                }

            if ($trangphuc_min != "" && $trangphuc_max != null) {

               $query .= " and CAST(field3 AS INTEGER) between'" . $trangphuc_min . "' and  '" . $trangphuc_max . "' ";
            } else if ($trangphuc_min != "") {

               $query .= "and CAST(field3 AS INTEGER) >= '" . $trangphuc_min  . "' ";
            }
         } 

         else if ($_GET['danhmuc'] == 3) {
            if ($_GET['Field01']  != "") {
               //server
               $query .= "and field1 like '%" . $_GET['Field01']  . "%' ";
            }
               //hanhtinh
            if ($_GET['Field02']  != "") {

               $query .= "and field2 = '" . $_GET['Field02'] . "' ";
            }
            if ($_GET['Field03']  != "") {
               //porata
               $query .= "and field3 = '" . $_GET['Field03'] . "' ";
            }
            if ($_GET['Field04']  != "") {
               //dangky
               $query .= "and field4 like '%" . $_GET['Field04']  . "%' ";
            }
         } else if ($_GET['danhmuc'] == 4) {
            if ($_GET['Field01']  != "") {
               //dangky
               $query .= "and field1 like '%" . $_GET['Field01']  . "%' ";
            }
               //rank
            if ($_GET['Field02']  != "") {

               $query .= "and field2 like '%" . $_GET['Field02']  . "%' ";
            }
            if ($_GET['Field03']  != "") {
               //pet
               $query .= "and field3 like '%" . $_GET['Field03']  . "%' ";
            }
            if ($_GET['Field04']  != "") {
               //thevocuc
               $query .= "and field4 like '%" . $_GET['Field04']  . "%' ";
            }
         }

         $query .= " GROUP by sp.ma_sp  LIMIT " . $page_first_result . ',' . $results_per_page;
      } else {

            $query = "SELECT *FROM sp  where trang_thai_sp = 0 and ma_loai = " . $_GET['danhmuc'] . " GROUP by sp.ma_sp  LIMIT " . $page_first_result . ',' . $results_per_page;

      }




      // $query = "SELECT *FROM sp LIMIT " . $page_first_result . ',' . $results_per_page;



      $result = $this->pdo_query($query);
      return $result;
      // return $query;
      //********/

   }
   public function get_sp(){
      $sql = 'SELECT * FROM `sp` WHERE trang_thai_sp = 1 ';

      $query = $this-> pdo_query($sql);

      return $query;
   }
}