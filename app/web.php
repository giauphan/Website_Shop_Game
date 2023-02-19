<?php

use App\Controllers\exportController;
//admin
use App\Controllers\admin\addproductControlleradmin;
use App\Controllers\admin\homeadminControlleradmin;
use App\Controllers\admin\changeproductadmin;
use App\Controllers\admin\history_rechargeController;
use App\Controllers\admin\qlbillControlleradmin;
use App\Controllers\admin\qlCategoryController;
use App\Controllers\admin\qlcodesaleControlleradmin;
use App\Controllers\admin\qluserController;
//ctv
use App\Controllers\ctv\addproductController;
use App\Controllers\ctv\adminController;
use App\Controllers\ctv\changeproduct;
use App\Controllers\ctv\ql_billController;
use App\Controllers\ctv\ql_code_saleController;


//user

use App\Controllers\user\home;
use App\Controllers\user\login;
use App\Controllers\user\muahang_controller;
use App\Controllers\user\napthe_controller;
use App\Controllers\user\profile_controller;
use App\Controllers\user\quenmk_controller;
use App\Controllers\user\sanpham_controller;
use Core\Route;



Route::GET('/', [home::class, 'index']);
Route::GET('/home', [home::class, 'index']);
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
Route::POST('/napthe', [napthe_controller::class, 'index']);

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
Route::POST('/sanpham', [sanpham_controller::class, 'index']);

// /spchitiet
Route::GET('/pay/sp', [sanpham_controller::class, 'chitietsanpham']);

Route::POST('/pay/sp', [sanpham_controller::class, 'chitietsanpham']);

// // /donhang
//  Route::GET('/pay/sp', [muahang_controller::class, 'donhang']);
//  Route::POST('/pay/sp', [muahang_controller::class, 'donhang']);



// ctv
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

Route::GEt('/export', [exportController::class, 'index']);



//admin
Route::GET('/wp-admin', [homeadminControlleradmin::class, 'index']);

Route::POST('/wp-admin', [homeadminControlleradmin::class, 'index']);

// ql user 
Route::GET('/wp-admin/ql-user', [qluserController::class, 'index']);


// category 
Route::GET('/wp-admin/ql-category', [qlCategoryController::class, 'index']);
// add category 
Route::GET('/wp-admin/add-category', [qlCategoryController::class, 'addCategory']);
Route::POST('/wp-admin/add-category', [qlCategoryController::class, 'addCategory']);

// change category 
Route::GET('/wp-admin/change-category', [qlCategoryController::class, 'changeCategory']);
Route::POST('/wp-admin/change-category', [qlCategoryController::class, 'changeCategory']);

//add sp
Route::GET('/wp-admin/add-product', [addproductControlleradmin::class, 'index']);
Route::POST('/wp-admin/add-product', [addproductControlleradmin::class, 'index']);

// change product 
Route::GET('/wp-admin/change-product', [changeproductadmin::class, 'index']);
Route::POST('/wp-admin/change-product', [changeproductadmin::class, 'index']);

// ql bill
Route::GET('/wp-admin/ql-bill', [qlbillControlleradmin::class, 'index']);
// ql code sale
Route::GET('/wp-admin/ql-code-sale', [qlcodesaleControlleradmin::class, 'index']);
//add sale
Route::GET('/wp-admin/add-code-sale', [qlcodesaleControlleradmin::class, 'add_code_sale']);
Route::POST('/wp-admin/add-code-sale', [qlcodesaleControlleradmin::class, 'add_code_sale']);

//change sale
Route::GET('/wp-admin/change-code-sale', [qlcodesaleControlleradmin::class, 'changeCodesale']);
Route::POST('/wp-admin/change-code-sale', [qlcodesaleControlleradmin::class, 'changeCodesale']);

// ql card 
Route::GET('/wp-admin/ql-historyrecharge', [history_rechargeController::class, 'index']);
