<?php

namespace App\Controllers\admin;

use App\Controllers\Controller;
use Core\View;

class homeAdmin extends Controller
{
    public function index(){
        return View::render('admin/home');
    }
}
