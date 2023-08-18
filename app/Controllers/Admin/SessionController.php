<?php


namespace App\Controllers\Admin;

use App\model\User;

class SessionController
{

  private bool $errorCheck = false;
  public function session()
  {
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {
    
      $sql = "SELECT * FROM sessions";
      $stmt = $user->execute($sql);
      $data = $stmt->fetchAll();

      $settings = $user->settings();
      $compact = [
        "data" => $data,
        "settings"=>$settings
      ];
    }
    return view("Backend/Admin/Static/session.php", compact("compact"));
  }

  public function deleteSession($code)
  {
    $objs = new User();
    $res = $objs->delete("sessions", "session_id", $code);
    $_SESSION["success_message"] = "Session Delete Successfully";
    redirects("/admin/session");
  }



  public function insertSession()
  {
    foreach ($_POST as $key => $value) {
      trim($value);
      $this->errorCheck = isEmpty($key, $value);
    }

    if ($this->errorCheck == true) {
      $_SESSION["error_message"] = "All field required";
      redirects("/admin/session");
    }


    $user = new User();
    if ($user->exists("sessions", "session", $_POST["session"])) {
      $_SESSION["error_message"] = "Session alredy exists";
      redirects("/admin/session");
    }



    $sql = "INSERT INTO sessions (`session`) VALUES (:session)";

    $run = $user->insert($sql, $_POST); // $run = 1 or 0
    if ($run) {
      $_SESSION["success_message"] = "Session Inserted";
    } else {
      $_SESSION["error_message"] = "Something going wrong!";
    }

    redirects("/admin/session");

  }

}