<?php


namespace App\Controllers;

use App\model\User;

class LoginController
{

  public function index()
  {
    $compact = [
      "Data" => "This text come from Admin Controller"
    ];

    return view("admin/index.php", compact("compact"));
  }

  public function login()
  {
    return view("pages/Login/index.php");
  }
  public function logout()
  {
    session_start();
    unset($_SESSION["auth_user"]);
    unset($_SESSION["auth_role"]);
    unset($_SESSION["auth_security_token"]);
    // Clear all session variables.
    session_unset();
    // Destroy the session data.
    session_destroy();
    redirects("/login");
  }

  public function dashboard(){

    if(isset($_SESSION["auth_security_token"]) && $_SESSION["auth_security_token"] !=="" && isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !=="" &&  isset($_SESSION["auth_role"]) && $_SESSION["auth_role"] !==""){
      if (strpos($_SESSION["auth_security_token"], $_SESSION["auth_user"]) !== false){
          if($_SESSION["auth_role"]==2){
            redirects("/admin");
          }else{
            return "Users logedin";
          }
      }else{
        $_SESSION["error_message"]= "You are not authenticated";
        redirects("/login");
      }
    }else{
      $_SESSION["error_message"]= "You are not authenticated";
      redirects("/login");
    }

  }


}