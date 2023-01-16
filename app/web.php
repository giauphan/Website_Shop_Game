<?php
use App\Controllers\user\home;
use Core\Route;



Route::GET('/',[home::class, 'index']);
Route::GET('/contact', [home::class, 'index']);
