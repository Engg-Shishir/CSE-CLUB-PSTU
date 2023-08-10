<?php


namespace App\Controllers\Admin;

use App\model\User;

class MessageController
{

  private bool $errorCheck = false;



  public function send()
  {
    foreach ($_POST as $key => $value) {
      trim($value);
      $this->errorCheck = isEmpty($key, $value);
    }

    if ($this->errorCheck == true) {
      $_SESSION["error_message"] = "All field required";
      redirects("/welcome/partner");
    }


    $user = new User();
    $sql = "INSERT INTO message (`fname`,`lname`,`email`,`subject`,`company`,`des`) VALUES (:fname,:lname,:email,:subject,:company,:des)";

    $run = $user->insert($sql, $_POST); // $run = 1 or 0
    if ($run) {
      $_SESSION["success_message"] = "Message Send";
      redirects("/welcome/partner");
    } else {
      $_SESSION["error_message"] = "Something going wrong!";
      redirects("/welcome/partner");
    }


  }

}