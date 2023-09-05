<?php  


namespace App\Controllers;
use App\model\User;

class AboutController{

  public function about(){
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


    $compact = ["settings" => $settings, "carnivals" => $carnivals,"data"=>$data];

    return view("Frontend/About/about.php", compact("compact"));
  }

}

