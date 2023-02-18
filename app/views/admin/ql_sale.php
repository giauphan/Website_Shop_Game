<?php
require_once __DIR__ . '/wit/header.php';
?>
<?=
$thongbao
?>
<div class="container-fluid al" style="margin-top: 10%;">
    <div id="clock"></div>
    <Br>
    <p class="timkiemnhanvien"><b>TÌM KIẾM NHÂN VIÊN:</b></p>
    <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Nhập tên nhân viên cần tìm...">
        <i class="fa fa-search" aria-hidden="true"></i> -->
        <style>
         
         th {
             color: #fff !important;
         }
         td{
              font-size: 14px;
         }
     </style>
    <form action="">

    </form>
    <b>CHỨC NĂNG CHÍNH:</b><Br>

    <!-- them danh muc-->
    <a href="/wp-admin/add-code-sale">
        <button class="nv btn add-new" type="button" data-toggle="tooltip" data-placement="top" title="Thêm danh mục"><i class="fa fa-user-plus"></i></button></a>
    <!--end them danh muc-->
    <div class="table-title">
        <div class="row">

        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr class="ex">
                    <th width="auto">STT</th>
                    <th width="auto">Mã sale</th>
                    <th width="auto">Trạng thái mã giảm</th>
                    <th width="auto">Danh mục</th>
                    <th width="auto">Số tiền giảm</th>
                    <th width="5px; !important">Tính Năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($ql_sale) && sizeof($ql_sale) > 0) {
                    $i = 1;
                    foreach ($ql_sale  as  $row) {
                        $status = ( $row['status'] ==0 )? 'Đang hoạt động': "Đã hết hạn";
                        echo ' <tr>
                  <td>' . $i . '</td>
                  <td>' . $row['code']  . '</td>
                  <td>' . $status  . '</td>
                  <td>' . $row['ten_loai']  . '</td>
                 <td>' . $row['price_sale'] . '</td>
                  <td>
                  <a class="edit" href="/wp-admin/change-code-sale?change=' . $row['ma_sale'] . '" title="" data-toggle="tooltip" data-original-title="Sửa"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  <a class="delete" href ="?de=' . $row['ma_sale'] . '"title="Xóa" data-toggle="tooltip"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
              </td>
              
              </tr>';
                        $i++;
                    }
                } else {
                    echo 'Chưa có mã giảm giá nào';
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