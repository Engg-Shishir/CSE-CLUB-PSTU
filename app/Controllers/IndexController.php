<?php  


namespace App\Controllers;
use App\model\User;

class IndexController{

  public function home(){
    $user = new User();
    $sql = "SELECT c.image,c.web,c.status FROM collaborators AS c";
    $stmt = $user->execute($sql);
    $partners = $stmt->fetchAll();

    $compact=["partners"=>$partners];

    return view("pages/Home/Index.php",compact("compact"));
  }

}

