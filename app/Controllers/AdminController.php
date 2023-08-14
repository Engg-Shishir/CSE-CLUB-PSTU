<?php  


namespace App\Controllers;
use App\model\User;

class AdminController
{
  public function index(){
    $user = new User();
    $settings = $user->settings();
    return view("pages/Admin/Dashboard/index.php",compact("settings"));
  }
}