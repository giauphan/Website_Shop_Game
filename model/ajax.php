<?PHP



if (isset($_SESSION['ma_user'])) {
    $showtien = 'SELECT tien,email FROM `user` WHERE ma_kh = "' . $_SESSION['ma_user'] . '" ';
    $runshowtien = mysqli_query($conn, $showtien);
    $email;
    while ($rowtien = mysqli_fetch_assoc($runshowtien)) {
        $_SESSION['tien'] = $rowtien['tien'];
        $email = $rowtien['email'];
    }

    if (isset($_POST['change_pass'])) {

        $ma_user = $_SESSION['ma_user'];
        $passold = $_POST['passold'];
        $passnew = $_POST['passnew'];
        $passnewre = $_POST['passnewRe'];
        $sql_restpass = "SELECT * FROM  user";
        $restpass = mysqli_query($conn, $sql_restpass);
        $kt_rsp = false;
        while ($row = mysqli_fetch_array($restpass)) {


            if ($passnewre == $passnew  && $row['password'] == $passold) {
                $sql = "UPDATE user SET password='" . $passnew . "' WHERE ma_kh='" . $ma_user . "'";
                mysqli_query($conn, $sql);

                $kt_rsp = true;
            }
        }
        if ($kt_rsp == true) {
        header("location:/duan/?act=?profile&change=true");
        }
        else {
            header("location:/duan/?act=?profile&change=false");
        }

    }
}

function show_bill()
{
    if (isset($_SESSION['ma_user'])) {  $kt = FALSE;
        $showtien = 'SELECT * FROM `donhang` where ma_kh = "' . $_SESSION['ma_user'] . '" ';
        $runshowtien = pdo_query($showtien);
      

     foreach ($runshowtien as $row ) {
           

           
                echo '        
                    <tr>
                        <td><a href="/duan/?act=acc&id=' . $row['ma_sp'] . '" style="color:#569bf3">' . $row['ma_sp'] . '</a></td>
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
function sl_loai($ma_loai)
{
   $showsl = "SELECT loai.ma_loai,ten_loai, COUNT(sp.ma_loai) as 'so_luong' FROM `loai` LEFT JOIN `sp` on `sp`.ma_loai = `loai`.ma_loai where loai.ma_loai = ? GROUP BY loai.ma_loai ORDER by COUNT(sp.ma_loai); ";
   return pdo_query($showsl, $ma_loai);
}

function sl_pay($ma_loai)
{
   $sql = "SELECT COUNT(trang_thai_sp) as 'sl_ttsp' FROM `sp` WHERE `trang_thai_sp` >= 1 and ma_loai = ?";
   return pdo_query($sql, $ma_loai);
}

function thongbao_sale()
{

   if(!isset($_SESSION['luottruycap'])) $_SESSION['luottruycap']=1;
   else $_SESSION['luottruycap']+=1;
   if ($_SESSION['luottruycap'] == 1) {
      echo "Swal.fire({
         title: '<h1>THÔNG BÁO</h1>',
         html: '<h2><b>Nhân Dịp Black Friday <a href=`/duan/`><b style=`color:#5E70B3;`>TAIKHOANGAME</b></a>  Sale 50% </b></h2>',
         imageUrl: '/duan/Controller/img/banner_sale.jpg',
         imageWidth: 800,
         imageHeight: 300,
         imageAlt: 'Custom image',
       });";
   }
  

   
}

function danhmuc()

{

  $sql = 'SELECT * FROM `loai`';

  return pdo_query($sql);

}

function login($user, $pass)
{
    $kt = false;

    $sql_login = "SELECT * FROM  user";
    $kq =   pdo_query($sql_login);
    $_SESSION['trang_thai'] = '';
    foreach ($kq as $row) {
      if ($row['user'] == $user || $row['email'] == $user&& $row['password'] == $pass) {
      $_SESSION['ma_user'] = $row['ma_kh'];
        $_SESSION['username_show'] = $row['ten_hien_thi'];
        $_SESSION['vai_tro'] = $row['vai_tro'];
        $_SESSION['trang_thai'] = $row['trang_thai_kh'];
        $kt = true;
      }
       
    }
    return $kt;
}


function get_all_user()
{
    $sql = 'SELECT * FROM `user` ';
    $user = pdo_query($sql);
    return $user;
}

function get_all_user_one($ma_user)
{
    $sql = 'SELECT * FROM `user` where ma_kh = ? ';
    $user = pdo_query($sql, $ma_user);
    return $user;
}

function ud_user($phone, $email, $username_show)
{


    // $kq =  get_all_user();

    // $check = false;

    // foreach ($kq as $row) {

    //     if ( $row['email'] == $email || $row['phone'] == $phone ) {

    //         $check = true;
    //     }
    // }

    // if ($check == false) {
    $sql = "UPDATE `user` SET `ten_hien_thi`=?,`email`=?,`phone`=? WHERE ma_kh = ?";
    pdo_query($sql, $username_show, $email, $phone, $_SESSION['ma_user']);
    return true;
    // }
    // else {
    //     return false;
    // }

}

function get_money()

{

  if (isset($_SESSION['ma_user'])) {


    $showtien = 'SELECT tien,email FROM `user` WHERE ma_kh = ?';

    $kq = pdo_query($showtien,$_SESSION['ma_user']);
    $tien = 0;
  foreach ( $kq as  $rowtien ) {

      $tien = $rowtien['tien'];

    }
    return $tien;

  }
}


function lichsunap($conn, $loai_the, $menh_gia, $mathe, $seri, $trang_thai)
{

   date_default_timezone_set("Asia/Ho_Chi_Minh");
   $mydate = getdate(date("U"));
   $time = "$mydate[year]/$mydate[mon]/$mydate[mday]  $mydate[hours]:$mydate[minutes]:$mydate[seconds]";

   $sql_nap = "INSERT INTO `lich_su_nap`( `loai_the`, `menh_gia`,`ma_the`, `seri`, `trang_thai`,`time_submit`, `id_user`) VALUES ('" . $loai_the . "','" . $menh_gia . "','" . $mathe . "','" . $seri . "','" . $trang_thai . "','".$time."','" . $_SESSION['ma_user'] . "')";
   mysqli_query($conn, $sql_nap);
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
            $sql_addtien = "UPDATE `user` SET `tien`='" . $dataPost['amount'] . "' WHERE  ma_kh = " . $_SESSION['ma_user'] . "";
            $runsql_addtien = mysqli_query($conn, $sql_addtien);
         } elseif ($obj->status == 2) {
            //Thành công nhưng sai mệnh giá
            thongbao('Thành công nhưng sai mệnh giá');
            // echo '<pre>';
            // print_r($obj);
            // echo '</pre>';
            lichsunap($conn, $dataPost['telco'],  $dataPost['amount'], $dataPost['code'], $dataPost['serial'], 1);
            $sql_addtien = "UPDATE `user` SET `tien`='" . (($dataPost['amount']) * 0.5) . "' WHERE  ma_kh = " . $_SESSION['ma_user'] . "";
            $runsql_addtien = mysqli_query($conn, $sql_addtien);
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


$conn = po_con();
if (isset($_POST['pay'])  && $_GET['check'] == true) {

   $check = false;
   $sl_sql = "SELECT * FROM `sp` join loai on  sp.ma_loai = loai.ma_loai  WHERE ma_sp = " . $_GET['id'] . "";
   $runshow = mysqli_query($conn, $sl_sql);
   $runcode = false;
   $row = mysqli_fetch_assoc($runshow);
   $gia_sp = $_POST['price_sp'];

   $ma_sp = $row['ma_sp'];
   $trang_thai_Sp = $row['trang_thai_sp'];
   $ten_loai = $row['ten_loai'];
   date_default_timezone_set("Asia/Ho_Chi_Minh");
   $mydate = getdate(date("U"));
   $time = "$mydate[year]/$mydate[mon]/$mydate[mday]  $mydate[hours]:$mydate[minutes]:$mydate[seconds]";
   $coupon = $_POST['coupon'];
   if ($trang_thai_Sp == 0) {

      // end don hang
      $sl_sql = "SELECT * FROM `user`  WHERE ma_kh = " . $_SESSION['ma_user'] . "";
      $runshow = mysqli_query($conn, $sl_sql);
      while ($row = mysqli_fetch_assoc($runshow)) {
         // check  moneny user
         if ($row['tien'] >= $gia_sp) {




            $sql_paytien = "UPDATE `user` SET `tien`=`tien` - " . ($gia_sp) . " WHERE  ma_kh = " . $_SESSION['ma_user'] . "";
            mysqli_query($conn, $sql_paytien);

            // end check noney

            // sp
            $sql_paysp = "UPDATE `sp` SET `trang_thai_sp`= 1 WHERE  ma_sp = " . $ma_sp . "";
            mysqli_query($conn, $sql_paysp);
            $check = true;
            //end  sp
         }
      }

      if ($check == false) {

         header("location:/duan/?act=acc&id=" . $_GET['id'] . "&check=0");
      } else {
         // donhang

         $sl_sql = "SELECT * FROM `sp`  WHERE ma_sp = " . $_GET['id'] . "";
         $runshow = mysqli_query($conn, $sl_sql);
         while ($row = mysqli_fetch_assoc($runshow)) {
            $sql_bl = "INSERT INTO `donhang`( `ngay_nhap_dh`, `ma_giam`, `gia_dh`, `ten_game`, `tai_khoan_game`, `password_game`, `ma_sp`, `ma_kh`) VALUES('" . $time . "','" . $coupon . "','" . $gia_sp . "','" . $ten_loai . "','" . $row['tai_khoan_game'] . "','" .  $row['password_game'] . "','" . $row['ma_sp'] . "','" . $_SESSION['ma_user'] . "')";
            $sql_run = mysqli_query($conn, $sql_bl);
         }
         header("location:/duan/?act=history_bill&id=" . $_GET['id'] . "&check=1");
      }
   }
}

function show_img($img)

{

   $img = explode("|", $img);

   for ($i = 0; $i < sizeof($img); $i++) {
      if ($img[$i] != "") {
         echo ' <p>

      <a rel="gallery1" data-fancybox="images" href="/duan/admin/view/upload/' . $img[$i] . '">

      <img class="img-responsive img-thumbnail" src="/duan/admin/view/upload/' . $img[$i] . '" alt="png-image">

      </a>

      </p>';
      } else {
         echo '';
      }
   }
}

function showproductcfsp()

{

   $conn = po_con();

   if (isset($_GET['id'])) {





      $idacc = $_GET['id'];



      $sql_anh = "SELECT * FROM sp where `ma_sp` = " . $idacc . ";";

      $runanh = mysqli_query($conn, $sql_anh);

      $kt = false;

      $i = 0;

      while ($rowctsp = mysqli_fetch_assoc($runanh)) {

         $retVal = ($rowctsp['ngoc'] == 0) ?  "có" : "không";



         if ($_GET['id'] == $rowctsp['ma_sp']) {



            if ($rowctsp['hinh_ct_1'] != "") {



               if ($rowctsp['trang_thai_sp'] == 0) {











                  // $peter = $ini_array['peter'];



                  // $peter =explode("|",$peter);





                  // $mary = $ini_array['mary'];



                  // $mary=explode("|",$mary);

                  echo '<div class="container">

                     <nav aria-label="breadcrumb" style="display:none">

                        <ol class="breadcrumb">

                           <li class="breadcrumb-item"><a href="/" title="Trang chủ">Trang chủ</a></li>

                           <li class="breadcrumb-item"><a href="/garena/lien-quan" title="Liên quân">Liên quân</a></li>

                           <li class="breadcrumb-item active" aria-current="page">' . $rowctsp['ma_sp'] . '</li>

                        </ol>

                     </nav>

                     <div class="c-shop-product-details-4">

                        <div class="row">

                           <div class="col-md-4 m-b-20">

                              <div class="c-product-header">

                              

                                 <div class="c-content-title-1">

                                    <h3 class="c-font-uppercase c-font-bold">#' . $rowctsp['ma_sp'] . '</h3>

                                    <span class="c-font-red c-font-bold">Liên quân</span>

                                 </div>

                              </div>

                              

                           </div>

                           <div class="col-sm-12 visible-sm visible-xs visible-sm">

                              <div class="text-center m-t-20">

                                 <img class="img-responsive img-thumbnail" src="/duan/admin/view/upload/' . $rowctsp['hinh'] . '" alt="png-image">

                              </div>



                              

                              <div class="c-product-meta">

                                 <div class="c-content-divider">

                                    <i class="icon-dot"></i>

                                 </div>

                                 <div class="row">

                                    <div class="col-sm-4 col-xs-6 c-product-variant">

                                       <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red">' . $rowctsp['rank'] . '</span></p>

                                    </div>

                                    <div class="col-sm-4 col-xs-6 c-product-variant">

                                       <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Tướng: <span class="c-font-red">' . $rowctsp['tuong'] . '</span></p>

                                    </div>

                                    <div class="col-sm-4 col-xs-6 c-product-variant">

                                       <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang Phục: <span class="c-font-red">' . $rowctsp['trang_phuc'] . '</span></p>

                                    </div>

                                    <div class="col-sm-4 col-xs-6 c-product-variant">

                                       <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Ngọc 90: <span class="c-font-red">' . $retVal . '</span></p>

                                    </div>

                                    

                                    

                                    <div class="col-sm-12 col-xs-12 c-product-variant">

                                       <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowctsp['mo_ta'] . '.</span></p>

                                    </div>

                                 </div>

                              



                                 <div class="c-content-divider">

                                    <i class="icon-dot"></i>

                                 </div>

                              </div>

                           </div>



                           <div class="c-product-meta">

                              <div class="c-product-price c-theme-font" style="float: none;text-align: center">

                                 <div class="position0">

                     ' . number_format($rowctsp['giasp'], 0, ',', '.') . ' VÍ

                                 </div>

                              

                                 </div>

                              </div>

                              <div style="display: none">

                              </div>

                        

                  

                           <div class="col-md-4 text-right">

                           <div class="c-product-header">

                              <div class="c-content-title-1">

                                 <button type="button" class="btn c-btn btn-lg c-theme-btn c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal" rel="/buyacc/518323">Mua ngay</button>

                                

                                 <button type="button" class="btn c-btn btn-lg btn-danger c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal" rel="/hire-purchase/518323">Trả góp</button>

                                 <a type="button" class="btn c-btn btn-lg c-bg-green-4 c-font-white c-font-uppercase c-font-bold c-btn-square m-t-20" href="/recharge">ATM - Ví điện tử</a>

                                 <a class="btn c-btn btn-lg c-bg-green-4 c-font-white c-font-uppercase c-font-bold c-btn-square m-t-20" href="/nap-the">Nạp thẻ cào</a>

                              </div>

                           </div>

                        </div>

                     </div>

                  

                        

                        <div class="c-product-meta visible-md visible-lg">

                           <div class="c-content-divider">

                              <i class="icon-dot"></i>

                              

                           </div>

                           

                           <div class="row">

                           

                              <div class="col-sm-4 col-xs-6 c-product-variant">

                                 <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red">' . $rowctsp['rank'] . '</span></p>

                              </div>

                              <div class="col-sm-4 col-xs-6 c-product-variant">

                                 <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Tướng: <span class="c-font-red">' . $rowctsp['tuong'] . '</span></p>

                              </div>

                              <div class="col-sm-4 col-xs-6 c-product-variant">

                                 <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang Phục: <span class="c-font-red">' . $rowctsp['trang_phuc'] . '</span></p>

                              </div>

                              <div class="col-sm-4 col-xs-6 c-product-variant">

                                 <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Ngọc 90: <span class="c-font-red">' . $retVal . '</span></p>

                              </div>

                           

                           

                              <div class="col-sm-12 col-xs-12 c-product-variant">

                                 <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowctsp['mo_ta'] . '.</span></p>

                              </div>

                           </div>

                           <div class="c-content-divider">

                              <i class="icon-dot"></i>

                           </div>

                           </div>

                        </div>







                        

                        </div>

                        

                     <div class="container m-t-20 content_post">

                    ';



                  show_img($rowctsp['hinh_ct_1']);

                  echo  '</div>';

                  $kt = true;
               } else {



                  echo '<div class="container">

                     <nav aria-label="breadcrumb" style="display:none">

                        <ol class="breadcrumb">

                           <li class="breadcrumb-item"><a href="/" title="Trang chủ">Trang chủ</a></li>

                           <li class="breadcrumb-item"><a href="/garena/lien-quan" title="Liên quân">Liên quân</a></li>

                           <li class="breadcrumb-item active" aria-current="page">' . $rowctsp['ma_sp'] . '</li>

                        </ol>

                     </nav>

                     <div class="c-shop-product-details-4">

                        <div class="row">

                           <div class="col-md-4 m-b-20">

                              <div class="c-product-header">

                              

                                 <div class="c-content-title-1">

                                    <h3 class="c-font-uppercase c-font-bold">#' . $rowctsp['ma_sp'] . '</h3>

                                    <span class="c-font-red c-font-bold">Liên quân</span>

                                 </div>

                              </div>

                              

                           </div>

                           <div class="col-sm-12 visible-sm visible-xs visible-sm">

                              <div class="text-center m-t-20">

                                 <img class="img-responsive img-thumbnail" src="/duan/admin/view/upload/' . $rowctsp['hinh'] . '" alt="png-image">

                              </div>



                              

                              <div class="c-product-meta">

                                 <div class="c-content-divider">

                                    <i class="icon-dot"></i>

                                 </div>

                                 <div class="row">

                                    <div class="col-sm-4 col-xs-6 c-product-variant">

                                       <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red">' . $rowctsp['rank'] . '</span></p>

                                    </div>

                                    <div class="col-sm-4 col-xs-6 c-product-variant">

                                       <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Tướng: <span class="c-font-red">' . $rowctsp['tuong'] . '</span></p>

                                    </div>

                                    <div class="col-sm-4 col-xs-6 c-product-variant">

                                       <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang Phục: <span class="c-font-red">' . $rowctsp['trang_phuc'] . '</span></p>

                                    </div>

                                    <div class="col-sm-4 col-xs-6 c-product-variant">

                                       <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Ngọc 90: <span class="c-font-red">' . $retVal . '</span></p>

                                    </div>

                                    

                                    

                                    <div class="col-sm-12 col-xs-12 c-product-variant">

                                       <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowctsp['mo_ta'] . '.</span></p>

                                    </div>

                                 </div>

                              



                                 <div class="c-content-divider">

                                    <i class="icon-dot"></i>

                                 </div>

                              </div>

                           </div>



                           <div class="c-product-meta">

                              <div class="c-product-price c-theme-font" style="float: none;text-align: center">

                                 <div class="position0">

                     ' . number_format($rowctsp['giasp'], 0, ',', '.') . ' VÍ

                                 </div>

                              

                                 </div>

                              </div>

                              <div style="display: none">

                              </div>

                        

                  

                           <div class="col-md-4 text-right">

                           

                        </div>

                     </div>

                  

                        

                        <div class="c-product-meta visible-md visible-lg">

                           <div class="c-content-divider">

                              <i class="icon-dot"></i>

                              

                           </div>

                           

                           <div class="row">

                           

                              <div class="col-sm-4 col-xs-6 c-product-variant">

                                 <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red">' . $rowctsp['rank'] . '</span></p>

                              </div>

                              <div class="col-sm-4 col-xs-6 c-product-variant">

                                 <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Tướng: <span class="c-font-red">' . $rowctsp['tuong'] . '</span></p>

                              </div>

                              <div class="col-sm-4 col-xs-6 c-product-variant">

                                 <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang Phục: <span class="c-font-red">' . $rowctsp['trang_phuc'] . '</span></p>

                              </div>

                              <div class="col-sm-4 col-xs-6 c-product-variant">

                                 <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Ngọc 90: <span class="c-font-red">' . $retVal . '</span></p>

                              </div>

                           

                           

                              <div class="col-sm-12 col-xs-12 c-product-variant">

                                 <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowctsp['mo_ta'] . '.</span></p>

                              </div>

                           </div>

                           <div class="c-content-divider">

                              <i class="icon-dot"></i>

                           </div>

                           </div>

                        </div>







                        

                        </div>

                        

                     <div class="container m-t-20 content_post">

                     ';



                  show_img($rowctsp['hinh_ct_1']);

                  echo  '</div>';

                  $kt = true;
               }
            }
         }

         $i++;
      }

      $sql = "SELECT * FROM  `sp` where   ma_sp = " . $idacc . "";

      $run = mysqli_query($conn, $sql);

      while ($rowct = mysqli_fetch_assoc($run)) {

         $retVal = ($rowct['ngoc'] == 0) ?  "có" : "không";



         if ($kt == false) {

            if ($rowct['trang_thai_sp'] == 0) {



               echo '<div class="container">

         <nav aria-label="breadcrumb" style="display:none">

            <ol class="breadcrumb">

               <li class="breadcrumb-item"><a href="/" title="Trang chủ">Trang chủ</a></li>

               <li class="breadcrumb-item"><a href="/garena/lien-quan" title="Liên quân">Liên quân</a></li>

               <li class="breadcrumb-item active" aria-current="page">' . $rowct['ma_sp'] . '</li>

            </ol>

         </nav>

         <div class="c-shop-product-details-4">

            <div class="row">

               <div class="col-md-4 m-b-20">

                  <div class="c-product-header">

                  

                     <div class="c-content-title-1">

                        <h3 class="c-font-uppercase c-font-bold">#' . $rowct['ma_sp'] . '</h3>

                        <span class="c-font-red c-font-bold">Liên quân</span>

                     </div>

                  </div>

                  

               </div>

               <div class="col-sm-12 visible-sm visible-xs visible-sm">

                  <div class="text-center m-t-20">

                     <img class="img-responsive img-thumbnail" src="/duan/admin/view/upload/' . $rowct['hinh'] . '" alt="png-image">

                  </div>



                  

                  <div class="c-product-meta">

                     <div class="c-content-divider">

                        <i class="icon-dot"></i>

                     </div>

                     <div class="row">

                        <div class="col-sm-4 col-xs-6 c-product-variant">

                           <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red">' . $rowct['rank'] . '</span></p>

                        </div>

                        <div class="col-sm-4 col-xs-6 c-product-variant">

                           <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Tướng: <span class="c-font-red">' . $rowct['tuong'] . '</span></p>

                        </div>

                        <div class="col-sm-4 col-xs-6 c-product-variant">

                           <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang Phục: <span class="c-font-red">' . $rowct['trang_phuc'] . '</span></p>

                        </div>

                        <div class="col-sm-4 col-xs-6 c-product-variant">

                           <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Ngọc 90: <span class="c-font-red">' . $retVal . '</span></p>

                        </div>

                        

                        

                        <div class="col-sm-12 col-xs-12 c-product-variant">

                           <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red"></span></p>

                        </div>

                     </div>

                  



                     <div class="c-content-divider">

                        <i class="icon-dot"></i>

                     </div>

                  </div>

               </div>



               <div class="c-product-meta">

                  <div class="c-product-price c-theme-font" style="float: none;text-align: center">

                     <div class="position0">



                     </div>

                       ' . number_format(($rowct['giasp']), 0, ',', '.') . ' VÍ

                     </div>

                  </div>

                  <div style="display: none">

                  </div>

             

       

               <div class="col-md-4 text-right">

               <div class="c-product-header">

                  <div class="c-content-title-1">

                     <button type="button" class="btn c-btn btn-lg c-theme-btn c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal" rel="/buyacc/518323">Mua ngay</button>

                   

                     <button type="button" class="btn c-btn btn-lg btn-danger c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal" rel="/hire-purchase/518323">Trả góp</button>

                     <a type="button" class="btn c-btn btn-lg c-bg-green-4 c-font-white c-font-uppercase c-font-bold c-btn-square m-t-20" href="/recharge">ATM - Ví điện tử</a>

                     <a class="btn c-btn btn-lg c-bg-green-4 c-font-white c-font-uppercase c-font-bold c-btn-square m-t-20" href="/nap-the">Nạp thẻ cào</a>

                  </div>

               </div>

            </div>

           </div>

        

            

            <div class="c-product-meta visible-md visible-lg">

               <div class="c-content-divider">

                  <i class="icon-dot"></i>

                  

               </div>

               

               <div class="row">

               

                  <div class="col-sm-4 col-xs-6 c-product-variant">

                     <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red">' . $rowct['rank'] . '</span></p>

                  </div>

                  <div class="col-sm-4 col-xs-6 c-product-variant">

                     <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Tướng: <span class="c-font-red">' . $rowct['tuong'] . '</span></p>

                  </div>

                  <div class="col-sm-4 col-xs-6 c-product-variant">

                     <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang Phục: <span class="c-font-red">' . $rowct['trang_phuc'] . '</span></p>

                  </div>

                  <div class="col-sm-4 col-xs-6 c-product-variant">

                     <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Ngọc 90: <span class="c-font-red">' . $retVal . '</span></p>

                  </div>

                 

                

                  <div class="col-sm-12 col-xs-12 c-product-variant">

                     <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red"></span></p>

                  </div>

               </div>

               <div class="c-content-divider">

                  <i class="icon-dot"></i>

               </div>

               </div>

            </div>

            <div class="container m-t-20 content_post">

         <p>

         <a rel="gallery1" data-fancybox="images" href="/duan/admin/view/upload/' . $rowct['hinh'] . '">

         <img class="img-responsive img-thumbnail" src="/duan/admin/view/upload/' . $rowct['hinh'] . '" alt="png-image">

         </a>

         </p>

         <div class="buy-footer" style="text-align: center">

         <button type="button" class="btn c-btn btn-lg c-theme-btn c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal">Mua ngay</button>

         </div>

      </div>

            ';
            } else {

               echo '<div class="container">

               <nav aria-label="breadcrumb" style="display:none">

                  <ol class="breadcrumb">

                     <li class="breadcrumb-item"><a href="/" title="Trang chủ">Trang chủ</a></li>

                     <li class="breadcrumb-item"><a href="/garena/lien-quan" title="Liên quân">Liên quân</a></li>

                     <li class="breadcrumb-item active" aria-current="page">' . $rowct['ma_sp'] . '</li>

                  </ol>

               </nav>

               <div class="c-shop-product-details-4">

                  <div class="row">

                     <div class="col-md-4 m-b-20">

                        <div class="c-product-header">

                        

                           <div class="c-content-title-1">

                              <h3 class="c-font-uppercase c-font-bold">#' . $rowct['ma_sp'] . '</h3>

                              <span class="c-font-red c-font-bold">Liên quân</span>

                           </div>

                        </div>

                        

                     </div>

                     <div class="col-sm-12 visible-sm visible-xs visible-sm">

                        <div class="text-center m-t-20">

                           <img class="img-responsive img-thumbnail" src="/duan/admin/view/upload/' . $rowct['hinh'] . '" alt="png-image">

                        </div>

      

                        

                        <div class="c-product-meta">

                           <div class="c-content-divider">

                              <i class="icon-dot"></i>

                           </div>

                           <div class="row">

                              <div class="col-sm-4 col-xs-6 c-product-variant">

                                 <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red">' . $rowct['rank'] . '</span></p>

                              </div>

                              <div class="col-sm-4 col-xs-6 c-product-variant">

                                 <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Tướng: <span class="c-font-red">' . $rowct['tuong'] . '</span></p>

                              </div>

                              <div class="col-sm-4 col-xs-6 c-product-variant">

                                 <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang Phục: <span class="c-font-red">' . $rowct['trang_phuc'] . '</span></p>

                              </div>

                              <div class="col-sm-4 col-xs-6 c-product-variant">

                                 <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Ngọc 90: <span class="c-font-red">' . $retVal . '</span></p>

                              </div>

                              

                              

                              <div class="col-sm-12 col-xs-12 c-product-variant">

                                 <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red"></span></p>

                              </div>

                           </div>

                        

      

                           <div class="c-content-divider">

                              <i class="icon-dot"></i>

                           </div>

                        </div>

                     </div>

      

                     <div class="c-product-meta">

                        <div class="c-product-price c-theme-font" style="float: none;text-align: center">

                           <div class="position0">

      

                           </div>

                             ' . number_format(($rowct['giasp']), 0, ',', '.') . ' VÍ

                           </div>

                        </div>

                        <div style="display: none">

                        </div>

                   

             

                   

                  </div>

                 </div>

              

                  

                  <div class="c-product-meta visible-md visible-lg">

                     <div class="c-content-divider">

                        <i class="icon-dot"></i>

                        

                     </div>

                     

                     <div class="row">

                     

                        <div class="col-sm-4 col-xs-6 c-product-variant">

                           <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red">' . $rowct['rank'] . '</span></p>

                        </div>

                        <div class="col-sm-4 col-xs-6 c-product-variant">

                           <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Tướng: <span class="c-font-red">' . $rowct['tuong'] . '</span></p>

                        </div>

                        <div class="col-sm-4 col-xs-6 c-product-variant">

                           <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang Phục: <span class="c-font-red">' . $rowct['trang_phuc'] . '</span></p>

                        </div>

                        <div class="col-sm-4 col-xs-6 c-product-variant">

                           <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Ngọc 90: <span class="c-font-red">' . $retVal . '</span></p>

                        </div>

                       

                      

                        <div class="col-sm-12 col-xs-12 c-product-variant">

                           <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red"></span></p>

                        </div>

                     </div>

                     <div class="c-content-divider">

                        <i class="icon-dot"></i>

                     </div>
                     </div>

                  </div>

                  <div class="container m-t-20 content_post">

               <p>

               <a rel="gallery1" data-fancybox="images" href="/duan/admin/view/upload/' . $rowct['hinh'] . '">

               <img class="img-responsive img-thumbnail" src="/duan/admin/view/upload/' . $rowct['hinh'] . '" alt="png-image">

               </a>

               </p>

             

            </div>

                  ';
            }
         }
      }
   }
}


function comment($today, $noi_dung)
{
   $sql_bl = "INSERT INTO `binhluan`( `ngay_bl`, `noi_dung`, `ma_kh_bl`, `ma_sp`) VALUES (?,?,?,?)";

   pdo_execute($sql_bl, $today, $noi_dung, $_SESSION['ma_user'], $_GET['id']);
}

function showsplienquan()

{

   $conn = po_con();

   $sql = "SELECT * FROM  `sp`  where trang_thai_sp = 0";

   $runsql = mysqli_query($conn, $sql);

   $lien_quan = null;

   if (isset($_GET['id'])) {

      while ($ro = mysqli_fetch_assoc($runsql)) {



         if ($_GET['id'] == $ro['ma_sp'] &&  $lien_quan == null) {

            $lien_quan = $ro['giasp'];
         }
      }

      $sql_s = "SELECT * FROM `sp` where trang_thai_sp = 0";

      $runsq = mysqli_query($conn, $sql_s);

      $i = 0;

      $kt = true;

      while ($row = mysqli_fetch_assoc($runsq)) {

         // echo  $lien_quan;  

         $retVal = ($row['ngoc'] == 0) ?  "có" : "không";

         if ($_GET['id'] != $row['ma_sp']) {



            //   echo ($lien_quan + 20000);

            if ($row['giasp'] <=  ($lien_quan + 20000) && $row['giasp'] >= ($lien_quan - 20000)) {



               echo '  

 

      <div class="col-sm-6 col-md-3">

         <div class="classWithPad">

            <div class="image">

               <a href="/acc/443449">

                  <img src="/duan/admin/view/upload/' . $row['hinh'] . '" alt="png-image">

                  <span class="ms">MS: ' . $row['ma_sp'] . '</span>

               </a>

            </div>

            <div class="description">

            ' . $row['mo_ta'] . '

            </div>

            <div class="attribute_info">

               <div class="row">

                  <div class="col-xs-6 a_att">

                     Rank: <b>' . $row['rank'] . '</b>

                  </div>

                  <div class="col-xs-6 a_att">

                     Tướng: <b>' . $row['tuong'] . '</b>

                  </div>

                  <div class="col-xs-6 a_att">

                     Trang Phục: <b>' . $row['trang_phuc'] . '</b>

                  </div>

                  <div class="col-xs-6 a_att">

                     Ngọc 90: <b>' . $retVal . '</b>

                  </div>

               </div>

            </div>

            <div class="a-more">

               <div class="row">

                  <div class="col-xs-6">

                     <div class="price_item">

                   ' . number_format(($row['giasp'] - ($row['giasp'] * ($row['giam_gia'] * 0.01))), 0, ',', '.') . 'VNĐ

                     </div>

                  </div>

                  <div class="col-xs-6 ">

                     <div class="view">

                        <a href="?act=acc&id=' . $row['ma_sp'] . '">Chi tiết</a>

                     </div>

                  </div>

               </div>

            </div>

         </div>

      </div>

   



            ';

               $kt = false;
            }
         }
      }

      if ($kt == true) {

         $sql_s = "SELECT * FROM  `sp` where trang_thai_sp = 0";

         $runq = mysqli_query($conn, $sql_s);

         while ($row = mysqli_fetch_assoc($runq)) {



            echo '  <div class="col-sm-6 col-md-3">

         <div class="classWithPad">

            <div class="image">

               <a href="">

                  <img src="/duan/admin/view/upload/' . $row['hinh'] . '" alt="png-image">

                  <span class="ms">MS: ' . $row['ma_sp'] . '</span>

               </a>

            </div>

            <div class="description">

            ' . $row['mo_ta'] . '

            </div>

            <div class="attribute_info">

               <div class="row">

                  <div class="col-xs-6 a_att">

                     Rank: <b>' . $row['rank'] . '</b>

                  </div>

                  <div class="col-xs-6 a_att">

                     Tướng: <b>' . $row['tuong'] . '</b>

                  </div>

                  <div class="col-xs-6 a_att">

                     Trang Phục: <b>' . $row['trang_phuc'] . '</b>

                  </div>

                  <div class="col-xs-6 a_att">

                     Ngọc 90: <b>' . $retVal . '</b>

                  </div>

               </div>

            </div>

            <div class="a-more">

               <div class="row">

                  <div class="col-xs-6">

                     <div class="price_item">

                   ' . number_format(($row['giasp'] - ($row['giasp'] * ($row['giam_gia'] * 0.01))), 0, ',', '.') . 'VNĐ

                     </div>

                  </div>

                  <div class="col-xs-6 ">

                     <div class="view">

                        <a href="?act=acc&id=' . $row['ma_sp'] . '">Chi tiết</a>

                     </div>

                  </div>

               </div>

            </div>

         </div>

         </div>';

            $i++;



            if ($i == 8) {

               break;
            }
         }
      }
   }
}

function showbl()
{

   $conn = po_con();

   if (isset($_GET['id'])) {

      $sl_sql = "SELECT * FROM `binhluan` join user WHERE binhluan.ma_kh_bl= user.ma_kh;";

      $runshowbl = mysqli_query($conn, $sl_sql);

      while ($rowbl = mysqli_fetch_assoc($runshowbl)) {

         if ($_GET['id'] == $rowbl['ma_sp']) {



            echo '   <div class="showsl">

         <h3 class="tile_bl">

         <strong> ' . $rowbl['ten_hien_thi'] . '</strong>

         </h3>

         <p>' . $rowbl['noi_dung'] . '</p>

      </div>';
         }
      }
   }
}

function pay()
{

   $game = '';

   $sl_sql = "SELECT * FROM `sp` join loai on sp.ma_loai = loai.ma_loai WHERE ma_sp = " . $_GET['id'] . "";

   $kq = pdo_query($sl_sql);

   foreach ($kq as $row) {

      $retVal = ($row['ngoc'] == 0) ?  "có" : "không";

      if ($row['ma_loai'] == 1) {

         $game = 'Liên quân';
      } else  if ($row['ma_loai'] == 2) {

         $game = 'Liên minh huyền thoại';
      } else  if ($row['ma_loai'] == 3) {

         $game = 'Ngọc rồng online';
      } else {

         $game = 'Free fire';
      }



      echo '`<div class="modal-content"> <form method="POST" action="?act=pay&id=' . $row['ma_sp'] . '&loai=' . $row['ma_loai'] . '&check=true" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" data-hs-cf-bound="true"> <input name="_token" type="hidden" value="FArKiDKUx5qLkQ607AMswlQoIx7lC3kczIIBXb8t"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button> <h4 class="modal-title">Xác nhận mua tài khoản</h4> </div> <div class="modal-body"> <div class="c-content-tab-4 c-opt-3" role="tabpanel"> <ul class="nav nav-justified" role="tablist"> <li role="presentation" class="active"> <a href="#payment" role="tab" data-toggle="tab" class="c-font-16">Thanh toán</a> </li> <li role="presentation"> <a href="#info" role="tab" data-toggle="tab" class="c-font-16">Tài khoản</a> </li> </ul> <div class="tab-content"> <div role="tabpanel" class="tab-pane fade in active" id="payment"> <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5"> <li class="c-font-dark"> <table class="table table-striped"> <tbody> <tr> <th colspan="2">Thông tin tài khoản #' . $row['ma_sp'] . '</th> </tr>

      <div id="gia_sp"><input type="hidden" id="price" name="price_sp" value="' . $row['giasp']  . '"></div> </tbody> <tbody> <tr> <input class="hidden" type="text" id="category" value="' . $row['ma_loai']  . '"> </tr>  <td>Tên game:</td> <th>' . $game   . ' </th>  </tr> <tr> <td>Giá tiền:</td> <th class="text-info" id="total">' . number_format(($row['giasp']), 0, ',', '.')  . 'đ </th> </tr> </tbody> </table> </li> </ul> </div> <div role="tabpanel" class="tab-pane fade" id="info"> <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5"> <li class="c-font-dark"> <table class="table table-striped"> <tbody> <tr> <th colspan="2">Chi tiết tài khoản #' . $row['ma_sp'] . '</th> </tr> <tr> <td style="width:50%">Rank:</td> <td class="text-danger" style="font-weight: 700">' . $row['rank'] . '</td> </tr> <tr> <td style="width: 50%">Tướng:</td> <td class="text-danger" style="font-weight: 700">' . $row['tuong'] . '</td> </tr> <tr> <td style="width: 50%">Trang Phục:</td> <td class="text-danger" style="font-weight: 700">' . $row['trang_phuc'] . '</td> </tr> <tr> <td style="width:50%">Ngọc 90:</td> <td class="text-danger" style="font-weight: 700">' .   $retVal . '</td> </tr> <tr> <td style="width:50%">Nick có tướng trong đá quý:</td> <td class="text-danger" style="font-weight: 700">Có</td> </tr> <tr> <td style="width:50%">Nick có trang phục trong đá quý:</td> <td class="text-danger" style="font-weight: 700">Có</td> </tr> </tbody> </table> </li> </ul> </div> </div> </div> <div class="form-group "> <label class="col-md-3 form-control-label">Mã giảm giá:</label> <div class="col-md-7">  <input type="text" id="coupon_sale" class="form-control c-square c-theme coupon" name="coupon" placeholder="Mã giảm giá" value="">    <button type="button" id="btn_sale"  onclick="check_sale()"> Áp dụng</button>     <span class="help-block" id="block"> Nhập mã giảm giá nếu có để nhận ưu đãi</span> </div> </div> <div class="form-group "> <label class="col-md-12 form-control-label text-danger" style="text-align: center;margin: 10px 0; ">  </label> </div> <div style="clear: both"></div> </div> <div class="modal-footer">  <button type="sumbit" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" name="pay">Mua</button> <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button> </div>  </form> </div>`';
   }
}

function pay_login()
{

   $game = '';

   $sl_sql = "SELECT * FROM `sp` join loai on sp.ma_loai = loai.ma_loai WHERE ma_sp = " . $_GET['id'] . "";

   $kq = pdo_query($sl_sql);

   foreach ($kq as $row) {

      $retVal = ($row['ngoc'] == 0) ?  "có" : "không";

      if ($row['ma_loai'] == 1) {

         $game = 'liên quân';
      } else  if ($row['ma_loai'] == 2) {

         $game = 'liên minh huyền thoại';
      } else  if ($row['ma_loai'] == 3) {

         $game = 'Ngọc rồng online';
      } else {

         $game = 'Free fire';
      }

      echo '`<div class="modal-content"> <form method="POST" action="pay_sp.php?id=' . $row['ma_sp'] . '&check=true" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" data-hs-cf-bound="true"> <input name="_token" type="hidden" value="FArKiDKUx5qLkQ607AMswlQoIx7lC3kczIIBXb8t"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button> <h4 class="modal-title">Xác nhận mua tài khoản</h4> </div> <div class="modal-body"> <div class="c-content-tab-4 c-opt-3" role="tabpanel"> <ul class="nav nav-justified" role="tablist"> <li role="presentation" class="active"> <a href="#payment" role="tab" data-toggle="tab" class="c-font-16">Thanh toán</a> </li> <li role="presentation"> <a href="#info" role="tab" data-toggle="tab" class="c-font-16">Tài khoản</a> </li> </ul> <div class="tab-content"> <div role="tabpanel" class="tab-pane fade in active" id="payment"> <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5"> <li class="c-font-dark"> <table class="table table-striped"> <tbody> <tr> <th colspan="2">Thông tin tài khoản #' . $row['ma_sp'] . '</th> </tr> </tbody> <tbody> <tr>  </tr> <tr> <td>Tên game:</td> <th>' . $game   . '</th> </tr> <tr> <td>Giá tiền:</td> <th class="text-info">' . number_format(($row['giasp']), 0, ',', '.')  . 'đ</th> </tr> </tbody> </table> </li> </ul> </div> <div role="tabpanel" class="tab-pane fade" id="info"> <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5"> <li class="c-font-dark"> <table class="table table-striped"> <tbody> <tr> <th colspan="2">Chi tiết tài khoản #' . $row['ma_sp'] . '</th> </tr> <tr> <td style="width:50%">Rank:</td> <td class="text-danger" style="font-weight: 700">' . $row['rank'] . '</td> </tr> <tr> <td style="width: 50%">Tướng:</td> <td class="text-danger" style="font-weight: 700">' . $row['tuong'] . '</td> </tr> <tr> <td style="width: 50%">Trang Phục:</td> <td class="text-danger" style="font-weight: 700">' . $row['trang_phuc'] . '</td> </tr> <tr> <td style="width:50%">Ngọc 90:</td> <td class="text-danger" style="font-weight: 700">' .   $retVal . '</td> </tr> <tr> <td style="width:50%">Nick có tướng trong đá quý:</td> <td class="text-danger" style="font-weight: 700">Có</td> </tr> <tr> <td style="width:50%">Nick có trang phục trong đá quý:</td> <td class="text-danger" style="font-weight: 700">Có</td> </tr> </tbody> </table> </li> </ul> </div> </div> </div> <div class="form-group ">  <div class="col-md-7">  </div> </div> <div class="form-group "> <label class="col-md-12 form-control-label text-danger" style="text-align: center;margin: 10px 0; ">  </label> </div> <div style="clear: both"></div> </div> <div class="modal-footer">  <a href="?act=dangnhap" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" name="login">Đăng nhập</a> <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button> </div>  </form> </div>`';
   }
}


function show_code_sale()
{

   $conn = po_con();

   $sl_sql = "SELECT * FROM tbl_code_sale ";

   $runshow = mysqli_query($conn, $sl_sql);

   // $code_sale_price = 0;

   echo "[";

   while ($row = mysqli_fetch_assoc($runshow)) {





      echo  " '" . $row['code'] . "', ";
   }

   echo "],";
}
function show_price_sale()
{

   $conn = po_con();

   $sl_sql = "SELECT * FROM tbl_code_sale ";

   $runshow = mysqli_query($conn, $sl_sql);

   // $code_sale_price = 0;

   echo " [";

   while ($row = mysqli_fetch_assoc($runshow)) {





      echo  " '" . $row['price_sale'] . "', ";
   }

   echo "],";
}

function show_category_sale()

{

   $conn = po_con();

   $sl_sql = "SELECT * FROM tbl_code_sale ";

   $runshow = mysqli_query($conn, $sl_sql);

   // $code_sale_price = 0;

   echo " [";

   while ($row = mysqli_fetch_assoc($runshow)) {





      echo  " '" . $row['ma_loai'] . "', ";
   }

   echo "]";
}



?>
<!DOCTYPE html>
<html>

<head>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>

	<h2>change_ user informasion</h2>
	<h3>Start typing a name in the input field below:</h3>

	<p>Suggestions: <span id="txtHint">

			<?php

	// 		foreach ($kq as $item) {
	// 			echo '  <form  method="post" id="form_user"><p>tên hiển thị: <input type="text"     id="name_show"  name="name_show" value="' . $item['ten_hien_thi'] . '"></p>
    // <p>tên: <input type="text"     id="user"  value="' . $item['username'] . '" disabled></p>
    // <p>First phone: <input type="text"  id="phone"  name="phone" value="' . $item['phone'] . '" ></p>
    // <p>First email: <input type="text"   id="email"   name="email" value="' . $item['email'] . '" ></p><p>&nbsp;</p><p><button  type="button"  name="sumbit_change" id="btnSubmit" ">Lưu thay đổi</button></p> ';
	// 		}

			?>

		</span></p>
	</form>


	<script>
		function showHint() {
			const xhttp = new XMLHttpRequest();
			xhttp.onload = function() {

				document.getElementById("form_user").innerHTML =
					data.responseText;
			}
			xhttp.open("POST", "ajax.php");
			xhttp.send();
		}
	</script>




	<script>
		$(document).ready(function() {

			$("#btnSubmit").click(function() {

				var phone = $("#phone").val();
				var email = $("#email").val();
				var name_show = $("#name_show").val();
				var user = $("#user").val();

				// if (firstName == '' || lastName == '' || email == '' || message == '') {
				// 	alert("Please fill all fields.");
				// 	return false;
				// }

				$.ajax({
					type: "POST",
					url: "/duan/model/sumbit.php",
					data: {
						phone: phone,
						name_show: name_show,
						email: email,
						user: user
					},
					cache: false,
					success: function(data) {
						alert(data);
						// var arr = [data];
						$("#txtHint").text("change thành công");
					},
					error: function(xhr, status, error) {
						console.error("loi" + xhr);
					}
				});

			});

		});
	</script>


</body>

</html> -->