<?php


namespace App\Controllers;

use App\model\User;

class AboutController
{

  public function about()
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

    $user = new User();
    $data = $user->all("abouts");


    $compact = ["settings" => $settings, "carnivals" => $carnivals, "data" => $data];

    return view("Frontend/About/about.php", compact("compact"));
  }

  public function activityBypage($number = 1)
  {
    $user = new User();

    if (intval($number) <= 0) {
      redirects("/activity/page/1");
    }
    $_SESSION["page"] = $number;

    $page_first_result = (intval($number) - 1) * 8;


    $sql = "SELECT * FROM activity 
            WHERE status=1  ORDER BY id DESC LIMIT " . $page_first_result . ',' . 4;
    $stmt = $user->execute($sql);
    $activity = $stmt->fetchAll();


    $sql = "SELECT event_name FROM activity WHERE status=?";
    $stmt = $user->execute($sql, [1]);
    $AllActivity = $stmt->fetchAll();



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

    $compact = [
      "activity" => $activity,
      "AllActivity" => $AllActivity,
      "settings" => $settings,
      "carnivals" => $carnivals
    ];

    return view("Frontend/Activity/activity.php", compact("compact"));
  }




  public function cselaw()
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

    $user = new User();
    $data = $user->all("rulespage");


    $compact = ["settings" => $settings, "carnivals" => $carnivals, "data" => $data];

    return view("Frontend/Rules/rules.php", compact("compact"));
  }

}