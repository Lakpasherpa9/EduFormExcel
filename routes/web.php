<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\emailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PaymentController;
// use App\Http\Controllers\Auth\LoginController;
use App\Notifications\EmailNotification;
use App\Http\Controllers\studentController;
use App\Http\Controllers\ChangePasswordController;

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


// Route::get('/dashboard',[\App\Http\Controllers\Auth\LoginController::class,'login']);
Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/adminhome', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('isAdmin');
Route::get('/', function () {
   // return view('welcome');
 //  echo "Hello Users";
   return view('welcome');	
});
Route::get('/dashboard', function () {
	// return view('welcome');
  //  echo "Hello Users";
	return view('welcome');	
 });

Route::get('/users',function(){
	return view('home')->name('home');
});
// Route::view('/about','About');
// Route::view('/khalti','khalti');
Route::view('/navbar','navbar');
Route::get('/about/students',function(){return view('about');})->name('abouts');

// Route::get('/khalti',function(){return view('about');})->name('khalti');

// Route::get('/home', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('home');

//Route::view('/email','email');
//Route::view('/excel','excel');

//Middleware defined
Route::prefix('admin')->middleware('auth','isAdmin')->group(function() {


Route::get('/about',function(){return view('about');})->name('about');
Route::get('/navbar',function(){return view('about');})->name('navbar');

	//notice posts
Route::get('/post', [AdminPostController::class,'createPost'])->name('adminpost');
Route::post('/showpost', [AdminPostController::class,'showPost'])->name('showpost');
Route::delete('posts/{id}', [AdminPostController::class,'destroy'])->name('posts.destroy');
Route::get('/PostDashboard',[AdminPostController::class,'PostDashboard'])->name('postdashboard');

 //searching in admin home route
 Route::get('/students', [StudentController::class, 'viewStudents'])->name('viewstudents');

 
 Route::get('/search', [ExcelController::class,'search'])->name('search');
//excel Routes
Route::get('/file-import',[ExcelController::class,'importView'])->name('importview');

Route::post('/import',[ExcelController::class,'import'])->name('import');
	//delete row 
	Route::delete('/import/{id}', [ExcelController::class, 'destroy'])->name('deleteRow');
	//updaterow
	Route::put('/import/{id}', [ExcelController::class,'update'])->name('updateRow');
//end of ExcelRoutes

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


	  //Admin password REset
Route::get('/channepassword',[ChangePasswordController::class,'showPasswordForm'])->name('admin.update.password');	

});


	// Route::get('/export-users',[UserController::class,'UsersExport'])->name('usersExport');
	// Route::get('/records',[ExcelController::class,'index'])->name('viewrecords');

	// Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');

  



//users side posts
Route::get('/post/{id}', [AdminPostController::class,'viewSinglePost'])->name('singlepost');
Route::get('/viewpost/{post}',[AdminPostController::class,'singlePost'])->name('viewpost');
Route::get('/viewposts',[AdminPostController::class,'index'])->name('posts.index');






//payment routes
Route::get('/payment', [PaymentController::class, 'create'])->name('create');
Route::post('/payments', [PaymentController::class, 'store'])->name('store');



