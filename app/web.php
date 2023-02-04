<?php

use App\Controllers\admin\adminController;
use App\Controllers\admin\addproductController;

use App\Controllers\user\home;
use App\Controllers\user\login;
use Core\Route;

Route::GET('/', [home::class, 'index']);
// /account
Route::GET('/login', [login::class, 'index']);
Route::POST('/login', [login::class, 'index']);

Route::GET('/sigin', [login::class, 'sigin']);
  

Route::GET('/outlogin', function () {
    session_start();
    session_unset();
    header("location: /");
});
//product


// admin
Route::GET('/wp-admin', [adminController::class, 'index']);

Route::POST('/wp-admin', [adminController::class, 'index']);

//add sp
Route::GET('/wp-admin/add-product', [addproductController::class, 'index']);
Route::POST('/wp-admin/add-product', [addproductController::class, 'index']);

// change product 
Route::GET('/wp-admin/change-product', [addproductController::class, 'index']);
Route::POST('/wp-admin/change-product', [addproductController::class, 'index']);