<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\controller\ExcelController;
use App\Http\controller\LoginController;
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
Route::view('/email','email');
//Route::view('/excel','excel');


	
	Route::get('/file-import',[UsersController::class,'importView'])->name('importview');

	Route::post('/import',[UsersController::class,'import'])->name('import');

	// Route::get('/export-users',[UserController::class,'UsersExport'])->name('usersExport');
	// Route::get('/records',[ExcelController::class,'index'])->name('viewrecords');

	Route::get('/login', [LoginController::class, 'login'])->name('login');
?>

