<?php  


namespace App\Controllers;
use App\model\User;

class EventsController{

  public function events(){

    $user = new User();
    $sql = "SELECT * FROM events";
    $stmt = $user->execute($sql);
    $events = $stmt->fetchAll();

    $settings = $user->settings();

    $compact=["events"=>$events,"settings"=>$settings];


    return view("pages/Event/index.php",compact("compact"));
  }


  


  public function welcomePartner()
  {
    /*************************************************************
     *?  Linkedin     : engg-shishir
     *!  Purpose      : fetch site settings info
     *************************************************************/
    $user = new User();
    $settings = $user->settings();

    $sql = "SELECT * FROM support_category_image";
    $stmt = $user->execute($sql);
    $eventCategorys = $stmt->fetchAll();

    $sql = "SELECT
    (SELECT COUNT(*) FROM users) AS user_count,
    (SELECT COUNT(*) FROM events) AS event_count,
    (SELECT COUNT(*) FROM collaborators) AS colla_count";
    $stmt = $user->execute($sql);
    $count = $stmt->fetchAll();
    

    $compact=["category"=>$eventCategorys,"settings"=>$settings,"count"=>$count];

    return view("pages/Partner/index.php",compact("compact"));
  }
}

