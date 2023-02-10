<?php
//admin

use App\Controllers\ctv\addproductController;
use App\Controllers\ctv\adminController;
use App\Controllers\ctv\changeproduct;
use App\Controllers\ctv\ql_billController;
use App\Controllers\ctv\ql_code_saleController;
//user

use App\Controllers\user\home;
use App\Controllers\user\login;
use App\Controllers\user\napthe_controller;
use App\Controllers\user\profile_controller;
use App\Controllers\user\quenmk_controller;
use App\Controllers\user\muahang_controller;
use App\Controllers\user\sanpham_controller;

use Core\Route;



Route::GET('/', [home::class, 'index']);
// /account
Route::GET('/login', [login::class, 'index']);
Route::POST('/login', [login::class, 'index']);

Route::GET('/dangky', [login::class, 'sigin']);
Route::GET('/outlogin', function () {
    session_start();
    session_unset();
    header("location: /");
});
// /napthe
Route::GET('/napthe', [napthe_controller::class, 'index']);

// /muathe
Route::GET('/muathe', [napthe_controller::class, 'muathe']);

// /quenmk
Route::GET('/quenmk', [quenmk_controller::class, 'index']);

// /doimk
Route::GET('/doimk', [profile_controller::class, 'doimk']);
Route::POST('/doimk', [profile_controller::class, 'doimk']);

// /quenmk
Route::GET('/quenmk', [profile_controller::class, 'quenmk']);

// /profile
Route::GET('/profile', [profile_controller::class, 'index']);

// /edit_profile
Route::GET('/edit_profile', [profile_controller::class, 'edit']);
Route::POST('/edit_profile', [profile_controller::class, 'edit']);

// /lichsunap
Route::GET('/lichsunap', [napthe_controller::class, 'lichsunap']);
Route::POST('/lichsunap', [napthe_controller::class, 'lichsunap']);

// /lichsumuahang
Route::GET('/lichsumua', [muahang_controller::class, 'lichsumua']);

// /show sp
Route::GET('/sanpham', [sanpham_controller::class, 'index']);


// admin
Route::GET('/ql-san-pham', [adminController::class, 'index']);

Route::POST('/ql-san-pham', [adminController::class, 'index']);

//add sp
Route::GET('/add-product', [addproductController::class, 'index']);
Route::POST('/add-product', [addproductController::class, 'index']);

// change product 
Route::GET('/change-product', [changeproduct::class, 'index']);
Route::POST('/change-product', [changeproduct::class, 'index']);

// ql bill
Route::GET('/ql-bill', [ql_billController::class, 'index']);
// ql code salq
Route::GET('/ql-code-sale', [ql_code_saleController::class, 'index']);

Route::GET('/add-code-sale', [ql_code_saleController::class, 'add_code_sale']);
Route::POST('/add-code-sale', [ql_code_saleController::class, 'add_code_sale']);

// Route::GEt('/export', [ql_code_saleController::class, 'add_code_sale']);
