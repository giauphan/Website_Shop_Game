<?php

namespace App\Controllers\admin;

use App\Controllers\Controller;
use App\Models\User;
use Core\View;

class accountAdmin extends Controller
{
    public function index()
    {
        $user = new User();
        $userdata = $user->getalluser();
        return View::render('admin/ql_user', ['user' => $userdata]);
    }
    public function look_up()
    {
        if (isset($_POST['Delete'])) {

            $user = new User();
            $id = $_POST['id'];
            $user->delteUser($id);  
            header('location:/admin/ql-user?check=true');
        }
    }
    public function changeuser()
    {
        if (isset($_POST['changeuser'])) {

            $user = new User();
            $id = $_POST['id'];
            $role = $_POST['role'];
            $mail = $_POST['email'];
            $LastName = $_POST['LastName'];
            $FistName = $_POST['FistName'];
          $user->updateUserAdmin(
            $FistName,
            $LastName,
            $mail,
            $role,
            $id
          );

            header('location:/admin/ql-user?check=true');
        }else{
            header('location:/admin/ql-user?check=false');
        }
    }
}
