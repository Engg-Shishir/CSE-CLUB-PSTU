<?php


namespace App\Controllers\Admin;

use App\model\User;

class CountryController
{

  private bool $errorCheck = false;
  public function country()
  {
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {
      $data = $user->allAssoc("countrys");
    }
    return view("pages/Admin/Static/country.php", compact("data"));
  }

  public function deleteCountry($code)
  {
    $objs = new User();
    $res = $objs->delete("countrys", "country_code", $code);
    $_SESSION["success_message"] = "Country Delete Successfully";
    redirects("/admin/country");
  }



  public function insertCountry()
  {
    foreach ($_POST as $key => $value) {
      trim($value);
      $this->errorCheck = isEmpty($key, $value);
    }

    if ($this->errorCheck == true) {
      $_SESSION["error_message"] = "All field required";
      redirects("/admin/country");
    }


    $user = new User();

    if ($user->exists("countrys", "country_code", $_POST["country_code"])) {
      $_SESSION["error_message"] = "Country alredy exists";
      redirects("/admin/country");
    }



    $sql = "INSERT INTO countrys (`country_code`,`name`) VALUES (:country_code,:name)";

    $run = $user->insert($sql, $_POST); // $run = 1 or 0
    if ($run) {
      $_SESSION["success_message"] = "Country Inserted";
    } else {
      $_SESSION["error_message"] = "Something going wrong!";
    }

    redirects("/admin/country");

  }

}