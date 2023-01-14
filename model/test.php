<?php

function po_con()

{





  $conn = new mysqli("localhost", "root", "", "web_mysqli");

  mysqli_set_charset($conn, 'UTF8');

  // Check connection

  if ($conn->connect_errno) {

    echo "Failed to connect to MySQL: " . $conn->connect_error;

    exit();

  } else {

    echo "";

  }

  return $conn;

}

function thongbao_data($thongbao)

{

  return '<script>

 swal("' . $thongbao . '");

 </script>';

}



function danhmuc()

{

  $sql = 'SELECT * FROM `loai`';

  return pdo_query($sql);

}



function get_money()

{

  if (isset($_SESSION['ma_user'])) {

    $conn = po_con();

    $showtien = 'SELECT tien,email FROM `user` WHERE ma_kh = "' . $_SESSION['ma_user'] . '" ';

    $runshowtien = mysqli_query($conn, $showtien);

    $tien = 0;

    while ($rowtien = mysqli_fetch_assoc($runshowtien)) {

      $tien = $rowtien['tien'];

    }

    return $tien;

  }

}



function get_search($ma_sp, $price_min,$trang_thai, $price_max, $rank_seach, $ngoc_seach)

{

  header("Location:?act=nick&danhmuc=" . $_GET['danhmuc'] . "&game_id=" . $ma_sp . "&trang_thai=".$trang_thai."&moneymin=" . $price_min . "&moneymax=" . $price_max . "&Field01=" . $rank_seach . "&Field02=" . $ngoc_seach . "");

}



/**

 * Mở kết nối đến CSDL sử dụng PDO

 */

function pdo_get_connection(){

    $dburl = "mysql:host=localhost;dbname=xshop;charset=utf8";

    $username = 'root';

    $password = '';



    $conn = new PDO($dburl, $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;



}

/**

 * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)

 * @param string $sql câu lệnh sql

 * @param array $args mảng giá trị cung cấp cho các tham số của $sql

 * @throws PDOException lỗi thực thi câu lệnh

 */



function pdo_execute($sql){

    $sql_args = array_slice(func_get_args(), 1);

    try{

        $conn = pdo_get_connection();

        $stmt = $conn->prepare($sql);

        $stmt->execute($sql_args);

    }

    catch(PDOException $e){

        throw $e;

    }

    finally{

        unset($conn);

    }

}

function pdo_execute_return_lastinsert($sql){

    $sql_args = array_slice(func_get_args(), 1);

    try{

        $conn = pdo_get_connection();

        $stmt = $conn->prepare($sql);

        $stmt->execute($sql_args);

        return $conn->lastInsertId();

    }

    catch(PDOException $e){

        throw $e;

    }

    finally{

        unset($conn);

    }

}

/**

 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)

 * @param string $sql câu lệnh sql

 * @param array $args mảng giá trị cung cấp cho các tham số của $sql

 * @return array mảng các bản ghi

 * @throws PDOException lỗi thực thi câu lệnh

 */

function pdo_query($sql){

    $sql_args = array_slice(func_get_args(), 1);

    try{

        $conn = pdo_get_connection();

        $stmt = $conn->prepare($sql);

        $stmt->execute($sql_args);

        $rows = $stmt->fetchAll();

        return $rows;

    }

    catch(PDOException $e){

        throw $e;

    }

    finally{

        unset($conn);

    }

}

/**

 * Thực thi câu lệnh sql truy vấn một bản ghi

 * @param string $sql câu lệnh sql

 * @param array $args mảng giá trị cung cấp cho các tham số của $sql

 * @return array mảng chứa bản ghi

 * @throws PDOException lỗi thực thi câu lệnh

 */

function pdo_query_one($sql){

    $sql_args = array_slice(func_get_args(), 1);

    try{

        $conn = pdo_get_connection();

        $stmt = $conn->prepare($sql);

        $stmt->execute($sql_args);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;

    }

    catch(PDOException $e){

        throw $e;

    }

    finally{

        unset($conn);

    }

}



/**

 * Thực thi câu lệnh sql truy vấn một giá trị

 * @param string $sql câu lệnh sql

 * @param array $args mảng giá trị cung cấp cho các tham số của $sql

 * @return giá trị

 * @throws PDOException lỗi thực thi câu lệnh

 */

function pdo_query_value($sql){

    $sql_args = array_slice(func_get_args(), 1);

    try{

        $conn = pdo_get_connection();

        $stmt = $conn->prepare($sql);

        $stmt->execute($sql_args);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return array_values($row)[0];

    }

    catch(PDOException $e){

        throw $e;

    }

    finally{

        unset($conn);

    }

}