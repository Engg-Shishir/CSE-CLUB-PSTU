<?php  


namespace App\Controllers;
use App\model\User;

class IndexController{

  public function alluser(){
    $user = new User();
    $compact = $user->fetchall("user");
    
    return view("admin/index.php",compact("compact"));
  }

  public function specificuser(){
    $user = new User();
    $compact = $user->byId("user","id","1");
    return view("admin/index.php",compact("compact"));
  }

}

