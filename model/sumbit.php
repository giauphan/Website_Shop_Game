<?php
include 'test.php';

function add_user($username, $user_show, $phone, $email)
{
    $sql = "UPDATE `user` SET`ten_hien_thi`=?,`email`=?,`phone`=? WHERE username = ? ";
    $data = pdo_execute($sql, $user_show, $email, $phone, $username);
    return $data;
}


$data['name_show'] = $_POST['name_show'];
$data['phone'] = $_POST['phone'];
$data['email'] = $_POST['email'];
$data['username'] = $_POST['user'];
echo
add_user($data['username'], $data['name_show'], $data['phone'], $data['email']);
echo json_encode($data);
exit;
header("/model/ajax.php");



