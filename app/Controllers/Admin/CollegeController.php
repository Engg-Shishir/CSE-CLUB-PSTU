<?php


namespace App\Controllers\Admin;

use App\model\User;

class CollegeController
{

  private bool $errorCheck = false;
  public function college()
  {
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {
      
      $countrys = $user->all("countrys");

      $sql = "SELECT c.name,c.college_code,c.website,countrys.name AS CN FROM colleges AS c
      INNER JOIN countrys ON c.country_code=countrys.country_code";
      $stmt = $user->execute($sql);
      $colleges = $stmt->fetchAll();

    }
    $settings = $user->settings();
    $compact = [
      "colleges" => $colleges,
      "countrys" => $countrys,
      "settings"=>$settings
    ];
    

    return view("Backend/Admin/Static/college.php", compact("compact"));
  }

  public function deleteCollege($code)
  {
    $objs = new User();
    $res = $objs->delete("colleges", "college_code", $code);
    $_SESSION["success_message"] = "College Delete Successfully";
    redirects("/admin/college");
  }



  public function insertCollege()
  {
    foreach ($_POST as $key => $value) {
      trim($value);
      $this->errorCheck = isEmpty($key, $value);
    }

    if ($this->errorCheck == true) {
      $_SESSION["error_message"] = "All field required";
      redirects("/admin/college");
    }


    $user = new User();
    if ($user->exists("colleges", "college_code", $_POST["college_code"])) {
      $_SESSION["error_message"] = "College alredy exists";
      redirects("/admin/college");
    }



    $sql = "INSERT INTO colleges (`college_code`,`country_code`,`name`,`website`) VALUES (:college_code,:country_code,:name,:website)";

    $run = $user->insert($sql, $_POST); // $run = 1 or 0
    if ($run) {
      $_SESSION["success_message"] = "College Inserted";
    } else {
      $_SESSION["error_message"] = "Something going wrong!";
    }

    redirects("/admin/college");

  }

}