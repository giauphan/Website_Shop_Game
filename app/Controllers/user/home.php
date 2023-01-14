<?php

namespace App\Controllers\user;

use App\Controllers\Controller;
use Core\View;
class home extends Controller
{
    public function index()
    {
        return View::render('home');
    }
}
