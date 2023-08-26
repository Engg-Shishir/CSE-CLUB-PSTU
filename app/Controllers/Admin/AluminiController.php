<?php


namespace App\Controllers\Admin;

use App\model\User;

class AluminiController
{

  public function show()
  {
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {

      $sql = "SELECT ud.*,u.username,u.status,a.job_title,a.description FROM aluminis AS a
            INNER JOIN user_details AS ud ON ud.user_id=a.user_id
            INNER JOIN users AS u ON u.user_id=a.user_id";
      $stmt = $user->execute($sql);
      $aluminis = $stmt->fetchAll();

      $sql = "SELECT * FROM users WHERE role=?";
      $stmt = $user->execute($sql, ["student"]);
      $student = $stmt->fetchAll();

      $settings = $user->settings();
      $compact = [
        "aluminis" => $aluminis,
        "settings" => $settings
      ];
      return view("Backend/Admin/Alumini/Alumini.php", compact("compact"));
    } else {

    }
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