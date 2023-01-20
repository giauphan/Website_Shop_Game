<?php




if (isset($_SESSION['ma_user'])) {
    $showtien = 'SELECT tien,email FROM `user` WHERE ma_kh = "' . $_SESSION['ma_user'] . '" ';
    $runshowtien = pdo_query( $showtien);
    $email;
foreach (   $runshowtien as $rowtien) {
        $_SESSION['tien'] = $rowtien['tien'];
        $email = $rowtien['email'];
    }


    if (isset($_POST['change_pass'])) {

        $ma_user = $_SESSION['ma_user'];
        $passold = $_POST['passold'];
        $passnew = $_POST['passnew'];
        $passnewre = $_POST['passnewRe'];
        $sql_restpass = "SELECT * FROM  user";
        $restpass = pdo_query( $sql_restpass);
        $kt_rsp = false;
        foreach ($restpass as $row ) {


            if ($passnewre == $passnew  && $row['password'] == $passold) {
                $sql = "UPDATE user SET password='" . $passnew . "' WHERE ma_kh='" . $ma_user . "'";
                mysqli_query($conn, $sql);

                $kt_rsp = true;
            }
        }
        if ($kt_rsp == true) {
        header("location:/duan/?act=profile&change=1");
        }
        else {
            header("location:/duan/?act=change_pass&change=0");
        }

    }
}

?>