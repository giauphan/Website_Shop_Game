<?php 

function showthe($conn)
{
    if (isset($_SESSION['ma_user'])) {
        $showtien = 'SELECT * FROM `lich_su_nap` WHERE id_user = "' . $_SESSION['ma_user'] . '" ';
        $runshowtien = mysqli_query($conn, $showtien);
        $kt = FALSE;

        while ($row = mysqli_fetch_assoc($runshowtien)) {
            if ($row['id_user'] == $_SESSION['ma_user']) {

                $retVal = ($row['trang_thai'] == 0) ? 'thất bại' : 'thành công';
                echo '
                    <tr>
                        <td>' . $row['seri'] . '</td>
                        <td>' . $row['ma_the'] . '</td>
                        <td><a href="/user/phone.html"> ' . $row['menh_gia'] . '</a></td>
                        <td><a href="change_pass.php">' . $retVal . '</a></td>
                    </tr>
               ';
                $kt = true;
            }
        }
        if ($kt == false) {
            echo '  <tr>
        <td></td>
        <td></td>
        <td><a href="/user/phone.html"></a></td>
        <td><a href="change_pass.php"></a></td>
        </tr>';
        }
    }
}


// $conn = po_con();


// if (isset($_SESSION['ma_user'])) {
//     $showtien = 'SELECT tien,email FROM `user` WHERE ma_kh = "' . $_SESSION['ma_user'] . '" ';
//     $runshowtien = mysqli_query($conn, $showtien);
//     $email;
//     while ($rowtien = mysqli_fetch_assoc($runshowtien)) {
//         $_SESSION['tien'] = $rowtien['tien'];
//         $email = $rowtien['email'];
//     }
// }
?>