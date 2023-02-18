<?php
require_once __DIR__ . '/wit/header.php';
?>

<?=
$thongbao
?>
<div class="container-fluid al">
    <div id="clock"></div>
    <Br>
    <p class="timkiemnhanvien"><b>TÌM KIẾM NHÂN VIÊN:</b></p><Br><Br>
    <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Nhập tên nhân viên cần tìm...">
        <i class="fa fa-search" aria-hidden="true"></i> -->

    <form action="">

    </form>
    <b>CHỨC NĂNG CHÍNH:</b><Br>

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
    <div class="table-responsive">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr class="ex">
                    <th width="auto">Mã user</th>
                    <th width="auto">Tên người dùng</th> 
                        <th width="auto">Trạng thái</th>
                    <th width="auto">Email</th>
                    <th width="auto">phone</th>
                    <th width="auto">Vai trò</th>
                    <th width="5px; !important">Tính Năng</th>
                </tr>
            </thead>

            <tbody>

                <?php
                if (isset($show)&& sizeof($show)>0) {
                    foreach ($show  as  $rowbl) {
                        $status =  ($rowbl['trang_thai_kh'] ==0 ) ? 'đã bị khóa' : 'đang hoạt động';
                            echo ' <tr>
                        <td>' . $rowbl['ma_kh'] . '</td>
                  
                        <td>' . $rowbl['ten_hien_thi']  . '</td>
                        <td>' . $status  . '</td>
                        <td>' . $rowbl['email'] . '</td>
                        <td>' . $rowbl['phone'] . '</td>
                        <td>' . $rowbl['vai_tro'] . '</td>
                        <td>
            
                        <a class="delete" href ="?act=del_user&de=' . $rowbl['ma_kh'] . '"title="Khóa" data-toggle="tooltip"><i class="fa fa-lock" aria-hidden="true"></i></a>
                    </td>
                    
                    </tr>';
                        
                    }
                }
                ?>


            </tbody>
        </table>
        <tfoot></tfoot>
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