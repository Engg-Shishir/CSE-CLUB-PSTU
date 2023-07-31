<?php


namespace App\Controllers\Admin;

use App\model\User;

class GalleryController
{

  private bool $errorCheck = false;
  public function file()
  {
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {

      $sql = "SELECT * FROM gallerys";
      $stmt = $user->execute($sql);
      $data = $stmt->fetchAll();
    }
    return view("pages/Admin/Static/gallery.php", compact("data"));
  }

  public function deleteFile($code)
  {
    $objs = new User();
    $res = $objs->delete("gallerys", "title", $code);
    unlinkFile("assets/image/Gallery/" . $code);
    $_SESSION["success_message"] = "File Delete Successfully";
    redirects("/admin/gallery");
  }



  public function insertFile()
  {
    // foreach ($_POST as $key => $value) {
    //   trim($value);
    //   $this->errorCheck = isEmpty($key, $value);
    // }



    // if ($this->errorCheck == true) {
    //   $_SESSION["error_message"] = "All field required";
    //   redirects("/admin/gallery");
    // }










    $imageDetails = fileDetails($_FILES, "file");
    $newImage = "";
    if ($imageDetails["fname"] != null) {
      if (isImage($imageDetails["fext"])) {

        if ($_POST["title"] !== "") {
          $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST["title"])));

          if ($_POST["description"] !== "") {
            $newImage = $slug . "." . $imageDetails["fext"];

            $user = new User();
            if ($user->exists("gallerys", "title", $newImage)) {
              $_SESSION["error_message"] = "File alredy exists";
              redirects("/admin/gallery");
            } else {
              unlinkFile("assets/image/Gallery/" . $newImage);
              fileStore($imageDetails["source"], "assets/image/Gallery/" . $newImage);
              $data = [
                "title" => $newImage,
                "description" => $_POST["description"],
                "file_type" => "image"
              ];

              $sql = "INSERT INTO gallerys (`title`,`description`,`file_type`) VALUES (:title,:description,:file_type)";

              $run = $user->insert($sql, $data); // $run = 1 or 0
              if ($run) {
                $_SESSION["success_message"] = "File Inserted";
              } else {
                $_SESSION["error_message"] = "Something going wrong!";
              }

              redirects("/admin/gallery");
            }



          } else {
            $_SESSION["error_message"] = "All field is required";
          }

        } else {
          $_SESSION["error_message"] = "All field is required";
        }

      } else {
        $_SESSION["error_message"] = "Wromg file selected";
      }
    } else {
      $_SESSION["error_message"] = "No image selected";
    }

    redirects("/admin/gallery");







  }

}