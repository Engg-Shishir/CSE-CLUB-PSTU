<?php


namespace App\Controllers\Admin;

use App\model\User;

class HomeController
{

  private bool $errorCheck = false;
  public function about()
  {
    $user = new User();
    $sql = "SELECT * FROM sliders";
    $stmt = $user->execute($sql);
    $data = $stmt->fetchAll();
    return view("pages/Admin/Static/homeAbout.php", compact("data"));
  }
  public function insertAbout()
  {
    if($_POST["imageCount"] !=="5"){
      $imageDetails = fileDetails($_FILES, "image");
      if ($imageDetails["fname"] != null) {
        if ($_POST["des"] !== "") {
          $titles = ["one", "two", "three","four","five"];
          if (in_array($_POST["des"], $titles) === true){
            if($imageDetails["fext"]=="jpg"){
              $slug = slug($_POST["des"]);
              $NewFileName = $slug . "." . $imageDetails["fext"];
              unlinkFile("assets/Upload/About/" . $NewFileName);
      
              fileStore($imageDetails["source"], "assets/Upload/About/" . $NewFileName);
      
              $data = [
                "des" => $_POST["des"],
                "image" => $NewFileName
              ];
              $user = new User();
              $sql = "INSERT INTO sliders (`des`,`image`) VALUES (:des,:image)";
      
              $run = $user->insert($sql, $data); // $run = 1 or 0
              if ($run) {
                $_SESSION["success_message"] = "Image added";
              } else {
                $_SESSION["error_message"] = "Something going wrong!";
              }
      
              redirects("/admin/home/about");
            }else{
              $_SESSION["error_message"] = "jpg type needed";
              redirects("/admin/home/about");
            }
          }else{
            $_SESSION["error_message"] = "Title should : one/two/three/four/five";
            redirects("/admin/home/about");
          }
  
  
        } else {
          $_SESSION["error_message"] = "Add Image title";
        }
      } else {
        $_SESSION["error_message"] = "No File selected";
      }
    }else {
      $_SESSION["error_message"] = "Already five image inserted";
      redirects("/admin/home/about");
    }

    redirects("/admin/home/about");




  }

  public function homeAboutDelete($code){
    $objs = new User();
    $fetch = $objs->byId("sliders","slider_id",$code);

    unlinkFile("assets/Upload/About/".$fetch["image"]);
    $res = $objs->delete("sliders", "slider_id", $code);
    $_SESSION["success_message"] = "Image Delete Successfully";
    redirects("/admin/home/about");
  }
}