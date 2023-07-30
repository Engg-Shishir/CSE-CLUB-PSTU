<?php
use App\Controllers\AdminController;
use App\Controllers\AdminUser;
use App\Controllers\IndexController;
use App\Controllers\JoinusController;
use App\Controllers\LoginController;
use App\Controllers\MailController;
use App\Controllers\UserController;
use App\master\Router;

Router::get('/', function() {
  $compact=[
    "author"=>"Shishir Bhuiyan",
    "email"=>"shishir.cse.pstu@gmail.com"
  ];
  return view("pages/Home/Index.php",compact("compact"));
});



/**
 * 
 * Only those user can access this route whose are not loged in yet
 */
Router::group(['middleware' => \App\Middlewares\Guest::class], function () {
  Router::get('login',[LoginController::class,"login"]);
  Router::get('joinus',[JoinusController::class,"joinus"]);
  Router::post('joinus',[JoinusController::class,"registration"]);
});




/**
 * user LoginAuth. This middleware apply token verification, usally for Cross site protection
 */
Router::group(['middleware' => \App\Middlewares\LoginAuth::class], function () {
  Router::post('dashboard',[LoginController::class,"dashboard"]);
});


// This url only can access when any user logedin but his profile information
// is not compleated yet. Without loged in no one can access this route.because a session protection added here. This session only set when user loged in.
Router::get('userdetails',[UserController::class,"userdetails"]);

/**
 * User Logout syatem
 */
Router::get('logout',[LoginController::class,"logout"]);

/**
 * 
 * This user email verificatrion route. This route update two field in users table. (token,is_verified)
 */
Router::get('mailverify/{sender}/{token}',[MailController::class,"emailVerification"],['defaultParameterRegex' => '[\w\-\@\#\.]+']);


/**
 * Only authenticated admin user can access this route
 */
Router::group(['middleware' => \App\Middlewares\Admin::class], function () {
  Router::get('admin',[AdminController::class,"index"]);
  Router::get('admin/users/manage',[AdminUser::class,"manage"]);
  Router::post('admin/user/status',[AdminUser::class,"status"]);
  Router::post('admin/user/role',[AdminUser::class,"role"]);
  Router::get('admin/partners',[AdminUser::class,"partners"]);
});

