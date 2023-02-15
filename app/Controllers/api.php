<?php

namespace App\Controllers\user;

use App\Controllers\Controller;
use Core\View;


class sanpham_controller extends Controller
{

    public function index(){
        if (isset($_POST['submit'])) {
         $img = $_POST['img'];
         
        }
        return view::render('formapi');
    }
}
