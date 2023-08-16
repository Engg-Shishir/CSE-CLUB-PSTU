<?php


namespace App\Controllers\Student;

use App\model\User;

class StudentController
{
  public function index()
  {
    $user = new User();
    $settings = $user->settings();
    return view("pages/User/Dashboard/index.php", compact("settings"));
  }

  public function profile()
  {
    $user = new User();
    $settings = $user->settings();

    $sql = "SELECT 
    u.username,
    ud.*
    FROM user_details AS ud 
    INNER JOIN users AS u ON u.user_id =ud.user_id
    WHERE u.user_id =?";
    $stmt = $user->execute($sql,[$_SESSION['auth_id']]);
    $data = $stmt->fetchAll();

    $sql = "SELECT * FROM carnivals";
    $stmt = $user->execute($sql);
    $carnivals = $stmt->fetchAll();

    $sql = "SELECT * FROM projects WHERE user_id=?";
    $stmt = $user->execute($sql,[$_SESSION['auth_id']]);
    $projects = $stmt->fetchAll();

    $sql = "SELECT colleges.name,colleges.website FROM colleges WHERE college_code=?";
    $stmt = $user->execute($sql,[$data[0]["college"]]);
    $college = $stmt->fetchAll();

    $sql = "SELECT countrys.name FROM countrys WHERE country_code=?";
    $stmt = $user->execute($sql,[$data[0]["country_code"]]);
    $country = $stmt->fetchAll();

    $sql = "SELECT facultys.name FROM facultys WHERE fac_code=?";
    $stmt = $user->execute($sql,[$data[0]["department"]]);
    $faculty = $stmt->fetchAll();

    $settings = $user->settings();

    $compact = [
      "data" => $data, 
      "settings" => $settings, 
      "carnivals" => $carnivals,
      "projects" => $projects,
      "college" => $college,
      "country" => $country,
      "faculty"=>$faculty
    ];



     


    return view("pages/User/Dashboard/profile.php", compact("compact"));
  }

  public function projects()
  {
    $user = new User();
    $settings = $user->settings();

    $sql = "SELECT 
    u.username,
    ud.*
    FROM user_details AS ud 
    INNER JOIN users AS u ON u.user_id =ud.user_id
    WHERE u.user_id =?";
    $stmt = $user->execute($sql,[$_SESSION['auth_id']]);
    $data = $stmt->fetchAll();

    $sql = "SELECT * FROM carnivals";
    $stmt = $user->execute($sql);
    $carnivals = $stmt->fetchAll();

    // $sql = "SELECT * FROM projects";
    // $stmt = $user->execute($sql);
    // $carnivals = $stmt->fetchAll();


    $settings = $user->settings();

    $compact = [
      "data" => $data, 
      "settings" => $settings, 
      "carnivals" => $carnivals
    ];


    return view("pages/User/Dashboard/projects.php", compact("compact"));
  }

  


}