<?php
use App\Controllers\IndexController;
use App\master\Router;

Router::get('/', function() {
  $compact=[
    "author"=>"Shishir Bhuiyan",
    "email"=>"shishir.cse.pstu@gmail.com"
  ];
  return view("home.php",compact("compact"));
});

Router::get('alluser',[IndexController::class,"alluser"]);
Router::get('specificuser',[IndexController::class,"specificuser"]);