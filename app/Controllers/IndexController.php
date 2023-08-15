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


    $sql = "SELECT settings.*,ca.title AS carTitle,ca.slug AS carSlug
    FROM settings
    LEFT JOIN carnivals AS ca
    ON settings.nav_carnival_id = ca.carnival_id";
    $stmt = $user->execute($sql);
    $settings = $stmt->fetchAll();


    $user = new User();
    $sql = "SELECT c.title,c.slug FROM carnivals AS c WHERE status=1";
    $stmt = $user->execute($sql);
    $carnivals = $stmt->fetchAll();




    /*************************************************************
    *?  Linkedin     : engg-shishir
    *!  Purpose      : Bind all fetching array in a single array
    *   Details      : since compact support single variable
    *************************************************************/
    $compact=["partners"=>$partners,"projects"=>$projects,"settings"=>$settings,"carnivals"=>$carnivals];



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

    $sql = "SELECT settings.*,ca.title AS carTitle,ca.slug AS carSlug
    FROM settings
    LEFT JOIN carnivals AS ca
    ON settings.nav_carnival_id = ca.carnival_id";
    $stmt = $user->execute($sql);
    $settings = $stmt->fetchAll();


    $user = new User();
    $sql = "SELECT c.title,c.slug FROM carnivals AS c WHERE status=1";
    $stmt = $user->execute($sql);
    $carnivals = $stmt->fetchAll();

    $sql = "SELECT * FROM support_category_image";
    $stmt = $user->execute($sql);
    $eventCategorys = $stmt->fetchAll();

    $sql = "SELECT
    (SELECT COUNT(*) FROM users) AS user_count,
    (SELECT COUNT(*) FROM events) AS event_count,
    (SELECT COUNT(*) FROM collaborators) AS colla_count";
    $stmt = $user->execute($sql);
    $count = $stmt->fetchAll();
    

    $compact=["category"=>$eventCategorys,"settings"=>$settings,"carnivals"=>$carnivals,"count"=>$count];

    return view("pages/Partner/index.php",compact("compact"));
  }
}

