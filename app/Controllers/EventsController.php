<?php


namespace App\Controllers;

use App\model\User;

class EventsController
{

  public function carnival($carnival)
  {

    $user = new User();

    $sql = "SELECT events.*,c.*
    FROM events INNER JOIN carnivals AS c ON c.carnival_id =events.carnival_id
    WHERE c.slug=? AND events.status=?";
    $stmt = $user->execute($sql, [$carnival, 1]);
    $events = $stmt->fetchAll();


    $sql = "SELECT settings.*,ca.title AS carTitle,ca.slug AS carSlug
    FROM settings
    LEFT JOIN carnivals AS ca
    ON settings.nav_carnival_id = ca.carnival_id";
    $stmt = $user->execute($sql);
    $settings = $stmt->fetchAll();


    $user = new User();
    $sql = "SELECT c.title,c.slug FROM carnivals AS c WHERE status=?";
    $stmt = $user->execute($sql, [1]);
    $carnivals = $stmt->fetchAll();

    $sponsor=[];
    if (count($events)) {

      $sql = "SELECT * FROM collaborators AS c
      INNER JOIN event_sponsor AS es ON es.colla_id= c.colla_id
      WHERE es.carnival_id=?";
      $stmt = $user->execute($sql, [$events[0]["carnival_id"]]);
      $sponsor = $stmt->fetchAll();
    }


    $compact = ["events" => $events, "settings" => $settings, "carnivals" => $carnivals, "sponsor" => $sponsor];

    return view("Frontend/Event/carnival.php", compact("compact"));
  }


  public function event($event)
  {

    $user = new User();

    $sql = "SELECT events.*,c.*
    FROM events INNER JOIN carnivals AS c ON c.carnival_id =events.carnival_id
    WHERE events.event_slug=? AND events.status=?";
    $stmt = $user->execute($sql, [$event, 1]);
    $events = $stmt->fetch();

    $sql = "SELECT settings.*,ca.title AS carTitle,ca.slug AS carSlug
    FROM settings
    LEFT JOIN carnivals AS ca
    ON settings.nav_carnival_id = ca.carnival_id";
    $stmt = $user->execute($sql);
    $settings = $stmt->fetchAll();


    $user = new User();
    $sql = "SELECT c.title,c.slug FROM carnivals AS c WHERE status=?";
    $stmt = $user->execute($sql, [1]);
    $carnivals = $stmt->fetchAll();



    $sql = "SELECT * FROM collaborators AS c
            INNER JOIN event_sponsor AS es ON es.colla_id= c.colla_id
            WHERE es.carnival_id=?";
    $stmt = $user->execute($sql, [$events["carnival_id"]]);
    $sponsor = $stmt->fetchAll();

    $compact = ["events" => $events, "settings" => $settings, "carnivals" => $carnivals, "sponsor" => $sponsor];

    return view("Frontend/Event/event.php", compact("compact"));
  }

  public function eventReg()
  {

    $user = new User();


    $sql = "SELECT settings.*,ca.title AS carTitle,ca.slug AS carSlug
    FROM settings
    LEFT JOIN carnivals AS ca
    ON settings.nav_carnival_id = ca.carnival_id";
    $stmt = $user->execute($sql);
    $settings = $stmt->fetchAll();


    $user = new User();
    $sql = "SELECT * FROM colleges";
    $stmt = $user->execute($sql);
    $colleges = $stmt->fetchAll();

    $user = new User();
    $sql = "SELECT slug,title FROM carnivals WHERE `status`=1";
    $stmt = $user->execute($sql);
    $carnivals = $stmt->fetchAll();




    $compact = [ "settings" => $settings, "colleges" => $colleges, "carnivals" => $carnivals];

    // parray($compact);

    return view("Frontend/Event/registration.php", compact("compact"));
  }

  public function fetchEvent(){
    $user = new User();

    $sql = "SELECT carnival_id FROM `carnivals` WHERE `slug`=?";
    $stmt = $user->execute($sql, [$_POST["carnival_slug"]]);
    $cid = $stmt->fetchColumn();


    $sql = "SELECT event_slug,event_name FROM `events` WHERE `carnival_id`=? AND `status`=?";
    $stmt = $user->execute($sql, [$cid, 1]);
    $events = $stmt->fetchAll();

    // $sql = "SELECT * FROM events";
    // $stmt = $user->execute($sql);
    // $events = $stmt->fetchAll();

    return json_encode($events);
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


    $compact = ["category" => $eventCategorys, "settings" => $settings, "count" => $count];

    return view("pages/Partner/index.php", compact("compact"));
  }
}