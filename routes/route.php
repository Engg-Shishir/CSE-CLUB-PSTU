<?php
use App\Controllers\AdminController;
use App\Controllers\IndexController;
use App\Controllers\JoinusController;
use App\Controllers\LoginController;
use App\Controllers\MailController;
use App\master\Router;

Router::get('/', function() {
  $compact=[
    "author"=>"Shishir Bhuiyan",
    "email"=>"shishir.cse.pstu@gmail.com"
  ];
  return view("pages/Home/Index.php",compact("compact"));
});




Router::group(['middleware' => \App\Middlewares\Guest::class], function () {
  Router::get('login',[LoginController::class,"login"]);
  Router::get('joinus',[JoinusController::class,"joinus"]);
  Router::post('joinus',[JoinusController::class,"registration"]);
});
Router::group(['middleware' => \App\Middlewares\Auth::class], function () {
  Router::post('dashboard',[LoginController::class,"dashboard"]);
});

Router::get('logout',[LoginController::class,"logout"]);

Router::get('mailverify/{sender}/{token}',[MailController::class,"emailVerification"],['defaultParameterRegex' => '[\w\-\@\#\.]+']);



Router::group(['middleware' => \App\Middlewares\Admin::class], function () {
  Router::get('admin',[AdminController::class,"index"]);
});

