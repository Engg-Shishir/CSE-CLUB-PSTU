<?php  


namespace App\Controllers;
use App\model\User;
session_start();
class LoginController{

  public function index(){
    $compact = [
      "Data" => "This text come from Admin Controller"
    ];
    
    return view("admin/index.php",compact("compact"));
  }

  public function login(){
    return view("pages/Login/index.php");
  }
  public function logout(){
    session_unset(); 
    redirects("/login");
  }
  

}