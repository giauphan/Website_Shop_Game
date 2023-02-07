<script type="text/javascript">
        //Tìm kiếm
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        //Lọc bảng
        function sortTable() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[0];
                    y = rows[i + 1].getElementsByTagName("TD")[0];
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                 
                }
            }
        }
        //Thời Gian
        function time() {
            var today = new Date();
            var weekday = new Array(7);
            weekday[0] = "Chủ Nhật";
            weekday[1] = "Thứ Hai";
            weekday[2] = "Thứ Ba";
            weekday[3] = "Thứ Tư";
            weekday[4] = "Thứ Năm";
            weekday[5] = "Thứ Sáu";
            weekday[6] = "Thứ Bảy";
            var day = weekday[today.getDay()];
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            nowTime = h + ":" + m + ":" + s;
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }
            today = day + ', ' + dd + '/' + mm + '/' + yyyy;
            tmp = '<i class="fa fa-clock-o" aria-hidden="true"></i> <span class="date">' + today + ' | ' + nowTime +
                '</span>';
            document.getElementById("clock").innerHTML = tmp;
            clocktime = setTimeout("time()", "1000", "Javascript");

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }
        }

        //Thêm
        // $(document).ready(function() {
        //     $('[data-toggle="tooltip"]').tooltip();
        //     var actions = $("table td:last-child").html();
        //     $(".add-new").click(function() {
        //         $(this).attr("disabled", "disabled");
        //         var index = $("table tbody tr:last-child").index();
        //         var row = '<tr>' +
        //             '<td><input type="text" class="form-control" name="name" id="name" placeholder="Nhập Tên"></td>' +
        //             '<td><input type="text" class="form-control" name="gioitinh" id="gioitinh" placeholder="Nhập Giới Tính"></td>' +
        //             '<td><input type="text" class="form-control" name="namsinh" id="namsinh" value="" placeholder="Nhập Ngày Sinh"></td>' +
        //             '<td><input type="text" class="form-control" name="diachi" id="diachi" value="" placeholder="Nhập Địa Chỉ"></td>' +
        //             '<td><input type="text" class="form-control" name="chucvu" id="chucvu" value="" placeholder="Nhập Chức Vụ"></td>' +
        //             '<td>' + actions + '</td>' +
        //             '</tr>';
        //         $("table").append(row);
        //         $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        //         $('[data-toggle="tooltip"]').tooltip();
        //     });
        //     //Kiểm tra rỗng
        //     $(document).on("click", ".add", function() {
        //         var empty = false;
        //         var input = $(this).parents("tr").find('input[type="text"]');
        //         input.each(function() {
        //             if (!$(this).val()) {
        //                 $(this).addClass("error");
        //                 swal("Thông Báo!", "Dữ Liệu Trống Vui Lòng Kiểm Tra", "error");
        //                 empty = true;
        //             } else {
        //                 $(this).removeClass("error");
        //                 swal("Thông Báo!", "Bạn Chưa Nhập Dữ Liệu", "warning");
        //             }
        //         });
        //         $(this).parents("tr").find(".error").first().focus();
        //         if (!empty) {
        //             input.each(function() {
        //                 $(this).parent("td").html($(this).val());
        //                 swal("Thành Công", "Bạn Đã Cập Nhật Thành Công", "success");
        //             });
        //             $(this).parents("tr").find(".add, .edit").toggle();
        //             $(".add-new").removeAttr("disabled");
        //         }
        //     });
        //     // Sửa
        //     $(document).on("click", ".edit", function() {
        //         $(this).parents("tr").find("td:not(:last-child)").each(function() {
        //             $(this).html('<input type="text" class="form-control" value="' + $(this)
        //                 .text() + '">');
        //         });
        //         $(this).parents("tr").find(".add, .edit").toggle();
        //         $(".add-new").attr("disabled", "disabled");
        //     });
        //     jQuery(function() {
        //         jQuery(".add").click(function() {
        //             swal("Thành Công!", "Bạn Đã Sửa Thành Công", "success");
        //         });
        //     });
        //     // Xóa
        //     $(document).on("click", ".delete", function() {
        //         $(this).parents("tr").remove();
        //         swal("Thành Công!", "Bạn Đã Xóa Thành Công", "success");
        //         $(".add-new").removeAttr("disabled");
        //     });
        // });
        //Not use
        jQuery(function() {
            jQuery(".cog").click(function() {
                swal("Sorry!", "Tính Năng Này Chưa Có", "error");
            });
        });
        //Tool tip
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    </body>

</html>
<div class="container-fluid end">
    <div class="row text-center">
        <div class="col-lg-12 link">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-youtube"></i>
            <i class="fab fa-google"></i>
        </div>
        <div class="col-lg-12">
            2022 CopyRight Quản trị viên | Giàu Phan <a href="#"></a>
        </div>
    </div>
</div>
</body>
</html>