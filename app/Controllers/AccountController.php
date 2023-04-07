<?php

namespace App\Controllers;

use App\Models\User;
use Core\View;

class AccountController extends Controller
{

    public function Login()
    {
        if (isset($_SESSION['user'])) {
            $redirectUrl = ($_SESSION['user']['2'] === 'admin') ? '/admin' : '/home';
            header('location:' . $redirectUrl . '');
        } else {

            return View::render('login');
        }
    }

    public function postlogin()
    {
        $user = new User();
        if (isset($_POST['submit'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $checkUser = $user->login($username, $password);

            foreach ($checkUser as $row) {
                extract($row);
                if ($userName === $userName && $password === $password) {
                    $_SESSION['user']['0'] = $UserID;
                    $_SESSION['user']['1'] = $FistName . " " . $LastName;
                    $_SESSION['user']['2'] = $role;
                    $redirectUrl = ($role === 'admin') ? '/admin' : '/';
                    header('location:' . $redirectUrl . '');
                } else {
                    header('location:/login');
                }
            }
        }
        header('location:/login');
    }


    public function SignUp()
    {
        return view::render('signup');
    }
    public function PostignUp()
    {
        $user = new User();
        if (isset($_POST['sigin'])) {

            $userName = $_POST['username'];
            $passWord = $_POST['password'];
            $FistName = $_POST['fistname'];
            $LastName = $_POST['lastname'];
            $email = $_POST['mail'];
            $user->inpuser(
                $FistName,
                $LastName,
                $email,
                $userName,
                $passWord
            );

            $checkUser = $user->login($userName, $passWord);
            foreach ($checkUser as $row) {
                extract($row);
                if ($userName == $userName && $password == $password) {
                    $_SESSION['user']['0'] = $UserID;
                    $_SESSION['user']['1'] = $FistName . " " . $LastName;
                    $_SESSION['user']['2'] = $role;
                    $redirectUrl = ($role === 'admin') ? '/admin' : '/';
                    header('location:' . $redirectUrl . '');
                }
                // else {
                //     header('location:/signup');
                // }
            }
        }
    }
    public function Profile()
    {
        $user = new User();
        if (isset($_SESSION['user'])) {
            $userdata = $user->getoneuser($_SESSION['user']['0']);
            return view::render('profile', ['user' => $userdata]);
        } else {
            header('location:/login');
        }
    }

    public function PostProfile()
    {
        $user = new User();
        try {
            if (isset($_POST['changeUser'])) {

                $FistName = $_POST['fistname'];
                $LastName = $_POST['lastname'];
                $mail = $_POST['mail'];
                $id = $_SESSION['user'][0];
                $user->updateUser(
                    $FistName,
                    $LastName,
                    $mail,
                    $id
                );
                header('location:/profile?check=true');
            }
        } catch (\Throwable $th) {
            header('location:/profile?check=false');
        }
    }
    public function ChangePass()
    {
        return view::render('change_pass');
    }

    public function PosstChangePass()
    {
        $user = new User();

            if (isset($_POST['changepass']) && isset( $_SESSION['user'])) {

                $newpass = $_POST['newpass'];
                $oldpass = $_POST['oldpass'];
                $confpass = $_POST['confpass'];
                $id = $_SESSION['user'][0];
                $checkUser = $user->getoneuser($id);
                foreach ($checkUser as $row) {
                    extract($row);
                    if ($passWord == $oldpass && $newpass == $confpass) {
                        $user->chanpass(
                            $newpass,
                            $id
                        );
                        header('location:/logout');
                    }
                    else {
                        header('location:/changepassword?check=false');
                    }
                }
               
              
            }
    
    }
    public function ForgotPass()
    {
        return view::render('forgot_pass');
    }
    public function AboutUs()
    {
        return view::render('about_us');
    }
    public function Contact()
    {
        return view::render('contact_us');
    }
    public function Tool()
    {
        return view::render('tool');
    }
    public function policy()
    {
        return view::render('policy');
    }
    public function term()
    {
        return view::render('term');
    }
}
