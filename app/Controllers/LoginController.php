<?php  


namespace App\Controllers;
use App\model\User;

class LoginController{

  public function index(){
    $compact = [
      "Data" => "This text come from Controller"
    ];
    
    return view("admin/index.php",compact("compact"));
  }

  public function login(){
    return view("login.php");
  }

}