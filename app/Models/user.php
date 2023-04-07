<?php

namespace App\Models;

use App\Models\database;

class User extends database
{



    public function login($user, $pass)
    {
        $run = 'SELECT UserID, `FistName`, `LastName`, `userName`, `passWord`, `role` FROM `user` WHERE  userName = ? and passWord = ?';
        return $this->pdo_query($run, $user, $pass);
    }
    public function getoneuser($id)
    {
        return $this->pdo_query('SELECT UserID, `FistName`, `LastName`, `userName`,email, `passWord`, `role` FROM `user` WHERE  UserID = ? ', $id);
    }
    public function getalluser()
    {
        return $this->pdo_query('SELECT UserID, `FistName`, `LastName`, `userName`,email, `passWord`, `role` FROM `user` ');
    }

    public function inpuser(
        $FistName,
        $LastName,
        $email,
        $userName,
        $passWord
    ) {
        $sql = 'INSERT INTO `user`(`FistName`, `LastName`, `email`, `userName`, `passWord`, `role`) VALUES (?,?,?,?,?,?)';
        return $this->pdo_execute(
            $sql,
            $FistName,
            $LastName,
            $email,
            $userName,
            $passWord,
            'thành viên'
        );
    }

    public function updateUser(
        $FistName,
        $LastName,
        $mail,
        $id
    ) {
        $sql = 'UPDATE `user` SET`FistName`=?,`LastName`=?,`email`=? WHERE  UserID =?';
        return $this->pdo_execute(
            $sql,
            $FistName,
            $LastName,
            $mail,
            $id
        );
    }

    public function updateUserAdmin(
        $FistName,
        $LastName,
        $mail,
        $role,
        $id
    ) {
        $sql = 'UPDATE `user` SET`FistName`=?,`LastName`=?,`email`=?,`role` = ? WHERE  UserID =?';
        return $this->pdo_execute(
            $sql,
            $FistName,
            $LastName,
            $mail,
            $role,
            $id
        );
    }

    public function chanpass(
        $newpass,
        $id
    ) {
        $sql = 'UPDATE `user` SET`passWord`=? WHERE  UserID =?';
        return $this->pdo_execute(
            $sql,
            $newpass,
            $id
        );
    }
    public function delteUser( $id) {
        $sql = 'DELETE FROM `user` WHERE  UserID =?';
        $this->pdo_execute(
            $sql,
            $id
        );
    }
}
