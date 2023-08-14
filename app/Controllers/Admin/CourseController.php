<?php


namespace App\Controllers\Admin;

use App\model\User;

class CourseController
{

  private bool $errorCheck = false;
  public function course()
  {
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {
    
      $sql = "SELECT * FROM courses";
      $stmt = $user->execute($sql);
      $data = $stmt->fetchAll();

      $settings = $user->settings();
      $compact = [
        "data" => $data,
        "settings"=>$settings
      ];
    }
    return view("pages/Admin/Static/course.php", compact("compact"));
  }

  public function deleteCourse($code)
  {
    $objs = new User();
    $res = $objs->delete("courses", "	course_code", $code);
    $_SESSION["success_message"] = "Course Delete Successfully";
    redirects("/admin/course");
  }



  public function insertCourse()
  {
    foreach ($_POST as $key => $value) {
      trim($value);
      $this->errorCheck = isEmpty($key, $value);
    }

    if ($this->errorCheck == true) {
      $_SESSION["error_message"] = "All field required";
      redirects("/admin/course");
    }


    $user = new User();
    if ($user->exists("courses", "course_code", $_POST["course_code"])) {
      $_SESSION["error_message"] = "Course alredy exists";
      redirects("/admin/course");
    }



    $sql = "INSERT INTO courses (`course_code`,`course_name`,`credit`,`course_des`) VALUES (:course_code,:course_name,:credit,:course_des)";

    $run = $user->insert($sql, $_POST); // $run = 1 or 0
    if ($run) {
      $_SESSION["success_message"] = "Course Inserted";
    } else {
      $_SESSION["error_message"] = "Something going wrong!";
    }

    redirects("/admin/course");

  }

}