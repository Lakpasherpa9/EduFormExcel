<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\emailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminPostController;
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


// Route::get('/test-mail',function(){

//     $message = "Testing mail";

//     \Mail::raw('Hi, welcome!', function ($message) {
//       $message->to('Sachinshrestha@kcc.edu.np')
//         ->subject('Testing mail');
//     });

//     dd('sent');

// });

//Ends here
	//excel Routes
	Route::get('/file-import',[\App\Http\Controllers\ExcelController::class,'importView'])->name('importview');

	Route::post('/import',[\App\Http\Controllers\ExcelController::class,'import'])->name('import');

  // Route::get('/delete/{id}',[\App\Http\Controllers\ExcelController::class,'delete'])->name('deleteRow');
//
	// Route::get('/export-users',[UserController::class,'UsersExport'])->name('usersExport');
	// Route::get('/records',[ExcelController::class,'index'])->name('viewrecords');

	Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');

  

//notice posts
Route::get('/post', [AdminPostController::class,'createPost'])->name('adminpost');
Route::post('/post', [AdminPostController::class,'showPost']);
Route::get('/post/{id}', [AdminPostController::class,'viewSinglePost']);
Route::get('/viewsinglepost/{post}',[AdminPostController::class,'singlePost']);

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

?>

