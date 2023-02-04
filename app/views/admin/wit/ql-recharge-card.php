


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
                <th width="auto">Mã nạp</th>
                <th width="auto">Loại thẻ</th>
              
                <th width="auto">Seri</th>
                <th width="auto">Trạng thái</th>
                <th width="auto">Tên người nạp</th>
                <th width="auto">thời gian</th>
                <th width="5px; !important">Tính Năng</th>
            </tr>
        </thead>

        <tbody>
            <?php history_recharge() ?>



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
<div class="container-fluid end">
    <div class="row text-center">
        <div class="col-lg-12 link">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-youtube"></i>
            <i class="fab fa-google"></i>
        </div>
        <div class="col-lg-12">
            2019 CopyRight Phan mem quan ly | Design by <a href="#"></a>
        </div>
    </div>
</div>
<script src="jquery.min.js"></script>


</body>

</html>