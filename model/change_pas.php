<?php




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

?>