<?php
namespace App\Models;
use App\Models\Model as ModelsModel;

class pay extends ModelsModel
{
   public $db;
   public function __construct()
   {
      $this->db = new database;
   }
   public function show_img($img, $hinh)

   {

      // $img = explode("|", $img);
      // $check = true;
      // for ($i = 0; $i < sizeof($img); $i++) {
      //    $img[$i] = trim($img[$i]);
      //    if ($img[$i] != "  " && empty($img[$i]) != true) {
      //       echo ' <p>
      // <a rel="gallery1" data-fancybox="images" href="">
      // <img class="img-responsive img-thumbnail" src="/assets/upload/' . $img[$i] . '" alt="png-image">
      // </a>
      // </p>';
      //    } else {
      //       echo '';
      //       $check = false;
      //    }
      // }
      // if ($check == false) {
      //    echo ' <p>
      // <a rel="gallery1" data-fancybox="images" href="">
      // <img class="img-responsive img-thumbnail" src="/assets/upload/' . $hinh . '" alt="png-image">
      // </a>
      // </p>';
      // }
   }
   public function showproductcfsp($idacc)
   {
      $sql_anh = "SELECT * FROM sp  where `ma_sp` = ? GROUP by sp.ma_sp";

      return  $this->db->pdo_query($sql_anh, $idacc);
   }

   public function comment($today, $noi_dung)
   {
      $sql_bl = "INSERT INTO `binhluan`( `ngay_bl`, `noi_dung`, `ma_kh_bl`, `ma_sp`) VALUES (?,?,?,?)";

      $this->db->pdo_execute($sql_bl, $today, $noi_dung, $_SESSION['ma_user'], $_GET['id']);
   }
   public function showsplienquan()
   {
      $sql = "SELECT * FROM  `sp`  where trang_thai_sp = 0 GROUP by sp.ma_sp";
      return $this->db->pdo_query($sql);
   }

 

   public function pay()
   {

      $game = '';

      $sl_sql = "SELECT * FROM `sp` WHERE ma_sp = " . $_GET['id'] . " GROUP by sp.ma_sp";

      $kq = $this->db->pdo_query($sl_sql);

      foreach ($kq as $row) {

         $retVal = ($row['ngoc'] == 0) ?  "có" : "không";

         if ($row['ma_loai'] == 1) {

            $game = 'Liên quân';
         } else  if ($row['ma_loai'] == 2) {

            $game = 'Liên minh huyền thoại';
         } else  if ($row['ma_loai'] == 3) {

            $game = 'Ngọc rồng online';
         } else {

            $game = 'Free fire';
         }
         echo '
      `<div class="modal-content"> <form method="POST" action="?act=acc&id=' . $row['ma_sp'] . '&loai=' . $row['ma_loai'] . '&check=1" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" data-hs-cf-bound="true"> <input name="_token" type="hidden" value="FArKiDKUx5qLkQ607AMswlQoIx7lC3kczIIBXb8t"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button> <h4 class="modal-title">Xác nhận mua tài khoản</h4> </div> <div class="modal-body"> <div class="c-content-tab-4 c-opt-3" role="tabpanel"> <ul class="nav nav-justified" role="tablist"> <li role="presentation" class="active"> <a href="#payment" role="tab" data-toggle="tab" class="c-font-16">Thanh toán</a> </li> <li role="presentation"> <a href="#info" role="tab" data-toggle="tab" class="c-font-16">Tài khoản</a> </li> </ul> <div class="tab-content"> <div role="tabpanel" class="tab-pane fade in active" id="payment"> <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5"> <li class="c-font-dark"> <table class="table table-striped"> <tbody> <tr> <th colspan="2">Thông tin tài khoản #' . $row['ma_sp'] . '</th> </tr>

      <div id="gia_sp"><input type="hidden" id="price" name="price_sp" value="' . $row['giasp']  . '"></div> </tbody> <tbody> <tr> <input class="hidden" type="text" id="category" value="' . $row['ma_loai']  . '"> </tr>  <td>Tên game:</td> <th>' . $game   . ' </th>  </tr> <tr> <td>Giá tiền:</td> <th class="text-info" id="total">' . number_format(($row['giasp']), 0, ',', '.')  . 'đ </th> </tr> </tbody> </table> </li> </ul> </div> <div role="tabpanel" class="tab-pane fade" id="info"> <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5"> <li class="c-font-dark"> <table class="table table-striped"> <tbody> <tr> <th colspan="2">Chi tiết tài khoản #' . $row['ma_sp'] . '</th> </tr> <tr> <td style="width:50%">Rank:</td> <td class="text-danger" style="font-weight: 700">' . $row['rank'] . '</td> </tr> <tr> <td style="width: 50%">Tướng:</td> <td class="text-danger" style="font-weight: 700">' . $row['tuong'] . '</td> </tr> <tr> <td style="width: 50%">Trang Phục:</td> <td class="text-danger" style="font-weight: 700">' . $row['trang_phuc'] . '</td> </tr> <tr> <td style="width:50%">Ngọc 90:</td> <td class="text-danger" style="font-weight: 700">' .   $retVal . '</td> </tr> <tr> <td style="width:50%">Nick có tướng trong đá quý:</td> <td class="text-danger" style="font-weight: 700">Có</td> </tr> <tr> <td style="width:50%">Nick có trang phục trong đá quý:</td> <td class="text-danger" style="font-weight: 700">Có</td> </tr> </tbody> </table> </li> </ul> </div> </div> </div> <div class="form-group "> <label class="col-md-3 form-control-label">Mã giảm giá:</label> <div class="col-md-7">  <input type="text" id="coupon_sale" class="form-control c-square c-theme coupon" name="coupon" placeholder="Mã giảm giá" value="">    <button type="button" id="btn_sale"  onclick="check_sale()"> Áp dụng</button>     <span class="help-block" id="block"> Nhập mã giảm giá nếu có để nhận ưu đãi</span> </div> </div> <div class="form-group "> <label class="col-md-12 form-control-label text-danger" style="text-align: center;margin: 10px 0; ">  </label> </div> <div style="clear: both"></div> </div> <div class="modal-footer">  <button type="sumbit" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" name="pay">Mua</button> <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button> </div>  </form> </div>`';
      }
   }

   public function pay_login()
   {

      $game = '';

      $sl_sql = "SELECT * FROM `sp`  WHERE ma_sp = " . $_GET['id'] . " GROUP by sp.ma_sp";

      $kq = $this->db->pdo_query($sl_sql);

      foreach ($kq as $row) {

         $retVal = ($row['ngoc'] == 0) ?  "có" : "không";

         if ($row['ma_loai'] == 1) {

            $game = 'liên quân';
         } else  if ($row['ma_loai'] == 2) {

            $game = 'liên minh huyền thoại';
         } else  if ($row['ma_loai'] == 3) {

            $game = 'Ngọc rồng online';
         } else {

            $game = 'Free fire';
         }

         echo '`<div class="modal-content"> <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" data-hs-cf-bound="true"> <input name="_token" type="hidden" value="FArKiDKUx5qLkQ607AMswlQoIx7lC3kczIIBXb8t"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button> <h4 class="modal-title">Xác nhận mua tài khoản</h4> </div> <div class="modal-body"> <div class="c-content-tab-4 c-opt-3" role="tabpanel"> <ul class="nav nav-justified" role="tablist"> <li role="presentation" class="active"> <a href="#payment" role="tab" data-toggle="tab" class="c-font-16">Thanh toán</a> </li> <li role="presentation"> <a href="#info" role="tab" data-toggle="tab" class="c-font-16">Tài khoản</a> </li> </ul> <div class="tab-content"> <div role="tabpanel" class="tab-pane fade in active" id="payment"> <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5"> <li class="c-font-dark"> <table class="table table-striped"> <tbody> <tr> <th colspan="2">Thông tin tài khoản #' . $row['ma_sp'] . '</th> </tr> </tbody> <tbody> <tr>  </tr> <tr> <td>Tên game:</td> <th>' . $game   . '</th> </tr> <tr> <td>Giá tiền:</td> <th class="text-info">' . number_format(($row['giasp']), 0, ',', '.')  . 'đ</th> </tr> </tbody> </table> </li> </ul> </div> <div role="tabpanel" class="tab-pane fade" id="info"> <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5"> <li class="c-font-dark"> <table class="table table-striped"> <tbody> <tr> <th colspan="2">Chi tiết tài khoản #' . $row['ma_sp'] . '</th> </tr> <tr> <td style="width:50%">Rank:</td> <td class="text-danger" style="font-weight: 700">' . $row['rank'] . '</td> </tr> <tr> <td style="width: 50%">Tướng:</td> <td class="text-danger" style="font-weight: 700">' . $row['tuong'] . '</td> </tr> <tr> <td style="width: 50%">Trang Phục:</td> <td class="text-danger" style="font-weight: 700">' . $row['trang_phuc'] . '</td> </tr> <tr> <td style="width:50%">Ngọc 90:</td> <td class="text-danger" style="font-weight: 700">' .   $retVal . '</td> </tr> <tr> <td style="width:50%">Nick có tướng trong đá quý:</td> <td class="text-danger" style="font-weight: 700">Có</td> </tr> <tr> <td style="width:50%">Nick có trang phục trong đá quý:</td> <td class="text-danger" style="font-weight: 700">Có</td> </tr> </tbody> </table> </li> </ul> </div> </div> </div> <div class="form-group ">  <div class="col-md-7">  </div> </div> <div class="form-group "> <label class="col-md-12 form-control-label text-danger" style="text-align: center;margin: 10px 0; ">  </label> </div> <div style="clear: both"></div> </div> <div class="modal-footer">  <a href="?act=dangnhap" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" name="login">Đăng nhập</a> <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button> </div>  </form> </div>`';
      }
   }
   public function show_code_sale()
   {
      $sl_sql = "SELECT * FROM tbl_code_sale ";
      $runshow = $this->db->pdo_query($sl_sql);
      // $code_sale_price = 0;
      echo "[";
      foreach ($runshow as $row) {
         echo  " '" . $row['code'] . "', ";
      }
      echo "],";
   }
   public function show_price_sale()
   {
      $sl_sql = "SELECT * FROM tbl_code_sale ";
      $runshow = $this->db->pdo_query($sl_sql);
      // $code_sale_price = 0;
      echo " [";
      foreach ($runshow as $row) {
         echo  " '" . $row['price_sale'] . "', ";
      }
      echo "],";
   }

   public function show_category_sale()
   {
      $sl_sql = "SELECT * FROM tbl_code_sale ";
      $runshow = $this->db->pdo_query($sl_sql);
      // $code_sale_price = 0;
      echo " [";
      foreach ($runshow as $row) {
         echo  " '" . $row['ma_loai'] . "', ";
      }

      echo "]";
   }
}
