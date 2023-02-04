<?php
require_once __DIR__ . '/wit/header.php';
?>


<!-- END: LAYOUT/HEADERS/HEADER-1 -->
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
   <!-- BEGIN: PAGE CONTENT -->
   <!-- <div class="m-t-20 visible-sm visible-xs"></div>
      <center style="max-width:1140px; margin: 0 auto;" class="hidden-xs">
         <div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-image: url('/duan/admin/view/upload/unknown-cover.jpg');background-position: center;width:100%;height: 350px;background-repeat: no-repeat;background-position: center;background-size: cover;">
            <div class="container">
               <div class="c-page-title c-pull-left">
                  <h3 class="c-font-uppercase c-font-bold c-font-white c-font-20 c-font-slim">&nbsp;</h3>
               </div>
            </div>
         </div>
      </center>
      <div class="container c-size-md ">
         <div class="col-md-12">
            <div class="text-center" style="margin-top: -128px;">
               <center>
                  <img class="img-responsive img-thumbnail hidden-xs" width="256" height="256" src="/duan/admin/view/upload/unknown-avatar.jpg" alt="png-image">
               <h2 class="c-font-bold c-font-28">ID Web: 532652</h2> 
                  <h2 class="c-font-bold c-font-28">
                   '  ' . $_SESSION["username_show"] . ' '; 
                  </h2>
                  <h2 class="c-font-22">Thành viên</h2>
                   '   <h2 class="c-font-22">' . show_email() . '</h2>
               <h2 class="c-font-22 c-font-red">' . number_format($tien, 0, ',', '.') . ' </b>'; ?></h2>
               </center>
            </div>
         </div>
      </div> -->
   <div class="c-layout-page" style="margin-top: 20px;">
      <div class="container">
         <div class="c-layout-sidebar-menu c-theme ">
            <div class="row">
               <div class="col-md-12 col-sm-6 col-xs-6 m-t-15 m-b-20">
                  <!-- BEGIN: LAYOUT/SIDEBARS/SHOP-SIDEBAR-DASHBOARD -->
                  <div class="c-content-title-3 c-title-md c-theme-border">
                     <h3 class="c-left c-font-uppercase">Menu tài khoản</h3>
                     <div class="c-line c-dot c-dot-left "></div>
                  </div>
                  <div class="c-content-ver-nav">
                     <ul class="c-menu c-arrow-dot c-square c-theme">
                        <li><a href="?act=profile" class="active">Thông tin tài khoản</a></li>
                        <li><a href="#" class="p-quantity ">Hộp thư
                              <span id="quantity_noti" class="quantity">0</span>
                           </a>
                        </li>
                        <li><a href="#" class="">Lịch sử giao dịch </a></li>
                        <li>
                           <a data-toggle="collapse" data-parent="#accordion1" class="cmenu-parrent collapsed" href="#menuchild_roll">Lịch sử vòng quay (0)</a>
                           <ul id="menuchild_roll" class="children collapse">
                           </ul>
                        </li>
                        <!-- <li><a href="/user/withdrawruby/1" class="">Rút quà mở rương (8)</a></li>
                        <li><a href="/user/bank" class="">Tài khoản ngân hàng</a></li> -->
                     </ul>
                  </div>
               </div>
               <div class="col-md-12 col-sm-6 col-xs-6 m-t-15">
                  <div class="c-content-title-3 c-title-md c-theme-border">
                     <h3 class="c-left c-font-uppercase">Menu giao dịch</h3>
                     <div class="c-line c-dot c-dot-left "></div>
                  </div>
                  <div class="c-content-ver-nav m-b-20">
                     <ul class="c-menu c-arrow-dot c-square c-theme">
                        <li><a href="#" class=""><b>Nạp thẻ tự động</b></a></li>
                        <li><a href="/duan/?act=history_nap" class="">Lịch sử nạp thẻ</a></li>
                        <!-- <li><a href="/recharge" class="">Nạp Ví / ATM tự động</a></li> -->
                        <li><a href="/duan/?act=history_bill" class="">Tài khoản đã mua</a></li>
                        <!-- <li><a href="/tran/acc-hire-purchase" class="">Tài khoản trả góp</a></li> -->
                        <li><a href="#" class="">Dịch vụ đã mua</a></li>
                        <li><a href="#" class="">Lịch sử mua phụ kiện</a></li>
                        <!-- <li><a href="/mua-the/log" class="">Thẻ cào đã mua</a></li>
                        <li><a href="/user/tranfer" class="">Chuyển tiền</a></li> -->
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="c-layout-sidebar-content ">
            <!-- BEGIN: PAGE CONTENT -->
            <!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
            <div class="c-content-title-1">
               <h3 class="c-font-uppercase c-font-bold">Thông tin tài khoản</h3>
               <div class="c-line-left"></div>
            </div>
            <div class="col-md-8">
                    <div class="information-inner">
                        <div class="card rounded-sm bg-white">
                            <!-- <div class="card-header bg-transparent rounded-0 border-0">
                                <div class="heading-m1">
                                    <div class="title">
                                        Thông tin tài khoản
                                    </div>
                                </div>
                            </div> -->
                            <style>
                                /* td {
                                border-bottom: 1px dashed #5cb85c45;
                            } */
                                .table>tbody>tr>td,
                                .table>tbody>tr>th,
                                .table>tfoot>tr>td,
                                .table>tfoot>tr>th,
                                .table>thead>tr>td,
                                .table>thead>tr>th {
                                    padding: 8px;
                                    line-height: 50px !important;
                                    vertical-align: top;
                                    border-top: 1px solid #ddd;
                                }

                                .col-md-8 {
                                    -ms-flex: 0 0 66.666667%;
                                    flex: 0 0 66.666667%;
                                    width: 100% !important;
                                }

                                .row.no-gutters.pb-3.mb-3 {
                                    display: flex;
                                    padding-bottom: 1rem !important;
                                    margin-bottom: 1rem !important;
                                    border-bottom: 1px dashed #5cb85c45;
                                }

                                @media screen and (min-width: 991px) {
                                    .pl-md-8 {
                                        padding-left: 80px !important;
                                    }
                                }

                                @media screen and (min-width: 991px) {
                                    .pl-md-8 {
                                        padding-left: 80px !important;
                                    }
                                }

                                @media (min-width: 768px) {
                                    .text-md-left {
                                        text-align: left !important;
                                    }
                                }

                                .pt-4,
                                .py-4 {
                                    padding-top: 1.5rem !important;
                                }

                                .mt-5,
                                .my-5 {
                                    margin-top: 3rem !important;
                                }

                                .btn-secondary {
                                    color: #fff;
                                    background-color: #6c757d;
                                    border-color: #6c757d;
                                }
                            </style>
                            <?php
                            foreach ($kq as $row) {
                                echo '   
                                    <div class="card-body">
                                        <div class="information-view" id="informationView">
                                            <div class="information-list">
                                                                                    <div class="row no-gutters pb-3 mb-3">
                                                        <div class="col-5 col-md-4">
                                                            Tên đăng nhập
                                                        </div>
                                                        <div class="col-7 text-right text-md-left pl-md-8 col-md-8">
                                                            <b>' . $row['username'] . '</b>
                                                        </div>
                                                    </div>
                                                                                <div class="row no-gutters pb-3 mb-3">
                                                    <div class="col-5 col-md-4">
                                                      Tên hiển thị
                                                    </div>
                                                    <div class="col-7 text-right text-md-left pl-md-8 col-md-8">
                                                        <b>' . $row['ten_hien_thi'] . '</b>
                                                    </div>
                                                </div>
                                                <div class="row no-gutters pb-3 mb-3">
                                                    <div class="col-5 col-md-4">
                                                        Email
                                                    </div>
                                                    <div class="col-7 text-right text-md-left pl-md-8 col-md-8">
                                                        <b>' . $row['email'] . '</b>
                                                    </div>
                                                </div> 
                                                   <div class="row no-gutters pb-3 mb-3">
                                                <div class="col-5 col-md-4">
                                                   Số điện thoại
                                                </div>
                                                <div class="col-7 text-right text-md-left pl-md-8 col-md-8">
                                                    <b> ' . $row['phone'] . ' </b>
                                                </div>
                                            </div>
                                                <div class="row no-gutters pb-3 mb-3">
                                                    <div class="col-5 col-md-4">
                                                        Nhóm
                                                    </div>
                                                    <div class="col-7 text-right text-md-left pl-md-8 col-md-8">
                                                        <b> ' . $row['vai_tro'] . ' </b>
                                                    </div>
                                                </div>


                                               
                                           
                                                                               
                                            <div class="mt-5 pt-4 border-top text-center text-md-left">
                                                <a href="/duan/?act=edit_profile" class="btn btn-success btn-small updateInformation">
                                                    Sửa thông tin
                                                </a>
                                                <a href="/duan/?act=change_pass" class="btn btn-secondary btn-small updateInformation">
                                                    Đổi mật khẩu
                                                </a>
                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="loading-pure" style="display: none">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                ';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <!-- END: PAGE CONTENT -->
         </div>
      </div>
   </div>
   <!-- END: PAGE CONTENT -->
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
<!-- <div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
      <div class="modal-content">
      </div>
   </div>
</div>
</div>
<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
      <div class="modal-content">
      </div>
   </div>
</div> -->
<script>
   $(document).ready(function() {
      $('.load-modal').each(function(index, elem) {
         $(elem).unbind().click(function(e) {
            e.preventDefault();
            e.preventDefault();
            var curModal = $('#LoadModal');
            curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
            curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
         });
      });
   });
</script>
<?php

?>
<?php
require_once __DIR__ . '/wit/footer.php';
?>
