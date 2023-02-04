<?php

class account_admin
{

    function show_user()
    {
        $bl_sql = "SELECT * FROM  user WHERE vai_tro= 'thành viên' or vai_tro= 'khách hàng'";
        $query = pdo_query($bl_sql);

        foreach ($query  as  $rowbl) {
            if ($_SESSION['vai_tro'] == 'admin') {

                echo ' <tr>
            <td>' . $rowbl['ma_kh'] . '</td>
            <td><img src="/duan/admin/view/upload/unknown-avatar.jpg" alt="ảnh"  width="100%" heght="auto"></td>
            <td>' . $rowbl['ten_hien_thi']  . '</td>
            <td>' . $rowbl['email'] . '</td>
            <td>' . $rowbl['phone'] . '</td>
            <td>' . $rowbl['vai_tro'] . '</td>
            <td>

            <a class="delete" href ="?act=del_user&de=' . $rowbl['ma_kh'] . '"title="Xóa" data-toggle="tooltip"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
        </td>
        
        </tr>';
            }
        }
    }


    function del_user($ma_user)
    {
        $sql_de = 'DELETE FROM `user` WHERE ma_kh = "' . $ma_user .  '"  ';
        pdo_query($sql_de);
    }
}
