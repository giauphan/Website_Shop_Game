<?php
//convert
use App\Controllers\admin\homeAdmin;
use App\Controllers\ConversionController;
use App\Controllers\pdftxt;
use App\Controllers\FileController;

// giao dien
use App\Controllers\AccountController;
use App\Controllers\admin\accountAdmin;
// use App\Controllers\admin\homeAdmin;
use App\Controllers\Convert\PdfToWordController;
use App\Controllers\ConvertFilesController;
use App\Controllers\homeapge;
use Core\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//admin
Route::get('/admin', [homeAdmin::class, 'index']);
Route::get('/admin/ql-user', [accountAdmin::class, 'index']);
Route::post('/admin/ql-user', [accountAdmin::class, 'look_up']);
Route::post('/admin/ql-user-change', [accountAdmin::class, 'changeuser']);
Route::get('language/{locate}', function ($locate) {
  if (!in_array($locate, ['en', 'vi'])) {
    abort(404);
  }
  session()->put('locate', $locate);
  return redirect()->back();
});
// account
Route::GET('/login', [AccountController::class, 'Login']);
Route::POST('/login', [AccountController::class, 'postlogin']);

Route::get('/signup', [AccountController::class, 'Signup']);
Route::post('/signup', [AccountController::class, 'PostignUp']);

Route::get('/profile', [AccountController::class, 'Profile']);
Route::POST('/profile', [AccountController::class, 'PostProfile']);
//change pass and forgot pass
Route::get('/changepassword', [AccountController::class, 'ChangePass']);
Route::POST('/changepassword', [AccountController::class, 'PosstChangePass']);

Route::get('/forgotpass', [AccountController::class, 'ForgotPass']);

Route::get('/abouts', [AccountController::class, 'AboutUs']);
Route::get('/contact', [AccountController::class, 'Contact']);
Route::get('/tool', [AccountController::class, 'Tool']);

Route::get('/', [homeapge::class, 'Homepage']);
Route::get('/home', [ConvertFilesController::class, 'Convert']);
Route::get('/policy', [AccountController::class, 'policy']);
Route::get('/term', [AccountController::class, 'term']);
Route::get('/logout', function () {
  session_start();
  session_unset();
  header("location: /");
});

// convert file
// Route::get('/test/pdf-to-json', [pdftxt::class, 'index']);
// Route::get('/test', [pdftxt::class, 'convertfilepdfencode']);
// Route::get('/testform', function () {
//   return view('formtest');
// });
// Route::post('/testform', [pdftxt::class, 'convertPdfToText']);
// // Route::get('/pdf-to-txt', [ConversionController::class, 'index']);

// Route::post('/convert', [ConversionController::class, 'pdfToTxt']);
// Route::get('/pdf-to-json', [App\Controllers\FileController::class,'index']);
// Route::post('/pdf-to-json', [App\Controllers\FileController::class,'pdfToJson']);

// //convert pdf to txt
// Route::post('/api/pdf-to-txt', [pdftxt::class, 'convertToTxt']);
// Route::get('/api/pdf-to-txt', [pdftxt::class, 'index']);
// //convert txt to json
// Route::post('/api/txt-to-json', [pdftxt::class, 'convertToJson']);
// Route::get('/api/txt-to-json', [pdftxt::class, 'index']);
// //covert file pdf to json
// Route::post('/api/pdf-to-jsont', [pdftxt::class, 'convertToJsontest']);
// //covert file word to pdf
// Route::get('/api/word-to-pdf', [PdfToWordController::class, 'index']);
// Route::post('/api/word-to-pdf', [PdfToWordController::class, 'convertToPdf']);

