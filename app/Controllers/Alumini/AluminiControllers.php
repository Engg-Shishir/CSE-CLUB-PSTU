<?php


namespace App\Controllers\Alumini;

use App\model\User;

class AluminiControllers
{
  public function alumini()
  {
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {


      $sql = "SELECT ud.*,u.username,u.status,a.job_title,a.description FROM aluminis AS a
            INNER JOIN user_details AS ud ON ud.user_id=a.user_id
            INNER JOIN users AS u ON u.user_id=a.user_id";
      $stmt = $user->execute($sql);
      $aluminis = $stmt->fetchAll();


      $settings = $user->settings();
      $compact = [
        "aluminis" => $aluminis,
        "settings" => $settings
      ];
      return view("Backend/Student/Alumini/Alumini.php", compact("compact"));
    }
  }

  public function jobInsert()
  {
    $data = [
      "job_title" => $_POST["job_title"],
      "description" => $_POST["description"]
    ];

    if (isBlank($data)) {
      $_SESSION["error_message"] = "All field required";
    } else {
      $user = new User();
      $sql = "INSERT INTO aluminis (`user_id`,`job_title`,`description`) VALUES (:user_id,:job_title,:description)";

      $data += ["user_id" => $_SESSION["auth_id"]];

      $run = $user->insert($sql, $data); // $run = 1 or 0
      if ($run) {
        $_SESSION["success_message"] = "Job Description Added";
        unsetAll($data);
      } else {
        $_SESSION["error_message"] = "Something going wrong!";
      }
    }
    redirects("/user/alumini");
  }

}