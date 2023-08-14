<?php  


namespace App\Controllers;
use App\model\User;

class AdminUser{

  public function manage(){
    $user = new User();
    if(isset($_SESSION["auth_user"])){
      $data = $user->allexcept("users","username",$_SESSION["auth_user"]);$settings = $user->settings();
      $comapact=[
        "data"=>$data,
        "settings"=>$settings
      ];
    }
    return view("pages/Admin/Users/manage.php",compact("comapact"));
  }

  public function status(){
    $user = new User();
    if($_POST["status"]==0) $new=1;
    else $new=0;

    $sql = "UPDATE users SET status = :status WHERE username=:username";
    $pass = [
        "status" =>$new,
        "username" => $_POST["username"]
    ];
    $data = $user->updateTable($sql,$pass);
    if($data){
      redirects("/admin/users/manage");
    }
  }

  public function role(){
    $user = new User();

    $sql = "UPDATE users SET role = :role WHERE username=:username";
    $pass = [
        "role" =>$_POST["role"],
        "username" => $_POST["username"]
    ];
    $data = $user->updateTable($sql,$pass);
    if($data){
      redirects("/admin/users/manage");
    }
  }
}

