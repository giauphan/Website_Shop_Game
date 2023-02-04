<div class="container-fluid al">
    <div id="clock"></div>
    <Br>
    <p class="timkiemnhanvien"><b>TÌM KIẾM NHÂN VIÊN:</b></p><Br><Br>
    <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Nhập tên nhân viên cần tìm...">
        <i class="fa fa-search" aria-hidden="true"></i> -->

    <form action="">

    </form>
    <b>CHỨC NĂNG CHÍNH:</b><Br>

    <!-- them danh muc-->
    <a href="?act=add_category&check=true">
        <button class="nv btn add-new" type="button" data-toggle="tooltip" data-placement="top" title="Thêm danh mục"><i class="fas fa-user-plus"></i></button></a>
    <!--end them danh muc-->
    <div class="table-title">
        <div class="row">

        </div>

    </div>
    <div class="table-responsive">
    <table class="table table-bordered" id="myTable">
        <thead>
            <tr class="ex">
                <th width="auto">Mã loai</th>
                <th width="auto">Hình danh mục</th>
                <th width="auto">Tên danh mục</th>



                <th width="5px; !important">Tính Năng</th>
            </tr>
        </thead>

        <tbody>
            <?php ql_category() ?>



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