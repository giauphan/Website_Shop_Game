<?php
use App\Controllers\user\home;
use Core\Route;



Route::GET('/',function(){
    echo 'hoem';
});
Route::GET('/contact', [home::class, 'index']);
