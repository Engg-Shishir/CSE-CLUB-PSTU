<?php


namespace App\Controllers\Admin;

use App\model\User;

class TranjectionController
{


  public function tranjection()
  {
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {
    
      $sql = "SELECT *, (SELECT SUM(amount) FROM payment) AS sum,(SELECT SUM(amount) FROM payment WHERE reason='event') AS sum_event FROM payment";
      $stmt = $user->execute($sql);
      $data = $stmt->fetchAll();

      $eventMoneySql = "SELECT SUM(amount) FROM payment WHERE reason='event'";
      $stmt = $user->execute($eventMoneySql);
      $eventMoney = $stmt->fetchColumn();

      $settings = $user->settings();
      $compact = [
        "data" => $data,
        "settings"=>$settings,
        "eventMoney"=>$eventMoney
      ];
    }
    return view("Backend/Admin/Payment/tranjection.php", compact("compact"));
  }

  public function deleteSession($code)
  {
    $objs = new User();
    $res = $objs->delete("sessions", "session_id", $code);
    $_SESSION["success_message"] = "Session Delete Successfully";
    redirects("/admin/session");
  }
  public function tranjectionInsert()
  {
    $data = [
      "tno" => $_POST["tno"],
      "pay_type" => $_POST["pay_type"],
      "amount" => $_POST["amount"],
      "reason" => $_POST["reason"]
    ];



    if (isBlank($data)) {
      $_SESSION["error_message"] = "All field is required";
      redirects("/admin/tranjection");
    } else {


        $user = new User();
        $sql = "INSERT INTO payment (tno,pay_type,amount,reason) VALUES (:tno,:pay_type,:amount,:reason)";

        $run = $user->insert($sql, $data); // $run = 1 or 0
        if ($run) {
          $_SESSION["success_message"] = "Tranjection Inserted";
          unsetAll($data);
          unset($_SESSION["user_setails_status"]);
        } else {
          $_SESSION["error_message"] = "Something going wrong!";
        }

        redirects("/admin/tranjection");
      }
  }

}