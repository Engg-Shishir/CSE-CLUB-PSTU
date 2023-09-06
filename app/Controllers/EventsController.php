<?php


namespace App\Controllers;

use App\model\User;

class EventsController
{

  public function carnival($carnival)
  {

    $user = new User();

    //  Select main carnival
    $sql = "SELECT c.* FROM carnivals AS c  WHERE c.slug=? AND c.status=?";
    $stmt = $user->execute($sql, [$carnival, 1]);
    $carnivalData = $stmt->fetchAll();

    // Select carinival all events
    $sql = "SELECT events.*
    FROM events INNER JOIN carnivals AS c ON c.carnival_id =events.carnival_id
    WHERE c.slug=? AND events.status=?";
    $stmt = $user->execute($sql, [$carnival, 1]);
    $events = $stmt->fetchAll();


    //  Select sponsor who are agree to sponsor for specific carnival
    $sql = "SELECT es.function,c.image,c.web FROM collaborators AS c
    INNER JOIN event_sponsor AS es ON es.colla_id= c.colla_id
    WHERE es.carnival_id=?";
    $stmt = $user->execute($sql, [$carnivalData[0]["carnival_id"]]);
    $sponsor = $stmt->fetchAll();

    // Page header, footer aditional settings data
    $sql = "SELECT settings.*,ca.title AS carTitle,ca.slug AS carSlug
    FROM settings
    LEFT JOIN carnivals AS ca
    ON settings.nav_carnival_id = ca.carnival_id";
    $stmt = $user->execute($sql);
    $settings = $stmt->fetchAll();

    //  Select all active carnival list, to show in the navbar, for quick access
    $user = new User();
    $sql = "SELECT c.title,c.slug FROM carnivals AS c WHERE status=?";
    $stmt = $user->execute($sql, [1]);
    $carnivals = $stmt->fetchAll();

    // Select related faqs
    $sql = "SELECT * FROM faqs WHERE faq_category=?";
    $stmt = $user->execute($sql,[$carnival]);
    $faqs = $stmt->fetchAll();




    if (count($events) > 0) {
      $compact = [
        "events" => $events,
        "settings" => $settings,
        "carnivals" => $carnivals,
        "sponsor" => $sponsor,
        "faqs" => $faqs,
        "carnival" => $carnivalData
      ];
      // parray($compact);
      return view("Frontend/Event/carnival.php", compact("compact"));
    } else {
      $compact = [
        "settings" => $settings,
        "carnivals" => $carnivals,
        "sponsor" => $sponsor,
        "faqs" => $faqs,
        "carnival" => $carnivalData
      ];
      return view("Frontend/Event/directEvents.php", compact("compact"));
    }

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


    $sql = "SELECT * FROM faqs WHERE faq_category=?";
    $stmt = $user->execute($sql, [$event]);
    $faqs = $stmt->fetchAll();

    $compact = ["events" => $events, "settings" => $settings, "carnivals" => $carnivals, "sponsor" => $sponsor, "faqs" => $faqs];

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
    $sql = "SELECT college_code,name FROM colleges";
    $stmt = $user->execute($sql);
    $colleges = $stmt->fetchAll();

    $user = new User();
    $sql = "SELECT slug,title FROM carnivals WHERE `status`=1";
    $stmt = $user->execute($sql);
    $carnivals = $stmt->fetchAll();




    $compact = ["settings" => $settings, "colleges" => $colleges, "carnivals" => $carnivals];

    // parray($compact);

    return view("Frontend/Event/registration.php", compact("compact"));
  }

  public function fetchEvent()
  {
    $user = new User();

    $sql = "SELECT carnival_id FROM `carnivals` WHERE `slug`=?";
    $stmt = $user->execute($sql, [$_POST["carnival_slug"]]);
    $cid = $stmt->fetchColumn();


    $sql = "SELECT event_id,event_name FROM `events` WHERE `carnival_id`=? AND `status`=?";
    $stmt = $user->execute($sql, [$cid, 1]);
    $events = $stmt->fetchAll();


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








  public function insertEventRegData()
  {
    session_start();

    $user = new User();
    $sql = "SELECT * FROM event_reg  WHERE email=?  && token=?";
    $stmt = $user->execute($sql, [$_POST["email"], $_POST["token"]]);

    $sql2 = "SELECT reg_fee FROM events WHERE event_id=?";
    $stmt2 = $user->execute($sql2, [$_POST["event_id"]]);
    $fee = $stmt2->fetchColumn();

    $sql1 = "SELECT * FROM payment WHERE tno=? && status=? && amount>=?";
    $stmt1 = $user->execute($sql1, [$_POST["tranjection"], 0, $fee]);


    if ($stmt->rowCount() > 0) {
      if ($stmt1->rowCount() > 0) {

        $sqls = "UPDATE payment SET status =:status WHERE tno=:tno";
        $pass = [
          "status" => 1,
          "tno" => $_POST["tranjection"]
        ];
        $user->updateTable($sqls, $pass);


        $imageDetails = fileDetails($_FILES, "image");
        $data = [
          "event_id" => $_POST["event_id"],
          "college_code" => $_POST["college_code"],
          "student_id" => $_POST["student_id"],
          "name" => $_POST["name"],
          "current_edu" => $_POST["current_edu"],
          "password" => $_POST["password"],
          "image" => $imageDetails["fname"],
          "tranjection" => $_POST["tranjection"],
          "token" => $_POST["token"],
          "email" => $_POST["email"],
        ];
        if (isBlank($data)) {
          $_SESSION["error_message"] = "All field is required";
          redirects("/signup/event");
        } else {
          if (!isImage($imageDetails["fext"])) {
            $_SESSION["error_message"] = "Wrong file selected";
            redirects("/signup/event");
          } else {

            $slug = slug($data["student_id"]);
            $NewFileName = $slug . "." . $imageDetails["fext"];
            unlinkFile("assets/Upload/EventRegister/" . $NewFileName);
            fileStore($imageDetails["source"], "assets/Upload/EventRegister/" . $NewFileName);


            $data["image"] = $NewFileName;


            $data["token"] = null;
            $data += ["verified" => 1];

            $sql = "UPDATE event_reg SET event_id=:event_id,college_code=:college_code,student_id=:student_id,name=:name,
                           current_edu=:current_edu,password=:password,image=:image,tranjection=:tranjection,token=:token,verified=:verified WHERE email=:email";


            $run = $user->updateTable($sql, $data);
            if ($run) {
              $_SESSION["success_message"] = "You Registered Successfully";
              unsetAll($data);
              redirects("/signup/event");
            } else {
              $_SESSION["error_message"] = "Something going wrong!";
              redirects("/signup/event");
            }
          }
        }
      } else {
        $_SESSION["error_message"] = "Invalid tranjection number";
        redirects("/signup/event");
      }
    } else {
      $_SESSION["error_message"] = "Email and Verification code is not match";
      redirects("/signup/event");
    }

  }
}