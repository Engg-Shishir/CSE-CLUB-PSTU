<?php


namespace App\Controllers\Admin;

use App\model\User;

class FaqController
{

  private bool $errorCheck = false;
  public function faq()
  {
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {
    
      $sql = "SELECT * FROM faqs";
      $stmt = $user->execute($sql);
      $data = $stmt->fetchAll();
    }
    return view("pages/Admin/Static/faq.php", compact("data"));
  }

  public function deleteFaq($code)
  {
    $objs = new User();
    $res = $objs->delete("faqs", "faq_id", $code);
    $_SESSION["success_message"] = "Faq Delete Successfully";
    redirects("/admin/faq");
  }



  public function insertFaq()
  {
    foreach ($_POST as $key => $value) {
      trim($value);
      $this->errorCheck = isEmpty($key, $value);
    }

    if ($this->errorCheck == true) {
      $_SESSION["error_message"] = "All field required";
      redirects("/admin/faq");
    }


    $user = new User();
    if ($user->exists("faqs", "question", $_POST["question"])) {
      $_SESSION["error_message"] = "Course alredy exists";
      redirects("/admin/faq");
    }



    $sql = "INSERT INTO faqs (`question`,`ans`) VALUES (:question,:ans)";

    $run = $user->insert($sql, $_POST); // $run = 1 or 0
    if ($run) {
      $_SESSION["success_message"] = "Faq Inserted";
    } else {
      $_SESSION["error_message"] = "Something going wrong!";
    }

    redirects("/admin/faq");

  }

}