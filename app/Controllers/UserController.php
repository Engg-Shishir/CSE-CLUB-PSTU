<?php  


namespace App\Controllers;
use App\model\User;

class UserController{

  public function userdetails(){
    session_start();
    if(isset($_SESSION["user_setails_status"]) && $_SESSION["user_setails_status"] =="ON"){

      $user = new User();
      $sql = "SELECT settings.*,ca.title AS carTitle,ca.slug AS carSlug
      FROM settings
      LEFT JOIN carnivals AS ca
      ON settings.nav_carnival_id = ca.carnival_id";
      $stmt = $user->execute($sql);
      $settings = $stmt->fetchAll();
  
  
      $sql = "SELECT c.title,c.slug FROM carnivals AS c WHERE status=1";
      $stmt = $user->execute($sql);
      $carnivals = $stmt->fetchAll();


      $sql = "SELECT * FROM countrys";
      $stmt = $user->execute($sql);
      $countrys = $stmt->fetchAll();


      $sql = "SELECT * FROM countrys";
      $stmt = $user->execute($sql);
      $countrys = $stmt->fetchAll();

      $sql = "SELECT colleges.college_code,colleges.name FROM colleges";
      $stmt = $user->execute($sql);
      $colleges = $stmt->fetchAll();

      $sql = "SELECT f.fac_code,f.name FROM facultys AS f";
      $stmt = $user->execute($sql);
      $facultys = $stmt->fetchAll();
  
  
      $compact=[
        "settings"=>$settings,
        "carnivals"=>$carnivals,
        "countrys"=>$countrys,
        "colleges"=>$colleges,
        "facultys"=>$facultys
      ];
      return view("pages/details.php",compact("compact"));

    }else{
      $_SESSION["error_message"]= "You should sign in first";
      redirects("/login");
    }
  }
  public function insertDetails()
  {
    
    session_start();
    $imageDetails = fileDetails($_FILES, "image");

    $data = [
      "user_id" => $_POST["user_id"],
      "country_code" => $_POST["country_code"],
      "name" => $_POST["name"],
      "gender" => $_POST["gender"],
      "birth" => $_POST["birth"],
      "image" => $imageDetails["fname"],
      "college" => $_POST["college"],
      "department" => $_POST["facultys"],
      "sid" => $_POST["sid"],
      "blood" => $_POST["blood"],
      "linkedin" => $_POST["linkedin"],
      "bio" => $_POST["bio"]
    ];



    if (isBlank($data)) {
      $_SESSION["error_message"] = "* field is required";
      redirects("/userdetails");
    } else {
      if (!isImage($imageDetails["fext"])) {
        $_SESSION["error_message"] = "Wrong file selected";
        redirects("/userdetails");
      } else {

        $slug = slug($data["user_id"]);
        $NewFileName = $slug . "." . $imageDetails["fext"];
        unlinkFile("assets/Upload/Users/" . $NewFileName);
        fileStore($imageDetails["source"], "assets/Upload/Users/" . $NewFileName);


        $user = new User();
        $sql = "INSERT INTO user_details (`user_id`,`country_code`,`name`,`gender`,`birth`,`nid`,`image`,`college`,`department`,`sid`,`blood`,`facebook`,`linkedin`,`github`,`bio`) VALUES (:user_id,:country_code,:name,:gender,:birth,:nid,:image,:college,:department,:sid,:blood,:facebook,:linkedin,:github,:bio)";

        $data["image"] = $NewFileName;
        $data["nid"] = $_POST["nid"];
        $data["facebook"] = $_POST["facebook"];
        $data["github"] = $_POST["github"];

        $run = $user->insert($sql, $data); // $run = 1 or 0
        if ($run) {
          $_SESSION["success_message"] = "Event Inserted";
          unsetAll($data);
          unset($_SESSION["user_setails_status"]);
        } else {
          $_SESSION["error_message"] = "Something going wrong!";
        }

        redirects("/userdetails");
      }
    }















  }
}

