<?php  


namespace App\Controllers;
use App\model\User;

class UserController{

  public function userdetails(){
    session_start();
    if(isset($_SESSION["user_setails_status"]) && $_SESSION["user_setails_status"] =="ON"){
      return view("pages/details.php");
    }else{
      $_SESSION["error_message"]= "You should sign in first";
      redirects("/login");
    }
  }
}

