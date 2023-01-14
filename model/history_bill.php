<?php 

function show_bill()
{
    if (isset($_SESSION['ma_user'])) {  $kt = FALSE;
        $showtien = 'SELECT * FROM `donhang` where ma_kh = "' . $_SESSION['ma_user'] . '" ';
        $runshowtien = pdo_query($showtien);
      

     foreach ($runshowtien as $row ) {   
                echo '        
                    <tr>
                        <td><a href="/?act=acc&id=' . $row['ma_sp'] . '" style="color:#569bf3">' . $row['ma_sp'] . '</a></td>
                        <td>' . $row['ten_game'] . '</td>
                        <td>' . $row['gia_dh'] . '</td>
                        <td class="account_show">**********  </td>
                        <td class="password_show "> ****<button id="show" class="btn-show" >hiện </button> </td>
                        <td class="account hidden">' . $row['tai_khoan_game'] . ' </td>
                        <td class="password hidden"> ' . $row['password_game'] . '<button id="hidden" class="btn-hidden hidden">ẩn </button></td>
                        <td>' . $row['ngay_nhap_dh'] . '</td>
                     
                  
                    </tr>
               ';
                $kt = true;
            }
        
        if ($kt == false) {
            echo '  <tr>
         
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>';
        }
    }
}
