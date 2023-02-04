<?php

function ql_bill()
{
  $conn = po_con();
  $showtien = 'SELECT * FROM `donhang`join user  join sp join loai on sp.ma_sp= donhang.ma_sp and  loai.ma_loai = sp.ma_loai  and user.ma_kh = donhang.ma_kh  ';
  $runshowtien = mysqli_query($conn, $showtien);
  while ($row = mysqli_fetch_assoc($runshowtien)) {
    if ($row['ma_dh'] > 1 ) {

      echo '        
                    <tr>
                        <td><a href="/duan/?act=acc&id=' . $row['ma_sp'] . '">' . $row['ma_sp'] . '</a></td>
                        <td>' . $row['ten_loai'] . '</td>
                        <td>' . $row['giasp'] . '</td>
                        <td>' . $row['trang_thai_sp'] . '</td>
                        <td>' . $row['ten_hien_thi'] . '</td>
                        <td>' . $row['ngay_nhap_dh'] . '</td>
                        <td>   <a class="delete" href ="?act=de_bill&de=' . $row['ma_dh'] . '"title="Xóa" data-toggle="tooltip"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </td>
                    </tr>
               ';
    } else {
      echo '        
              <tr>
                <th>không có đơn hàng</th>

              </tr>
          ';
    }
  }
}

function de_bill()
{
  $conn = po_con();
  $sql_de = 'DELETE FROM `donhang` WHERE `donhang`.`ma_dh` = ' . $_GET['de'] .  '"  ';
  mysqli_query($conn, $sql_de);
}
