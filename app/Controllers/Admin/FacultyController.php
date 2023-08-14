<?php


namespace App\Controllers\Admin;

use App\model\User;

class FacultyController
{

  private bool $errorCheck = false;
  public function faculty()
  {
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {
    
      $sql = "SELECT * FROM facultys";
      $stmt = $user->execute($sql);
      $data = $stmt->fetchAll();

      $settings = $user->settings();
      $compact = [
        "data" => $data,
        "settings"=>$settings
      ];
    }
    return view("pages/Admin/Static/faculty.php", compact("compact"));
  }

  public function deleteFaculty($code)
  {
    $objs = new User();
    $res = $objs->delete("facultys", "fac_id", $code);
    $_SESSION["success_message"] = "Faculty Delete Successfully";
    redirects("/admin/faculty");
  }



  public function insertFaculty()
  {
    foreach ($_POST as $key => $value) {
      trim($value);
      $this->errorCheck = isEmpty($key, $value);
    }

    if ($this->errorCheck == true) {
      $_SESSION["error_message"] = "All field required";
      redirects("/admin/faculty");
    }


    $user = new User();
    if ($user->exists("facultys", "fac_code", $_POST["fac_code"])) {
      $_SESSION["error_message"] = "Faculty alredy exists";
      redirects("/admin/faculty");
    }



    $sql = "INSERT INTO facultys (`fac_code`,`name`) VALUES (:fac_code,:name)";

    $run = $user->insert($sql, $_POST); // $run = 1 or 0
    if ($run) {
      $_SESSION["success_message"] = "faculty Inserted";
    } else {
      $_SESSION["error_message"] = "Something going wrong!";
    }

    redirects("/admin/faculty");

  }

}