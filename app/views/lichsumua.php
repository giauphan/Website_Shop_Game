<?php
require_once __DIR__ . '/wit/header.php';
?>
<!-- END: LAYOUT/HEADERS/HEADER-1 -->
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
    
    
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
                                <li><a href="/lichsunap" class="">Lịch sử nạp thẻ</a></li>
                                <!-- <li><a href="/recharge" class="">Nạp Ví / ATM tự động</a></li> -->
                                <li><a href="/lichsumua" class="">Tài khoản đã mua</a></li>
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
                    <h3 class="c-font-uppercase c-font-bold">TÀI KHOẢN ĐÃ MUA</h3>
                    <div class="c-line-left"></div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-module">

                        <thead>
                            <tr>

                                <th width="auto"><b>Mã sản phẩm:</b></th>
                                <th width="auto"><b>Tên game:</b></th>
                                <th width="auto"><b>Giá tài khoản </b></th>
                                <th width="auto"><b>Tài khoản </b></th>
                                <th width="auto"><b>Mật khẩu </b></th>
                                <th width="auto"><b>Thời gian </b></th>
                                <th width="auto"><b> </b></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($_SESSION['ma_user'])) {
                                    $kt = FALSE;
                                    if (isset($runshowtien) && sizeof($runshowtien)) {
                                        foreach ($runshowtien as $row) {
                                            echo '        
                                                <tr>
                                                    <td><a href="/?act=acc&id=' . $row['ma_sp'] . '" style="color:#569bf3">' . $row['ma_sp'] . '</a></td>
                                                    <td>' . $row['ten_game'] . '</td>
                                                    <td>' . $row['gia_dh'] . '</td>
                                                    <td class="account_show">**********  </td>
                                                    <td class="password_show "> ****<button id="show" class="btn-show" >hiện </button> </td>
                                                    <td class="account hidden">' . $row['tai_khoan_game'] . ' </td>
                                                    <td class="password hidden"> ' . $row['password_game'] . '<button id="hidden" class="btn-hidden hidden">ẩn </button></td>
                                                    <td>' . $row['ngay_nhap_dh'] . '</td>
                                                
                                            
                                                </tr>
                                        ';
                                            $kt = true;
                                        }

                                        if ($kt == false) {
                                            echo '  <tr>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    </tr>';
                                        }
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    <tfoot></tfoot>
                </div>
                <!-- END: PAGE CONTENT -->
            </div>
        </div>
    </div>
    <script>
        $('.btn-show').click(function() {
            $('.account').removeClass("hidden");
            $('.password').removeClass("hidden");
            $('.account_show').addClass("hidden");
            $('.password_show').addClass("hidden");

            $('.btn-show').addClass('hidden');
            $('.btn-hidden').removeClass("hidden");

        });

        $('.btn-hidden').click(function() {
            $('.account').addClass("hidden");
            $('.password').addClass("hidden");
            $('.account_show').removeClass("hidden");
            $('.password_show').removeClass("hidden");

            $('.btn-hidden').addClass("hidden");
            $('.btn-show').removeClass("hidden");

        });
    </script>
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
<div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
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
</div>
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
</body>

</html>
<?php
require_once __DIR__ . '/wit/footer.php';
?>