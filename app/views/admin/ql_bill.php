<?php
require_once __DIR__ . '/wit/header.php';
?>
<div class="container-fluid al">
    <div id="clock"></div>

    <div class="chart" style="    width: 500px;height: 50%;">
        <p class="thongke" style="font-weight: 700;"><b>THỐNG KÊ</b></p>

        <canvas id="myChart" style="width: 400px; height: 200px;"></canvas>
    </div>
    <style>
            th {
                color: #fff !important;
            }
            td{
              font-size: 14px;
         }
        </style>
    <style>
        canvas {
            width: 500px;
            height: 500px;
        }
    </style>
    <script>
        var canvas = document.getElementById("myChart");
        var ctx = canvas.getContext("2d");
        const today = new Date();
        const day = today.getFullYear();

        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'THỐNG KÊ SỐ LƯỢNG ĐƠN HÀNG NĂM ' + day + ' THEO THÁNG',
                    data: [<?php

                            $m1 = 0;
                            $m2 = 0;
                            $m3 = 0;
                            $m4 = 0;
                            $m5 = 0;
                            $m6 = 0;
                            $m7 = 0;
                            $m8 = 0;
                            $m9 = 0;
                            $m10 = 0;
                            $m11 = 0;
                            $m12 = 0;
                            foreach ($bill as $row) {
                                foreach ($page as $thongke) {

                                    if ($row['ma_sp'] == $thongke['ma_sp'] && $thongke['ma_user'] == $_SESSION['ma_user']) {
                                        $i = $row['thang_nhap_dh'];

                                        if ($i == 1) {
                                            $m1++;
                                        }
                                        if ($i == 2) {
                                            $m2++;
                                        }
                                        if ($i == 3) {
                                            $m3++;
                                        }
                                        if ($i == 4) {
                                            $m4++;
                                        }
                                        if ($i == 5) {
                                            $m5++;
                                        }
                                        if ($i == 6) {
                                            $m6++;
                                        }
                                        if ($i == 7) {
                                            $m7++;
                                        }
                                        if ($i == 8) {
                                            $m8++;
                                        }
                                        if ($i == 9) {
                                            $m9++;
                                        }
                                        if ($i == 10) {
                                            $m10++;
                                        }
                                        if ($i == 11) {
                                            $m11++;
                                        }
                                        if ($i == 12) {
                                            $m12++;
                                        }
                                    }
                                }
                            }
                            echo $m1 . "," . $m2 . "," . $m3 . "," . $m4 . "," . $m5 . "," . $m6 . "," . $m7 . "," . $m8 . "," . $m9 . "," . $m10 . "," . $m11 . "," . $m12   ?>],
                    backgroundColor: [
                        " rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(255, 206, 86, 0.2)",
                        "rgba(75, 192, 192, 0.2)",
                        "rgba(153, 102, 255, 0.2)",
                        "rgba(255, 159, 64, 0.2)",
                        "rgba(255, 99, 132, 0.5)",
                        "rgba(54, 162, 235, 0.5)",
                        "rgba(255, 206, 86, 0.5)",
                        "rgba(75, 192, 192, 0.5)",
                        "rgba(153, 102, 255, 0.5)",
                        "rgba(255, 159, 64, 0.5)"
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <Br>
    <Br>
    <p class="timkiemnhanvien"><b>TÌM KIẾM NHÂN VIÊN:</b></p>
    <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Nhập tên nhân viên cần tìm...">
        <i class="fa fa-search" aria-hidden="true"></i> -->

    <form action="">

    </form>
    <b>CHỨC NĂNG CHÍNH:</b><Br>

    <!-- them danh muc-->
    <a href="?act=add_category&check=true">
        <button class="nv btn add-new" type="button" data-toggle="tooltip" data-placement="top" title="Thêm danh mục"><i class="fa fa-user-plus"></i></button></a>
    <!--end them danh muc-->
    <div class="table-title">
        <div class="row">

        </div>

    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th width="auto"><b>Mã sản phẩm:</b></th>
                    <th width="auto"><b>Tên game:</b></th>
                    <th width="auto"><b>Giá sản phẩm</b></th>
                  
                    <th width="auto"><b>Người mua </b></th>
                    <th width="auto"><b>Thời gian </b></th>
                    <th width="5px; !important">Tính Năng</th>
                </tr>
            </thead>
            <!-- <td>   <a class="delete" href ="?act=de_bill&de=' . $row['ma_dh'] . '"title="Xóa" data-toggle="tooltip"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </td> -->
            <tbody>
                <script>
                    setTimeout('1000', "Javascript");
                </script>
                <?php
                if (isset($bill) && sizeof($bill) > 0) {
                    foreach ($bill as $row) {
                        if ($row['trang_thai_sp'] >= 1) {
                          
                            echo '        
                                  <tr>
                                      <td><a href="/duan/?act=acc&id=' . $row['ma_sp'] . '">' . $row['ma_sp'] . '</a></td>
                                      <td>' . $row['ten_loai'] . '</td>
                                      <td>' . $row['giasp'] . '</td>
                                      
                                      <td>' . $row['ten_hien_thi'] . '</td>
                                      <td>' . $row['ngay_nhap_dh'] . '</td>
                                     
                                  </tr>
                             ';
                        }
                    }
                } else {
                    echo '        
                            <tr>
                              <th>không có đơn hàng</th>
                            </tr>
                        ';
                }
                ?>


            </tbody>
            <tfoot></tfoot>
        </table>
    </div>
    <div id="pageNavPosition" class="text-right"></div>
    <script type="text/javascript">
        var pager = new Pager('myTable', 5);
        pager.init();
        pager.showPageNav('pager', 'pageNavPosition');
        pager.showPage(1);
    </script>
</div>
<hr class="hr1">
<?php
require_once __DIR__ . '/wit/footer.php';
?>