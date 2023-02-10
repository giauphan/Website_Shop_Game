<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\history_bill;

class exportController extends Controller
{
    public function index()
    {
        $bill = new history_bill();
        $bills = $bill->get_donhang($_SESSION['ma_user']);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $mydate = getdate(date("U"));
        $today = "$mydate[year]/$mydate[mon]/$mydate[mday]";

        if (isset($bills) && sizeof($bills) > 0) {
            echo '<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>';
            // Set the header for the Excel file
            header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
            header("Content-Disposition: attachment; filename=export" . $today . ".xls");

            // Start the table in the Excel file
            echo "<table border='1'>";

            // Output the table headers
            echo "<tr>";
            echo "<td>Tên người mua</td>";
            echo "<td>Mã đơn hàng</td>";
            echo "<td>Tên danh muc</td>";
            echo "<td>Mã giảm giá</td>";
            echo "<td> Giá đơn hàng</td>";
            echo "<td>Tài khoản game</td>";
            echo "<td>Mật khẩu game</td>";
            echo "<td>Ngày mua</td>";
            echo "</tr>";
            // `ma_dh`, `ngay_nhap_dh`, `ma_giam`, `gia_dh`, `ten_game`, `tai_khoan_game`, `password_game`, `ma_sp`, `ma_kh`
            // Output the data from the table
            foreach ($bills as $row) {
            
                extract($row);
                echo "<tr>";
                echo "<td>" . $ten_hien_thi . "</td>";
                echo "<td>" . $ma_dh . "</td>";
                echo "<td>" . $ten_game . "</td>";
                echo "<td>" . $ma_giam . "</td>";
                echo "<td>" . $gia_dh . "</td>";
                echo "<td>" . $tai_khoan_game . "</td>";
                echo "<td>" . $password_game . "</td>";
                echo "<td>" . $ngay_nhap_dh . "</td>";

                echo "</tr>";
            }

            // End the table in the Excel file
            echo "</table>";
            echo '</body>
            </html>';
        } else {
            echo "No data found.";
        }
    }
}
