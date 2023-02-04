<?php

function ql_category(){



    $sql = "SELECT * FROM `loai`";
    $query =pdo_query($sql);

foreach (   $query  as  $row ) {
 
      echo ' <tr>
      <td>' . $row['ma_loai'] . '</td>
     <td><img src="/duan/admin/view/upload/' . $row['hinh_loai'] . '" width="50%" height="50%"/></td>
      <td>' . $row['ten_loai']  . '</td>
   
      <td>

    
      <a class="edit" href="?act=change_category&change=' . $row['ma_loai'] . '" title="" data-toggle="tooltip" data-original-title="Sửa"><i class="fa fa-pencil" aria-hidden="true"></i></a>
      <a class="delete" href ="?act=del_category&de=' . $row['ma_loai'] . '"title="Xóa" data-toggle="tooltip"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
  </td>
  
  </tr>';
    }
}
?>