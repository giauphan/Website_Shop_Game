<?php
require_once __DIR__ . '/wit/header.php';
?>
<div class="container-fluid al">
    <div id="clock"></div>
    <Br>
    <p class="timkiemnhanvien"><b></b></p><Br><Br>
    <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Nhập tên nhân viên cần tìm...">
        <i class="fa fa-search" aria-hidden="true"></i> -->

    <form action="">

    </form>
    <b style="font-size: 21px;">Thống kê và thông tin nạp thẻ</b><Br>

    <!-- <button class="nv" type="button" onclick="sortTable()" data-toggle="tooltip" data-placement="top"
            title="Lọc Dữ Liệu"><i class="fa fa-filter" aria-hidden="true"></i></button>
        <button class="nv xuat" data-toggle="tooltip" data-placement="top" title="Xuất File"><i
                class="fas fa-file-import"></i></button>
        <button class="nv cog" data-toggle="tooltip" data-placement="bottom" title=""><i
                class="fas fa-cogs"></i></button> -->
    <div class="table-title">
        <div class="row">

        </div>

    </div>
    <div class="box">

        <style>
            .box {
                display: flex;
                flex-wrap: wrap;
            }
        </style>
        <div class="box_left" style="width: 25%; margin-right: 30px;">
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr class="ex">
                            <th width="auto">Số người nạp</th>
                            <th width="auto">tổng  tiền </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (isset($query) && sizeof($query) > 0) {
                            $i = 0;
                            $tongnap =0;
                            foreach ($query  as  $row) {
                                $tongnap += $row['menh_gia'];

                             
                                $i++;
                            }
                        }
                        echo ' <tr>
                        <td>' . $i . '</td>
                     
                        <td>   ' . number_format(($tongnap), 0, ',', '.') . 'VNĐ
                        </td> </tr>';
                        ?>



                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
        <div class="boxRight" style="width: 70%;">
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr class="ex">
                            <th width="auto">Mã nạp</th>
                            <th width="auto">Mệnh giá</th>


                            <th width="auto">Trạng thái</th>
                            <th width="auto">Tên người nạp</th>
                            <th width="auto">thời gian</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (isset($query) && sizeof($query) > 0) {
                            foreach ($query  as  $row) {
                                $retVal = ($row['trang_thai'] == 1) ? 'thành công' : 'thất bại';
                                echo ' <tr>
              <td>' . $row['ma_nap'] . '</td>
           
              <td>   ' . number_format(($row['menh_gia']), 0, ',', '.') . 'VNĐ
              </td>
        
              <td>' .  $retVal . '</td>
              <td>' . $row['ten_hien_thi'] . '</td>
              <td>' . $row['time_submit'] . '</td>
             
          
          </tr>';
                            }
                        }
                        ?>



                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
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