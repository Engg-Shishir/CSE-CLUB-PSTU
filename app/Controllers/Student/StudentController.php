<?php  


namespace App\Controllers\Student;
use App\model\User;

class StudentController
{
  public function index(){
     session_start();
    if(isset($_SESSION["auth_id"]) && $_SESSION["auth_id"]!==""){
      $user = new User();
      $sql = "SELECT ud.user_id FROM user_details AS ud WHERE user_id=?";
      $stmt = $user->execute($sql, [$_SESSION["auth_id"]]);
  
      if ($stmt->rowCount() > 0){
        $settings = $user->settings();
        return view("pages/User/Dashboard/index.php",compact("settings"));
      }else{
        $_SESSION["error_message"] = "You should login first";
        redirects("/login");
      }
    }else{
      $_SESSION["error_message"] = "You are not authenticated";
      redirects("/login");
    }

  }
}