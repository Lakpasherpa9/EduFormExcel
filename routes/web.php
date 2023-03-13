<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\emailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PaymentController;
use App\Notifications\EmailNotification;
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

Route::get('/', function () {
   // return view('welcome');
 //  echo "Hello Users";
   return view('welcome');
});

Route::view('/about','About');
Route::view('/khalti','khalti');
Route::view('/navbar','navbar');
//Route::view('/email','email');
//Route::view('/excel','excel');
	//excel Routes
	Route::get('/file-import',[ExcelController::class,'importView'])->name('importview');

	Route::post('/import',[ExcelController::class,'import'])->name('import');
		//delete row 
		Route::delete('/import/{id}', [ExcelController::class, 'destroy'])->name('deleteRow');
		//updaterow
		Route::put('/import/{id}', [ExcelController::class,'update'])->name('updateRow');
	//end of ExcelRoutes
//
	// Route::get('/export-users',[UserController::class,'UsersExport'])->name('usersExport');
	// Route::get('/records',[ExcelController::class,'index'])->name('viewrecords');

	Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');

  

//notice posts
Route::get('/post', [AdminPostController::class,'createPost'])->name('adminpost');
Route::post('/post', [AdminPostController::class,'showPost']);
Route::get('/post/{id}', [AdminPostController::class,'viewSinglePost']);
Route::get('/viewpost/{post}',[AdminPostController::class,'singlePost']);
Route::get('/PostDashboard',[AdminPostController::class,'PostDashboard']);


//Mail Route 
      //email related routes only

Route::get('/mail',[emailController::class,'email'])->name('email');

//to send to  all users

Route::get('/emailViewAll', [emailController::class, 'emailViewAll'])->name('emailViewAll');

Route::post('/storeAllUserEmail', [emailController::class, 'storeAllUserEmail'])->name('storeAllUserEmail');

//to send to single user
// single users
Route::get('/storeSingleEmail{id}', [emailController::class, 'emailView'])->name('emailView');

Route::post('/storeSingleEmail{id}', [emailController::class, 'storeSingleEmail'])->name('storeSingleEmail');



//payment routes
Route::get('/payment', [PaymentController::class, 'create'])->name('create');
Route::post('/payments', [PaymentController::class, 'store'])->name('store');
?>

