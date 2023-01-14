<?php
class naptien
{
   public $db;
   public function __construct()
   {
      $this->db = new database;
   }
   function lichsunap($conn, $loai_the, $menh_gia, $mathe, $seri, $trang_thai)
   {
      date_default_timezone_set("Asia/Ho_Chi_Minh");
      $mydate = getdate(date("U"));
      $time = "$mydate[year]/$mydate[mon]/$mydate[mday]  $mydate[hours]:$mydate[minutes]:$mydate[seconds]";

      $sql_nap = "INSERT INTO `lich_su_nap`( `loai_the`, `menh_gia`,`ma_the`, `seri`, `trang_thai`,`time_submit`, `id_user`) VALUES ('" . $loai_the . "','" . $menh_gia . "','" . $mathe . "','" . $seri . "','" . $trang_thai . "','" . $time . "','" . $_SESSION['ma_user'] . "')";
      $this->db->pdo_execute( $sql_nap);
   }
   function thongbao($msg)
   {
      echo '<script>swal("' . $msg . '");</script>';
      return $msg;
   }
   function pay_the()
   {

      $conn = po_con();
      if (isset($_POST['submit_nap']) && isset($_SESSION['ma_user'])) {
         if (!isset($_POST['telco']) || !isset($_POST['amount']) || !isset($_POST['serial']) || !isset($_POST['code'])) {
            $err = 'Bạn cần nhập đầy đủ thông tin';
         } else {

            $request_id = rand(100000000, 999999999);  //Mã đơn hàng của bạn
            $command = 'charging';  // Nap the
            $url = 'https://thesieure.com/chargingws/v2';
            $partner_id = '4679483661';
            $partner_key = 'f670f9a53eb0c92c97665c730740ef4c';

            $dataPost = array();
            $dataPost['request_id'] = $request_id;
            $dataPost['code'] = $_POST['code'];
            $dataPost['partner_id'] = $partner_id;
            $dataPost['serial'] = $_POST['serial'];
            $dataPost['telco'] = $_POST['telco'];
            $dataPost['command'] = $command;
            ksort($dataPost);
            $sign = $partner_key;
            foreach ($dataPost as $item) {
               $sign .= $item;
            }

            $mysign = md5($sign);

            $dataPost['amount'] = $_POST['amount'];
            $dataPost['sign'] = $mysign;

            $data = http_build_query($dataPost);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            curl_setopt($ch, CURLOPT_REFERER, $actual_link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);

            $obj = json_decode($result);

            if ($obj->status == 99) {
               //Gửi thẻ thành công, đợi duyệt.
               // echo '<pre>';
               // print_r($obj);
               // echo '</pre>';
               thongbao('Gửi thẻ thành công, đợi duyệt');
               lichsunap($conn, $dataPost['telco'],  $dataPost['amount'], $dataPost['code'], $dataPost['serial'], 1);
               $sql_addtien = "UPDATE `user` SET `tien`='" . $dataPost['amount'] . "' WHERE  ma_kh = " . $_SESSION['ma_user'] . "";
               $runsql_addtien = mysqli_query($conn, $sql_addtien);
            } elseif ($obj->status == 1) {
               //Thành công
               thongbao('Thành công');
               // echo '<pre>';
               // print_r($obj);
               // echo '</pre>';
               lichsunap($conn, $dataPost['telco'],  $dataPost['amount'], $dataPost['code'], $dataPost['serial'], 1);
               $sql_addtien = "UPDATE `user` SET `tien`=? WHERE  ma_kh = ?";
               pdo_execute($sql_addtien, $dataPost['amount'], $_SESSION['ma_user']);
            } elseif ($obj->status == 2) {
               //Thành công nhưng sai mệnh giá
               thongbao('Thành công nhưng sai mệnh giá');
               // echo '<pre>';
               // print_r($obj);
               // echo '</pre>';
               lichsunap($conn, $dataPost['telco'],  $dataPost['amount'], $dataPost['code'], $dataPost['serial'], 1);
               $sql_addtien = "UPDATE `user` SET `tien`=? WHERE  ma_kh = ?";
               pdo_execute($sql_addtien, (($dataPost['amount']) * 0.5), $_SESSION['ma_user']);
            } elseif ($obj->status == 3) {
               //Thẻ lỗi
               thongbao('thông tin thẻ không đúng');
               // echo '<pre>';
               // print_r($obj);
               // echo '</pre>';
            } elseif ($obj->status == 4) {
               //Bảo trì
               thongbao('Bảo trì');
               // echo '<pre>';
               // print_r($obj);
               // echo '</pre>';
            } else {
               //Lỗi
               thongbao('Lỗi');
               // echo '<pre>';

               // print_r($obj);
               // echo '</pre>';


            }
         }
      }
   }
}
