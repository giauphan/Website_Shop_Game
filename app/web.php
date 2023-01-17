<?php
use App\Controllers\user\home;
use App\Controllers\user\login;
use Core\Route;

 


Route::GET('/',[home::class, 'index']);
// /account
Route::GET('/login', [login::class, 'index']);
Route::POST('/login', [login::class, 'index']);

Route::GET('/sigin', [login::class, 'sigin']);

Route::GET('/outlogin', function(){
   session_start();
    session_unset();
    header("location: /");
});
