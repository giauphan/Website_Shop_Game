<?php





function showproduct2()

{


   //define total number of results you want per page

   $results_per_page = 8;



   //find the total number of results stored in the database



   if (isset($_GET["danhmuc"])) {

      if (isset($_GET['game_id']) && isset($_GET['trang_thai']) && isset($_GET['moneymin']) && isset($_GET['moneymax']) && isset($_GET['Field01'])  && isset($_GET['Field02'])) {



         $query = "SELECT * FROM `sp` join sp_nro JOIN sp_lq on sp.ma_sp = sp_nro.ma_sp_ or sp.ma_sp = sp_lq.ma_sp_  WHERE  ma_loai = '" . $_GET['danhmuc'] . "' ";

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

               $query .= "and rank like '%" . $_GET['Field01']  . "%' ";
            }

            if ($_GET['Field02']  != "") {

               $query .= "and ngoc = '" . $_GET['Field02'] . "' ";
            }
         } else if ($_GET['danhmuc'] == 3) {
            if ($_GET['Field01']  != "") {

               $query .= "and server = '" . $_GET['Field01']  . "' ";
            }

            if ($_GET['Field02']  != "") {

               $query .= "and potara = '" . $_GET['Field02'] . "' ";
            }
            if ($_GET['Field03']  != "") {

               $query .= "and login_ao = '" . $_GET['Field03'] . "' ";
            }
         }
         $query .= " GROUP by sp.ma_sp";
      } else {

         $query = "SELECT * FROM `sp` join sp_nro JOIN sp_lq on sp.ma_sp = sp_nro.ma_sp_ or sp.ma_sp = sp_lq.ma_sp_  WHERE trang_thai_sp = 0 and  ma_loai = '" . $_GET['danhmuc'] . "' GROUP by sp.ma_sp   ";
      }
 
      $result = pdo_query($query);
      $number_of_result = count($result);

      //determine the total number of pages available

      $number_of_page = ceil($number_of_result / $results_per_page);



      //determine which page number visitor is currently on



      if (!isset($_GET['page'])) {



         $page = 1;
      } else {



         $page = $_GET['page'];
      }



      //determine the sql LIMIT starting number for the results on the displaying page



      $page_first_result = ($page - 1) * $results_per_page;



      //retrieve the selected results from database

      if (isset($_GET['game_id']) && isset($_GET['trang_thai']) && isset($_GET['moneymin']) && isset($_GET['moneymax']) && isset($_GET['Field01'])  && isset($_GET['Field02'])) {
         $query = "SELECT * FROM `sp` join sp_nro JOIN sp_lq on sp.ma_sp = sp_nro.ma_sp_ or sp.ma_sp = sp_lq.ma_sp_   WHERE  ma_loai = '" . $_GET['danhmuc'] . "' ";
         if ($_GET['game_id'] != "") {

            $query .= " and ma_sp = '" . $_GET['game_id'] . "' ";
         }

         if ($_GET['trang_thai'] != "") {

            $query .= " and trang_thai_sp = '" . $_GET['trang_thai'] . "' ";
         } else {
            $query .= " and trang_thai_sp = '0' ";
         }

         if ($_GET['moneymin'] != "" && $_GET['moneymax'] != null) {

            $query .= " and giasp >=' " . $_GET['moneymin'] . "' and  giasp <= '" . $_GET['moneymax'] . "' ";
         } else if ($_GET['moneymin'] != "") {

            $query .= "and giasp >= '" . $_GET['moneymin']  . "' ";
         }
         if ($_GET['danhmuc'] == 1) {
            if ($_GET['Field01']  != "") {

               $query .= "and rank like '%" . $_GET['Field01']  . "%' ";
            }

            if ($_GET['Field02']  != "") {

               $query .= "and ngoc = '" . $_GET['Field02'] . "' ";
            }
         } else if ($_GET['danhmuc'] == 3) {
            if ($_GET['Field01']  != "") {

               $query .= "and server = '" . $_GET['Field01']  . "' ";
            }

            if ($_GET['Field02']  != "") {

               $query .= "and potara = '" . $_GET['Field02'] . "' ";
            }
            if ($_GET['Field03']  != "") {

               $query .= "and login_ao = '" . $_GET['Field03'] . "' ";
            }
         }

         $query .= " GROUP by sp.ma_sp  LIMIT " . $page_first_result . ',' . $results_per_page;
      } else {

         $query = "SELECT *FROM sp join sp_nro join sp_lq on sp.ma_sp = sp_nro.ma_sp_ or sp.ma_sp = sp_lq.ma_sp_  where trang_thai_sp = 0 and ma_loai = " . $_GET['danhmuc'] . " GROUP by sp.ma_sp  LIMIT " . $page_first_result . ',' . $results_per_page;
      }




      // $query = "SELECT *FROM sp LIMIT " . $page_first_result . ',' . $results_per_page;



      $result = mysqli_query($conn, $query);



      if (isset($_GET["danhmuc"])) {



         // for ($i = 0; $i <  sizeof($_SESSION['row']); $i++) {



         $loai = '';



         while ($row = mysqli_fetch_array($result)) {
            if ($row['ma_loai'] == 1) {
               $loai = $row['ma_loai'];
               $retVal = ($row['ngoc'] == 0) ?  "có" : "không";
               echo '<div class="col-sm-6 col-md-3">
                           <div class="classWithPad">
                              <div class="image">
                                 <a href="?act=acc&id=' . $row['ma_sp'] . '">
                                 <img src="/admin/view/upload/' . $row['hinh'] . '" alt="png-image">

                                 <span class="ms">MS: ' . $row['ma_sp'] . '</span>

                                 </a>

                                 </div>

                                 <div class="description">
                              </div>

                                 <div class="attribute_info">

                              <div class="row">

                                 <div class="col-xs-6 a_att">

                                    Rank: <b>' . $row['rank'] . '</b>

                                 </div>

                                 <div class="col-xs-6 a_att">

                                    Tướng: <b>' . $row['tuong'] . '</b>

                                 </div>

                                 <div class="col-xs-6 a_att">

                                    Trang Phục: <b>' . $row['trang_phuc'] . '</b>

                                 </div>

                                 <div class="col-xs-6 a_att">

                                    Ngọc 90: <b>' . $retVal . '</b>

                                 </div>

                              </div>

                           </div>

                           <div class="a-more">

                              <div class="row">

                                 <div class="col-xs-6">

                                    <div class="price_item">

                                    ' . number_format(($row['giasp'] - ($row['giasp'] * ($row['giam_gia'] * 0.01))), 0, ',', '.') . 'VNĐ

                                    </div>

                                 </div>

                                 <div class="col-xs-6 ">

                                    <div class="view">

                                       <a href="?act=acc&id=' . $row['ma_sp'] . '">Chi tiết</a>

                                    

                                    </div>

                                 </div>

                              </div>

                           </div>

                           </div>

               </div>';
            } else  if ($row['ma_loai'] == 3) {
               $retVal = ($row['potara'] == 0) ?  "Có" : "Không";
               $login_acc = ($row['login_ao'] == 0) ?  "Ảo" : "Gmail xóa vv";
               echo '<div class="col-sm-6 col-md-3">

                           <div class="classWithPad">

                              <div class="image">

                                 <a href="?act=acc&id=' . $row['ma_sp'] . '">
                                 <img src="/admin/view/upload/' . $row['hinh'] . '" alt="png-image">

                                 <span class="ms">MS: ' . $row['ma_sp'] . '</span>

                                 </a>

                                 </div>

                                 <div class="description">
                              </div>

                                 <div class="attribute_info">

                              <div class="row">

                                 <div class="col-xs-6 a_att">

                                    Máy chủ: <b>' . $row['server'] . ' sao</b>

                                 </div>

                                 <div class="col-xs-6 a_att">

                                    Hành tinh: <b>' . $row['Hanh_tinh'] . '</b>

                                 </div>
                                 <div class="col-xs-6 a_att">

                                 Đăng ký: <b>' . $login_acc . '</b>

                              </div>

                               

                                 <div class="col-xs-6 a_att">

                                    Bông tai: <b>' .      $retVal . '</b>

                                 </div>

                              </div>

                           </div>

                           <div class="a-more">

                              <div class="row">

                                 <div class="col-xs-6">

                                    <div class="price_item">

                                    ' . number_format(($row['giasp'] - ($row['giasp'] * ($row['giam_gia'] * 0.01))), 0, ',', '.') . 'VNĐ

                                    </div>

                                 </div>

                                 <div class="col-xs-6 ">

                                    <div class="view">

                                       <a href="?act=acc&id=' . $row['ma_sp'] . '">Chi tiết</a>

                                    

                                    </div>

                                 </div>

                              </div>

                           </div>

                           </div>

               </div>';
            } else  if ($row['ma_loai'] == 2) {
               $retVal = ($row['potara'] == 0) ?  "Có" : "Không";
               $login_acc = ($row['login_ao'] == 0) ?  "Ảo" : "Gmail xóa vv";
               echo '<div class="col-sm-6 col-md-3">

                           <div class="classWithPad">

                              <div class="image">

                                 <a href="?act=acc&id=' . $row['ma_sp'] . '">
                                 <img src="/admin/view/upload/' . $row['hinh'] . '" alt="png-image">

                                 <span class="ms">MS: ' . $row['ma_sp'] . '</span>

                                 </a>

                                 </div>

                                 <div class="description">
                              </div>

                                 <div class="attribute_info">

                              <div class="row">

                                 <div class="col-xs-6 a_att">

                                    Máy chủ: <b>' . $row['server'] . ' sao</b>

                                 </div>

                                 <div class="col-xs-6 a_att">

                                    Hành tinh: <b>' . $row['Hanh_tinh'] . '</b>

                                 </div>
                                 <div class="col-xs-6 a_att">

                                Đăng ký: <b>' . $login_acc . '</b>

                              </div>

                               

                                 <div class="col-xs-6 a_att">

                                    Bông tai: <b>' .      $retVal . '</b>

                                 </div>

                              </div>

                           </div>

                           <div class="a-more">

                              <div class="row">

                                 <div class="col-xs-6">

                                    <div class="price_item">

                                    ' . number_format(($row['giasp'] - ($row['giasp'] * ($row['giam_gia'] * 0.01))), 0, ',', '.') . 'VNĐ

                                    </div>

                                 </div>

                                 <div class="col-xs-6 ">

                                    <div class="view">

                                       <a href="?act=acc&id=' . $row['ma_sp'] . '">Chi tiết</a>

                                    

                                    </div>

                                 </div>

                              </div>

                           </div>

                           </div>

               </div>';
            } else  if ($row['ma_loai'] == 4) {
               $retVal = ($row['potara'] == 0) ?  "Có" : "Không";
               $login_acc = ($row['login_ao'] == 0) ?  "Ảo" : "Gmail xóa vv";
               echo '<div class="col-sm-6 col-md-3">

                           <div class="classWithPad">

                              <div class="image">

                                 <a href="?act=acc&id=' . $row['ma_sp'] . '">
                                 <img src="/admin/view/upload/' . $row['hinh'] . '" alt="png-image">

                                 <span class="ms">MS: ' . $row['ma_sp'] . '</span>

                                 </a>

                                 </div>

                                 <div class="description">
                              </div>

                                 <div class="attribute_info">

                              <div class="row">

                                 <div class="col-xs-6 a_att">

                                    Máy chủ: <b>' . $row['server'] . ' sao</b>

                                 </div>

                                 <div class="col-xs-6 a_att">

                                    Hành tinh: <b>' . $row['Hanh_tinh'] . '</b>

                                 </div>
                                 <div class="col-xs-6 a_att">

                                 Hành tinh: <b>' . $login_acc . '</b>

                              </div>

                               

                                 <div class="col-xs-6 a_att">

                                    Bông tai: <b>' .      $retVal . '</b>

                                 </div>

                              </div>

                           </div>

                           <div class="a-more">

                              <div class="row">

                                 <div class="col-xs-6">

                                    <div class="price_item">

                                    ' . number_format(($row['giasp'] - ($row['giasp'] * ($row['giam_gia'] * 0.01))), 0, ',', '.') . 'VNĐ

                                    </div>

                                 </div>

                                 <div class="col-xs-6 ">

                                    <div class="view">

                                       <a href="?act=acc&id=' . $row['ma_sp'] . '">Chi tiết</a>

                                    

                                    </div>

                                 </div>

                              </div>

                           </div>

                           </div>

               </div>';
            }
         }



         echo '</div>';





         if ($_GET['danhmuc'] == $loai) {

            // page_sp

            //  kt_search

            if (isset($_GET['game_id']) && isset($_GET['moneymin']) && isset($_GET['moneymax']) && isset($_GET['Field01'])  && isset($_GET['Field02'])) {



               if (isset($_GET['page']) && $_GET['page'] > 1) {



                  echo '<div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">

      <ul class="pagination pagination-sm">

      <li class="page-item "><a class="page-link" href="?act=nick1&danhmuc=' . $_GET['danhmuc'] . '&game_id=' . $_GET['game_id'] . '&moneymin=' . $_GET['moneymin'] . '&moneymax=' . $_GET['moneymax'] . '&Field01=' . $_GET['Field01'] . '&Field02=' . $_GET['Field02'] . '&page=' . ($page - 1) . '" >«</a></li>

      ';
               } else {



                  echo '<div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">

      <ul class="pagination pagination-sm">

 

   ';
               }

               for ($page = 1; $page <= $number_of_page; $page++) {



                  echo '

   <li class="page-item"><a class="page-link" href="?act=nick&danhmuc=' . $_GET['danhmuc'] . '&game_id=' . $_GET['game_id'] . '&trang_thai=' . $_GET['trang_thai'] . '&moneymin=' . $_GET['moneymin'] . '&moneymax=' . $_GET['moneymax'] . '&Field01=' . $_GET['Field01'] . '&Field02=' . $_GET['Field02'] . '&page=' . $page . '">' . $page . '</a></li>';
               }

               if (isset($_GET['page']) && $_GET['page'] >= $number_of_page) {

                  echo ' 

         

         </ul> </div>';
               } else {

                  if (isset($_GET['page'])) {



                     echo ' 

         <li class="page-item"><a class="page-link" href="?act=nick&danhmuc=' . $_GET['danhmuc'] . '&game_id=' . $_GET['game_id'] . '&trang_thai=' . $_GET['trang_thai'] . '&moneymin=' . $_GET['moneymin'] . '&moneymax=' . $_GET['moneymax'] . '&Field01=' . $_GET['Field01'] . '&Field02=' . $_GET['Field02'] . '&page=' . ($_GET['page'] + 1) . '" >»</a></li>

         </ul> </div>';
                  }
               }

               // end kt_search

            } else {

               if (isset($_GET['page']) && $_GET['page'] > 1) {



                  echo '<div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">

      <ul class="pagination pagination-sm">

      <li class="page-item "><a class="page-link" href="?act=nick1&danhmuc=' . $_GET['danhmuc'] . '&page=' . ($page - 1) . '" >«</a></li>

      ';
               } else {



                  echo '<div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">

      <ul class="pagination pagination-sm">

 

   ';
               }

               for ($page = 1; $page <= $number_of_page; $page++) {



                  echo '

   <li class="page-item"><a class="page-link" href="?act=nick&danhmuc=' . $_GET['danhmuc'] . '&page=' . $page . '">' . $page . '</a></li>';
               }

               if (isset($_GET['page']) && $_GET['page'] >= $number_of_page) {

                  echo ' 

         

         </ul> </div>';
               } else {

                  if (isset($_GET['page'])) {



                     echo ' 

         <li class="page-item"><a class="page-link" href="?act=nick&danhmuc=' . $_GET['danhmuc'] . '&page=' . ($_GET['page'] + 1) . '" >»</a></li>

         </ul> </div>';
                  }
               }
            }

            // end page_sp

         }
      } else {

         echo "";
      }
   }
}

function get_search($ma_sp, $price_min, $trang_thai, $price_max, $rank_seach, $ngoc_seach,$Field03)

{

   header("Location:?act=nick&danhmuc=" . $_GET['danhmuc'] . "&game_id=" . $ma_sp . "&trang_thai=" . $trang_thai . "&moneymin=" . $price_min . "&moneymax=" . $price_max . "&Field01=" . $rank_seach . "&Field02=" . $ngoc_seach . "&Field03=".$Field03."");
}

