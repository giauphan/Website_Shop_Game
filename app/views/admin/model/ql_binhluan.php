<?php
function showbl()
{
    $conn = po_con();

    $bl_sql = "SELECT * FROM `binhluan` join user WHERE binhluan.ma_kh_bl= user.ma_kh;";
    $runbl = mysqli_query($conn, $bl_sql);
    while ($rowbl  = mysqli_fetch_assoc($runbl)) {
        echo ' <tr>
            <td>' . $rowbl['ma_bl'] . '</td>
    
            <td>' . $rowbl['ma_kh'] . '</td> 
            <td>' . $rowbl['ten_hien_thi'] . '</td>
            <td>' . $rowbl['noi_dung']  . '</td>
            <td>' . $rowbl['ma_sp'] . '</td>
    
    
         
            <td>

            <a class="delete" href ="?act=del_bl&de=' . $rowbl['ma_bl'] . '"title="Xóa" data-toggle="tooltip"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
        </td>
        
        </tr>';
        
    }
    // }
}
function del_bl($id){
    $conn = po_con();

 
     $sql_de = 'DELETE FROM `binhluan` WHERE ma_bl = "' . $id .  '"  ';
    mysqli_query($conn, $sql_de);
 
  
 }
?>