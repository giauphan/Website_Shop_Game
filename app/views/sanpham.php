<?php
require_once __DIR__ . '/wit/header.php';
?>


<!-- END: LAYOUT/HEADERS/HEADER-1 -->
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
         <h1 class="alert-heading" style="color: #000;text-align: center; margin-bottom: 30px;font-size: 30px;">
         <?php
         if(isset($kq)&&sizeof($kq)) {
            foreach($kq as $item){
               if ($_GET['danhmuc']== $item['ma_loai']) {
               echo $item['ten_loai'];
               }
            }
         }
         ?>
        </h1>
            <div class="alert alert-info box-text showtext" role="alert">
               <h1 class="alert-heading" style="color:#000">
            <?php 
            if(isset($kq)&&sizeof($kq)) {
               foreach($kq as $item) {
                  if ($_GET['danhmuc']== $item['ma_loai']) {
                  echo $item['ten_loai'];
                  } 
            }
         }
      ?></h1>
               <p></p>
               <table align="center" border="1" cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                  <tbody>
                     <tr>
                        <td><span style="color:#000000"><span style="font-size:16px">✅&nbsp;<strong>Mua acc Liên Quân giá rẻ</strong></span></span></td>
                        <td><span style="color:#000000"><span style="font-size:16px"><strong>⭐&nbsp;Giá rẻ nhất thị trường chỉ từ 1k, 7k, 9k. Cho phép trả góp</strong></span></span></td>
                     </tr>
                     <tr>
                        <td><span style="color:#000000"><span style="font-size:16px">✅&nbsp;<strong>Mua nick Liên Quân uy tín</strong></span></span></td>
                        <td><span style="color:#000000"><span style="font-size:16px"><strong>⭐&nbsp;Acc 100% đúng mật khẩu, đúng như hình, 1 đổi 1&nbsp;nick sai</strong></span></span></td>
                     </tr>
                     <tr>
                        <td><span style="color:#000000"><span style="font-size:16px">✅&nbsp;<strong>Mua acc Liên Quân nhanh</strong></span></span></td>
                        <td><span style="color:#000000"><span style="font-size:16px"><strong>⭐ Giao dịch và check tự động, nhận acc sau 30s</strong></span></span></td>
                     </tr>
                     <tr>
                        <td><span style="color:#000000"><span style="font-size:16px">✅&nbsp;<strong>Nick Liên Quân&nbsp;đa dạng</strong></span></span></td>
                        <td><span style="color:#000000"><span style="font-size:16px"><strong>⭐ Nhiều lựa chọn acc đa dạng: mệnh gíá, tướng, trang phục,...</strong></span></span></td>
                     </tr>
                  </tbody>
               </table>
               <p><span style="font-size:16px"><strong><a href=" /garena/lien-quan" target="_blank">Web mua bán nick Liên Quân Mobile UY TÍN - GIÁ RẺ</a></strong>. <strong>Shop bán acc<strong> </strong>Liên Quân</strong> - <strong>Tài khoản Liên Quân Vip</strong>, <strong>Nick Liên quân có đá quý.</strong>&nbsp;</span></p>
               <p><span style="font-size:16px"><span style="color:#000000">Ngoài mua&nbsp;bán nick liên quân&nbsp;website còn</span> <strong><a href=" /mua-the" target="_blank"><span style="color:#c0392b">bán thẻ Garena</span></a></strong>,&nbsp;<a href=" /dich-vu/nap-quan-huy" target="_blank"><span style="color:#e67e22"><strong>mua bán quân huy giá rẻ</strong></span></a>,<a href=" /garena/lien-quan-random-so-cap" target="_blank"> <strong>bán acc liên quân<strong> </strong>random</strong></a>, <strong><a href=" /dich-vu/cay-thue-lien-quan">Cày thuê LQ</a> </strong>và rất nhiều dịch vụ khác về <strong>game LQM</strong></span></p>
               <p></p>
            </div>
            <div style="text-align: center;margin: 15px 0">
               <span class="viewless">« Thu gọn</span>
            </div>
         </div>
      </div>
      <?php
      if(isset($kq)&&isset($_GET['danhmuc'])&&sizeof($kq)) {
      foreach($kq as $item) {
      if ($_GET['danhmuc']== 1) { 
      
      ?>
      <div class="row  hidden-xs hidden-sm" style="margin-bottom: 15px">
         <div class="m-l-10 m-r-10">
            <form class="form-inline m-b-10" role="form" method="POST" data-hs-cf-bound="true">

               <div class="col-md-3 col-sm-4 p-5 field-search">
                  <div class="input-group c-square">
                     <span class="input-group-addon">Mã số</span>
                     <input type="text" class="form-control c-square" value="" placeholder="Mã số" name="id">
                  </div>
               </div>
               <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                  <div class="input-group c-square">
                     <span class="input-group-addon">Giá tiền</span>
                     <select class="form-control c-square" name="price">
                        <option value="">Tất cả</option>
                        <option value="0-50000">Dưới 50K</option>
                        <option value="50000-200000">Từ 50K - 200K</option>
                        <option value="200000-500000">Từ 200K - 500K</option>
                        <option value="500000-1000000">Từ 500K - 1 Triệu</option>
                        <option value="1000000">Trên 1 Triệu</option>
                        <option value="5000000">Trên 5 Triệu</option>
                        <option value="10000000">Trên 10 Triệu</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-3 col-sm-4 p-5 field-search">
                  <div class="input-group c-square">
                     <span class="input-group-addon">Trạng thái</span>
                     <select class="form-control c-square" name="status">
                        <option value="">Trạng thái</option>
                        <option value="0">Chưa bán</option>
                        <option value="1">Đã bán</option>


                     </select>
                  </div>
               </div>
               <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                  <div class="input-group c-square">
                     <span class="input-group-addon">Rank</span>
                     <select name="Field01" class="form-control c-square" title="-- Không chọn --">
                        <option value="">-- Rank --</option>
                        <option value="dong">Đồng</option>
                        <option value="bac">Bạc</option>
                        <option value="vang">Vàng</option>
                        <option value="Bach Kim">Bạch Kim</option>
                        <option value="Kim cuong">Kim Cương</option>
                        <option value="Tinh Anh">Tinh Anh</option>
                        <option value="Cao Thu">Cao Thủ</option>
                        <option value="thach Dau">Thách Đấu</option>

                     </select>
                  </div>
               </div>
               <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                  <div class="input-group c-square">
                     <span class="input-group-addon">Ngọc 90</span>
                     <select name="Field02" class="form-control c-square" title="-- Không chọn --">
                        <option value="">-- Ngọc --</option>
                        <option value="1">Không</option>
                        <option value="0">Có</option>
                     </select>
                  </div>
               </div>


               <div class="col-md-3 col-sm-4 p-5 no-radius">
                  <button type="submit" name='submit' class="btn c-square c-theme c-btn-green">Tìm kiếm</button>
                  <?php echo      '<a class="btn c-square m-l-0 btn-danger" href="?sanpham&danhmuc=' . $_GET['danhmuc'] . '">Tất cả</a>'; ?>
               </div>
            </form>
         </div>
      </div>
  <?php  break;
  }else {

   ?>
     <div class="row  hidden-xs hidden-sm" style="margin-bottom: 15px">
         <div class="m-l-10 m-r-10">
            <form class="form-inline m-b-10" role="form" method="POST" data-hs-cf-bound="true">

               <div class="col-md-3 col-sm-4 p-5 field-search">
                  <div class="input-group c-square">
                     <span class="input-group-addon">Mã số</span>
                     <input type="text" class="form-control c-square" value="" placeholder="Mã số" name="id">
                  </div>
               </div>
               <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                  <div class="input-group c-square">
                     <span class="input-group-addon">Giá tiền</span>
                     <select class="form-control c-square" name="price">
                        <option value="">Tất cả</option>
                        <option value="0-50000">Dưới 50K</option>
                        <option value="50000-200000">Từ 50K - 200K</option>
                        <option value="200000-500000">Từ 200K - 500K</option>
                        <option value="500000-1000000">Từ 500K - 1 Triệu</option>
                        <option value="1000000">Trên 1 Triệu</option>
                        <option value="5000000">Trên 5 Triệu</option>
                        <option value="10000000">Trên 10 Triệu</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-3 col-sm-4 p-5 field-search">
                  <div class="input-group c-square">
                     <span class="input-group-addon">Trạng thái</span>
                     <select class="form-control c-square" name="status">
                        <option value="">Trạng thái</option>
                        <option value="0">Chưa bán</option>
                        <option value="1">Đã bán</option>


                     </select>
                  </div>
               </div>
               <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                  <div class="input-group c-square">
                     <span class="input-group-addon">Máy chủ</span>
                     <select name="Field01" class="form-control c-square" title="-- Không chọn --">
                        <option value="">-- Máy chủ --</option>
                        <option value="1">1 sao</option>
                        <option value="2">2 sao</option>
                        <option value="3">3 sao</option>
                        <option value="4">4 sao</option>
                        <option value="5">5 sao</option>
                        <option value="6">6 sao</option>
                        <option value="7">7 sao</option>
                        <option value="8">8 sao</option>
                        <option value="9">9 sao</option>
                        <option value="10">10 sao</option>
                     
                     </select>
                  </div>
               </div>
               <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                  <div class="input-group c-square">
                     <span class="input-group-addon">Bông tai </span>
                     <select name="Field02" class="form-control c-square" title="-- Không chọn --">
                        <option value="">-- Bông tai --</option>
                        <option value="1">Không</option>
                        <option value="0">Có</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                  <div class="input-group c-square">
                     <span class="input-group-addon">Bông tai </span>
                     <select name="Field02" class="form-control c-square" title="-- Không chọn --">
                        <option value="">-- Bông tai --</option>
                        <option value="1">Không</option>
                        <option value="0">Có</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                  <div class="input-group c-square">
                     <span class="input-group-addon">Đăng ký </span>
                     <select name="Field03" class="form-control c-square" title="-- Không chọn --">
                        <option value="">-- Đăng ký --</option>
                        <option value="0">Ảo</option>
                        <option value="1">Gmail xóa vv</option>
                     </select>
                  </div>
               </div>


               <div class="col-md-3 col-sm-4 p-5 no-radius">
                  <button type="submit" name='submit' class="btn c-square c-theme c-btn-green">Tìm kiếm</button>
                  <?php echo      '<a class="btn c-square m-l-0 btn-danger" href="?act=nick&danhmuc=' . $_GET['danhmuc'] . '">Tất cả</a>'; ?>
               </div>
            </form>
         </div>
      </div>
   <?php
   break;
  }
}
}
   ?>
      <div class="filter-product-mobile hidden-md hidden-lg">
         <div class="filter-left form-group">
         </div>
         <div class="filter-right form-group">
            <a class="btn btn-success" style="display: block">
               <i class="fa fa-filter"></i> Tìm kiếm
            </a>
         </div>
         <div id="togger-filter"></div>
      </div>
      <div class="form-filter-right hidden-md hidden-lg">
         <div class="form-filter-content-mobile">
            <div class="list-product-left">
               <div class="category-left">
                  <div class="title-product mb-4">
                     <span class="c-theme-link close-popup">×</span>
                     <h2 style="font-size: 16px;text-align: center">Tìm kiếm </h2>
                  </div>
                  <div class="category-list-product">
                  </div>
               </div>
               <hr>
               <div class="search-list-product">
                  <form class="form-inline m-b-10" role="form" method="POST" data-hs-cf-bound="true">

                     <div class="col-md-3 col-sm-4 p-5 field-search">
                        <div class="input-group c-square">
                           <span class="input-group-addon">Mã số</span>
                           <input type="text" class="form-control c-square" value="" placeholder="Mã số" name="id">
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                        <div class="input-group c-square">
                           <span class="input-group-addon">Giá tiền</span>
                           <select class="form-control c-square" name="price">
                              <option value="">Tất cả</option>
                              <option value="0-50000">Dưới 50K</option>
                              <option value="50000-200000">Từ 50K - 200K</option>
                              <option value="200000-500000">Từ 200K - 500K</option>
                              <option value="500000-1000000">Từ 500K - 1 Triệu</option>
                              <option value="1000000">Trên 1 Triệu</option>
                              <option value="5000000">Trên 5 Triệu</option>
                              <option value="10000000">Trên 10 Triệu</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 p-5 field-search">
                        <div class="input-group c-square">
                           <span class="input-group-addon">Trạng thái</span>
                           <select class="form-control c-square" name="status">
                              <option value="">Trạng thái</option>
                              <option value="0">Chưa bán</option>
                              <option value="1">Đã bán</option>


                           </select>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                        <div class="input-group c-square">
                           <span class="input-group-addon">Rank</span>
                           <select name="rank_seach" class="form-control c-square" title="-- Không chọn --">
                              <option value="">-- Rank --</option>
                              <option value="dong">Đồng</option>
                              <option value="bac">Bạc</option>
                              <option value="vang">Vàng</option>
                              <option value="Bach Kim">Bạch Kim</option>
                              <option value="Kim cuong">Kim Cương</option>
                              <option value="Tinh Anh">Tinh Anh</option>
                              <option value="Cao Thu">Cao Thủ</option>
                              <option value="thach Dau">Thách Đấu</option>

                           </select>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                        <div class="input-group c-square">
                           <span class="input-group-addon">Ngọc 90</span>
                           <select name="ngoc_seach" class="form-control c-square" title="-- Không chọn --">
                              <option value="">-- Ngọc --</option>
                              <option value="1">Không</option>
                              <option value="0">Có</option>
                           </select>
                        </div>
                     </div>


                     <div class="col-md-3 col-sm-4 p-5 no-radius">
                        <button type="submit" name='submit' class="btn c-square c-theme c-btn-green">Tìm kiếm</button>
                        <?php echo      '<a class="btn c-square m-l-0 btn-danger" href="?act=nick&danhmuc=' . $_GET['danhmuc'] . '">Tất cả</a>'; ?>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <style>
         .form-filter-right {
            position: fixed;
            top: 0;
            right: -300px;
            width: 300px;
            height: 100%;
            background: #fff;
            color: #444;
            z-index: 10;
            transition: 400ms ease;
            overflow-y: scroll;
            transform: translateX(0px);
            z-index: 10000;
         }

         .form-filter-right.open {
            display: unset;
            height: 100%;
            transform: translateX(-300px);
         }

         #togger-filter {
            visibility: hidden;
            background-color: #000000bf;
            z-index: 1;
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
            overflow: hidden;
            position: fixed;
            z-index: 9999;
         }

         #togger-filter.active {
            transition: 0.4s;
            visibility: visible;
            cursor: pointer;
         }

         .form-filter-content-mobile {
            padding: 15px;
         }

         .close-popup {
            color: #818e9a;
            font-size: 36px;
            left: 11px;
            top: 7px;
            position: absolute;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
         }
      </style>
      <script>
         $('.filter-right').click(function() {
            $('.form-filter-right').toggleClass('open');
            $("#togger-filter").toggleClass("active");
         });
         $('#togger-filter').click(function(e) {
            $("#togger-filter").removeClass("active");
            $('.form-filter-right').removeClass('open');
         });

         $('#togger-filter').click(function(e) {
            $("#togger-filter").removeClass("active");
            $('.form-filter-right').removeClass('open');
         });
         $('.form-filter-right .close-popup').click(function(e) {
            $("#togger-filter").removeClass("active");
            $('.form-filter-right').removeClass('open');
         });
      </script>
      <div class="row row-flex  item-list" id="show_sp">

      <?php
            if (isset($_GET["danhmuc"])) {
               
               // for ($i = 0; $i <  sizeof($_SESSION['row']); $i++) {

               $loai = '';

               foreach($result as $row) {
                  if ($row['ma_loai'] == 1) {


                     $loai = $row['ma_loai'];
                     $retVal = ($row['field4'] != "") ?  "có" : "không";

                     echo '<div class="col-sm-6 col-md-3">

                                 <div class="classWithPad">

                                    <div class="image">

                                       <a href="/pay/sp?id=' . $row['ma_sp'] . '">
                                       <img src="/assets/upload/' . $row['hinh'] . '" alt="png-image">

                                       <span class="ms">MS: ' . $row['ma_sp'] . '</span>
                                       </a>

                                       </div>

                                       <div class="description">
                                    </div>
            <div class="attribute_info">

                                    <div class="row">

                                       <div class="col-xs-6 a_att">

                                          Rank: <b>' . $row['field2'] . '</b>

                                       </div>

                                       <div class="col-xs-6 a_att">

                                          Tướng: <b>' . $row['field1'] . '</b>

                                       </div>

                                       <div class="col-xs-6 a_att">

                                          Trang Phục: <b>' . $row['field3'] . '</b>

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

                                             <a href="/pay/sp?id=' . $row['ma_sp'] . '">Chi tiết</a>

                                          

                                          </div>

                                       </div>

                                    </div>

                                 </div>

                                 </div>

                     </div>';
                  } else if ($row['ma_loai'] == 2) {


                     $loai = $row['ma_loai'];
                     $retVal = ($row['field4'] != "") ?  "có" : "không";

                     echo '<div class="col-sm-6 col-md-3">

                                 <div class="classWithPad">

                                    <div class="image">

                                       <a href="/pay/sp?id=' . $row['ma_sp'] . '">
                                       <img src="/assets/upload/' . $row['hinh'] . '" alt="png-image">

                                       <span class="ms">MS: ' . $row['ma_sp'] . '</span>
                                       </a>

                                       </div>

                                       <div class="description">
                                    </div>
            <div class="attribute_info">

                                    <div class="row">

                                       <div class="col-xs-6 a_att">

                                          Rank: <b>' . $row['field2'] . '</b>

                                       </div>

                                       <div class="col-xs-6 a_att">

                                          Tướng: <b>' . $row['field1'] . '</b>

                                       </div>

                                       <div class="col-xs-6 a_att">

                                          Trang Phục: <b>' . $row['field3'] . '</b>

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

                                             <a href="/pay/sp?id=' . $row['ma_sp'] . '">Chi tiết</a>

                                          

                                          </div>

                                       </div>

                                    </div>

                                 </div>

                                 </div>

                     </div>';
                  } else  if ($row['ma_loai'] == 3) {
                     $retVal = ($row['field3']  == 0) ?  "Có" : "Không";
                     $login_acc = ($row['field3'] == 0) ?  "Ảo" : "Gmail xóa vv";
                     echo '<div class="col-sm-6 col-md-3">

                                 <div class="classWithPad">

                                    <div class="image">

                                       <a href="/pay/sp?id=' . $row['ma_sp'] . '">
                                      <img src="/assets/upload/' . $row['hinh'] . '" alt="png-image">

                                       <span class="ms">MS: ' . $row['ma_sp'] . '</span>

                                       </a>

                                       </div>

                                       <div class="description">
                                    </div>

                                       <div class="attribute_info">

                                    <div class="row">

                                       <div class="col-xs-6 a_att">

                                          Máy chủ: <b>' . $row['field1'] . ' sao</b>

                                       </div>

                                       <div class="col-xs-6 a_att">
                                          Hành tinh: <b>' . $row['field2'] . '</b>

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

                                             <a href="/pay/sp?id=' . $row['ma_sp'] . '">Chi tiết</a>

                                          

                                          </div>

                                       </div>

                                    </div>

                                 </div>

                                 </div>

                     </div>';
                  } else  if ($row['ma_loai'] == 4) {

                     echo '<div class="col-sm-6 col-md-3">

                                 <div class="classWithPad">

                                    <div class="image">

                                       <a href="/sanpham?id=' . $row['ma_sp'] . '">
                                       <img src="/assets/upload/' . $row['hinh'] . '" alt="png-image">

                                       <span class="ms">MS: ' . $row['ma_sp'] . '</span>

                                       </a>

                                       </div>

                                       <div class="description">
                                    </div>

                                       <div class="attribute_info">

                                    <div class="row">

                                       <div class="col-xs-6 a_att">

                                          Rank: <b>' . $row['field2'] . ' sao</b>

                                       </div>

                                       <div class="col-xs-6 a_att">

                                          Đăng ký: <b>' . $row['field1'] . '</b>

                                       </div>
                                       <div class="col-xs-6 a_att">

                                       Pet: <b>' . $row['field3'] . '</b>

                                    </div>

                                 
                                    <div class="col-xs-6 a_att">

                                       Thẻ vô cực: <b>' .  $row['field4'] . '</b>

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

                                             <a href="/pay/sp?id=' . $row['ma_sp'] . '">Chi tiết</a>

                                          

                                          </div>

                                       </div>

                                    </div>

                                 </div>

                                 </div>

                     </div>';
                  } 
               }



               echo '</div>';



               if (!isset($_GET['page'])) {
                  $page = 1;
               } else {
                  $page = $_GET['page'];
               }

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

            <li class="page-item"><a class="page-link" href="/sanpham?danhmuc=' . $_GET['danhmuc'] . '&game_id=' . $_GET['game_id'] . '&trang_thai=' . $_GET['trang_thai'] . '&moneymin=' . $_GET['moneymin'] . '&moneymax=' . $_GET['moneymax'] . '&Field01=' . $_GET['Field01'] . '&Field02=' . $_GET['Field02'] . '&page=' . $page . '">' . $page . '</a></li>';
                     }

                     if (isset($_GET['page']) && $_GET['page'] >= $number_of_page) {

                        echo ' 

               

               </ul> </div>';
                     } else {

                        if (isset($_GET['page'])) {



                           echo ' 

               <li class="page-item"><a class="page-link" href="/sanpham?danhmuc=' . $_GET['danhmuc'] . '&game_id=' . $_GET['game_id'] . '&trang_thai=' . $_GET['trang_thai'] . '&moneymin=' . $_GET['moneymin'] . '&moneymax=' . $_GET['moneymax'] . '&Field01=' . $_GET['Field01'] . '&Field02=' . $_GET['Field02'] . '&page=' . ($_GET['page'] + 1) . '" >»</a></li>

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

            <li class="page-item"><a class="page-link" href="/sanpham?danhmuc=' . $_GET['danhmuc'] . '&page=' . $page . '">' . $page . '</a></li>';
                     }

                     if (isset($_GET['page']) && $_GET['page'] >= $number_of_page) {

                        echo ' 

               

               </ul> </div>';
                     } else {

                        if (isset($_GET['page'])) {



                           echo ' 

               <li class="page-item"><a class="page-link" href="/sanpham?danhmuc=' . $_GET['danhmuc'] . '&page=' . ($_GET['page'] + 1) . '" >»</a></li>

               </ul> </div>';
                        }
                     }
                  }

                  // end page_sp

               }
            } else {

               echo "";
            }
         ?>



         <div class="tab-vertical tutorial_area">
            <div class="panel-group" id="accordion">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h5 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="">Dịch vụ game khác <i class="glyphicon glyphicon-flag"></i></a>
                     </h5>
                  </div>
                  <div id="tab1" class="panel-collapse collapse in" aria-expanded="true">
                     <div class="panel-body">
                        <p><strong>Lưu ý : <span style="color:#e74c3c!important">Mục tìm nick theo đá quý là :&nbsp;Đá quý và các món trong khó báu như tướng và skin hiếm có&nbsp;trong kho báu</span></strong></p>
                        <p>Ngoài&nbsp; <strong>shop bán acc liên quân</strong>&nbsp;Shop còn có các dịch vụ khác như <strong><a href=" /dich-vu/ban-quan-huy" target="_blank">mua bán quân huy giá rẻ</a></strong>, <strong><a href=" /mua-ban-nick-game-random" target="_blank">bán nick liên quân&nbsp;</a></strong><strong><a href=" /mua-ban-nick-game-random" target="_blank">random</a>&nbsp;,<span style="color:#e74c3c">bán thẻ garena giá&nbsp; rẻ và hơn 40 dịch vụ game khác</span></strong> tại&nbsp;<strong><a href=" /dich-vu" target="_blank"> /dich-vu</a>&nbsp;(<a href=" /dich-vu" target="_blank">click</a>)</strong></p>
                        <p><strong>Link bán quân huy</strong> :&nbsp;<strong><a href=" /dich-vu/lien-quan" target="_blank"> /dich-vu/lien-quan</a>&nbsp;(<a href=" /dich-vu/lien-quan" target="_blank">click</a>)</strong></p>
                     </div>
                  </div>
               </div>
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h5 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="">Group - fanpage cộng đồng <i class="glyphicon glyphicon-flag"></i></a>
                     </h5>
                  </div>
                  <div id="tab1" class="panel-collapse collapse in" aria-expanded="true">
                     <div class="panel-body">
                        <p>Mình có tạo group về liên quân&nbsp;để anh em giao lưu. Ae ấn tham gia group và like page nhé</p>
                        <p>Group :&nbsp;Quanplay - Cộng Đồng Liên Quân Mobile</p>
                        <p>Link : <strong><a href="https://www.facebook.com/groups/lienquan.9/" target="_blank">https://www.facebook.com/groups/lienquan.9/</a></strong></p>
                        <p>Group :&nbsp;Hội Con Gái Chơi Liên Quân Mobile</p>
                        <p>Link :&nbsp;<a href="https://www.facebook.com/groups/lienquanmobile.girl/" target="_blank">https://www.facebook.com/groups/lienquanmobile.girl/</a></p>
                        <p>&nbsp;</p>
                     </div>
                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>
   <!-- Begin: Testimonals 1 component -->

</div>
<style type="text/css">
   .news_image,
   .image,
   .news_title,
   .a-more,
   .news_description {
      position: relative;
      z-index: 200;
   }

   span.sale {
      position: absolute;
      z-index: 1000;
      right: -1px;
      top: -1px;
      background: rgba(255, 212, 36, .9);
      padding: 5px;
      text-align: center;
      color: #ee4d2d;
      width: 50px;
      font-weight: 700;
      font-size: 15px;
   }

   .sale:after {
      content: "";
      width: 0;
      height: 0;
      left: 0;
      bottom: -4px;
      position: absolute;
      border-color: transparent rgba(255, 212, 36, .9);
      border-style: solid;
      border-width: 0 25px 4px;
   }

   .outPrice {
      padding-top: 20px;
      text-align: center;
      width: 100px;
      margin: 0 auto;
      margin-top: 10px;
      display: flex;
      justify-content: center;
   }

   .oldPrice {
      text-decoration: line-through;
      color: #3f0;
      border: 2px solid;
      padding: 5px 15px;
      border-radius: 5px;
      font-size: 14px;
      font-weight: bold;
   }

   .newPrice {
      border: 2px solid red;
      padding: 5px 15px;
      color: red;
      display: inline;
      border-radius: 5px;
      margin-left: 10px;
      font-size: 14px;
      font-weight: bold;
      margin-bottom: 10px;
   }

   .game-list .a-more .view {
      margin-top: 20px;
   }

   @media (max-width: 550px) {
      .outPrice {
         flex-direction: column;
      }

      .newPrice {
         margin-left: 0;
         margin-top: 10px;
         margin-bottom: 10px;
      }
   }
</style>
<!-- END: PAGE CONTENT -->
</div>
<div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="loader" style="text-align: center"><img src="" style="width: 50px;height: 50px;display: none"></div>
      <div class="modal-content">
      </div>
   </div>
</div>
</div>
<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="loader" style="text-align: center"><img src="" style="width: 50px;height: 50px;display: none"></div>
      <div class="modal-content">
      </div>
   </div>
</div>
<script>
   $(document).ready(function() {
      $('.load-modal').each(function(index, elem) {
         $(elem).unbind().click(function(e) {
            e.preventDefault();
            e.preventDefault();
            var curModal = $('#LoadModal');
            curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"\" style=\"width: 50px;height: 50px;\"></div>");
            curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
         });
      });
   });
</script>

</body>

</html>

<?php
require_once __DIR__ . '/wit/footer.php';
?>
