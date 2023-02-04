<?php

function history_recharge(){


    $conn = po_con();

    $sql = "SELECT * FROM `lich_su_nap` join user on id_user = user.ma_kh";
    $query =pdo_query($sql);

    foreach (   $query  as  $row ) {
     $retVal = ($row['trang_thai'] == 1) ? 'thành công' : 'thất bại' ;
      echo ' <tr>
      <td>' . $row['ma_nap'] . '</td>
   
      <td>' . $row['loai_the']  . '</td>
      <td>' . $row['menh_gia'] . '</td>

      <td>' .  $retVal . '</td>
      <td>' . $row['ten_hien_thi'] . '</td>
      <td>' . $row['time_submit'] . '</td>
      <td>

      <a class="delete" href ="?de=' . $row['ma_nap'] . '"title="Xóa" data-toggle="tooltip"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
  </td>
  
  </tr>';
    }
}
?>