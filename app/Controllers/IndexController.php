<?php  


namespace App\Controllers;
use App\model\User;

class IndexController{

  public function home(){
    /*************************************************************
    *?  Linkedin     : engg-shishir
    *!  Purpose       : Fetch collaborators or partners details
    *   Details      : 
    *************************************************************/
    $user = new User();
    $sql = "SELECT c.image,c.web,c.status FROM collaborators AS c";
    $stmt = $user->execute($sql);
    $partners = $stmt->fetchAll();

    /*************************************************************
    *?  Linkedin     : engg-shishir
    *!  Purpose      : fetch home page project data
    *   Details      : 
    *************************************************************/
    $sql = "SELECT * FROM projects";
    $stmt = $user->execute($sql);
    $projects = $stmt->fetchAll();

    /*************************************************************
    *?  Linkedin     : engg-shishir
    *!  Purpose      : fetch site settings info
    *   Details      : 
    *************************************************************/
    $sql = "SELECT * FROM settings";
    $stmt = $user->execute($sql);
    $settings = $stmt->fetchAll();


    /*************************************************************
    *?  Linkedin     : engg-shishir
    *!  Purpose      : Bind all fetching array in a single array
    *   Details      : since compact support single variable
    *************************************************************/
    $compact=["partners"=>$partners,"projects"=>$projects,"settings"=>$settings];



    /*************************************************************
    *?  Linkedin     : engg-shishir
    *!  Purpose       : return home page with all associated data
    *   Details      : 
    *************************************************************/
    return view("pages/Home/Index.php",compact("compact"));
  }


  public function welcomePartner()
  {
    /*************************************************************
     *?  Linkedin     : engg-shishir
     *!  Purpose      : fetch site settings info
     *************************************************************/
    $user = new User();
    $settings = $user->settings();
    return view("pages/Partner/index.php",compact("settings"));
  }
}

