<?php

use App\Controllers\user\doimk_controller;
use App\Controllers\user\home;
use App\Controllers\user\login;
use App\Controllers\user\napthe_controller;
use App\Controllers\user\profile_controller;
use App\Controllers\user\quenmk_controller;
use Core\Route;



Route::GET('/',[home::class, 'index']);
// /account
Route::GET('/login', [login::class, 'index']);
Route::POST('/login', [login::class, 'index']);

Route::GET('/dangky', [login::class, 'sigin']);

// /napthe
Route::GET('/napthe', [napthe_controller::class, 'index']);

// /quenmk
Route::GET('/quenmk', [quenmk_controller::class, 'index']);

// /doimk
Route::GET('/doimk', [doimk_controller::class, 'index']);

// /profile
Route::GET('/profile', [profile_controller::class, 'index']);


// admin
Route::GET('/wp-admin', [adminController::class, 'index']);

Route::POST('/wp-admin', [adminController::class, 'index']);

//add sp
Route::GET('/wp-admin/add-product', [addproductController::class, 'index']);
Route::POST('/wp-admin/add-product', [addproductController::class, 'index']);

// change product 
Route::GET('/wp-admin/change-product', [addproductController::class, 'index']);
Route::POST('/wp-admin/change-product', [addproductController::class, 'index']);