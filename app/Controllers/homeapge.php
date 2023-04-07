<?php

namespace App\Controllers;

use Core\View;

class homeapge extends Controller
{
    public function Homepage()
    {
        if (isset($_SESSION['user'])) {
            $redirectUrl = ($_SESSION['user']['2'] === 'admin') ? '/admin' : '/home';
           header('location:'.$redirectUrl.'');
        } else {
            return View::render('Homepage');
        }
    }
}
