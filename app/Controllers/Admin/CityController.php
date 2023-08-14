<?php


namespace App\Controllers\Admin;

use App\model\User;

class CityController
{

  private bool $errorCheck = false;
  public function city()
  {
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {
      
      $countrys = $user->all("countrys");

      $sql = "SELECT citys.postal_code,citys.country_code,citys.name,countrys.name AS CN FROM citys
      INNER JOIN countrys ON citys.country_code=countrys.country_code";
      $stmt = $user->execute($sql);
      $citys = $stmt->fetchAll();

    }
    $settings = $user->settings();
    $compact = [
      "citys" => $citys,
      "countrys" => $countrys,
      "settings"=>$settings
    ];

    return view("pages/Admin/Static/city.php", compact("compact"));
  }

  public function deleteCity($code)
  {
    $objs = new User();
    $res = $objs->delete("citys", "postal_code", $code);
    $_SESSION["success_message"] = "City Delete Successfully";
    redirects("/admin/city");
  }



  public function insertCity()
  {
    foreach ($_POST as $key => $value) {
      trim($value);
      $this->errorCheck = isEmpty($key, $value);
    }

    if ($this->errorCheck == true) {
      $_SESSION["error_message"] = "All field required";
      redirects("/admin/city");
    }


    $user = new User();

    if ($user->exists("citys", "postal_code", $_POST["postal_code"])) {
      $_SESSION["error_message"] = "City alredy exists";
      redirects("/admin/city");
    }



    $sql = "INSERT INTO citys (`postal_code`,`country_code`,`name`) VALUES (:postal_code,:country_code,:name)";

    $run = $user->insert($sql, $_POST); // $run = 1 or 0
    if ($run) {
      $_SESSION["success_message"] = "City Inserted";
    } else {
      $_SESSION["error_message"] = "Something going wrong!";
    }

    redirects("/admin/city");

  }

}