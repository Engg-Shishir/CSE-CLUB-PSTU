<?php
use App\Controllers\IndexController;
use App\Controllers\LoginController;
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
});



Router::group(['middleware' => \App\Middlewares\Auth::class], function () {
  Router::get('admin',[LoginController::class,"index"]);
});



