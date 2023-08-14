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

      $settings = $user->settings();
      $compact = [
        "data" => $data,
        "settings"=>$settings
      ];
    }
    return view("pages/Admin/Static/gallery.php", compact("compact"));
  }

  public function deleteFile($code)
  {
    $objs = new User();
    $res = $objs->delete("gallerys", "title", $code);
    unlinkFile("assets/Upload/Image/" . $code);
    unlinkFile("assets/Upload/Video/" . $code);
    unlinkFile("assets/Upload/Doc/" . $code);
    $_SESSION["success_message"] = "File Delete Successfully";
    redirects("/admin/gallery");
  }



  public function insertFile()
  {


    $imageDetails = fileDetails($_FILES, "file");
    $NewFileName = "";
    if ($imageDetails["fname"] != null) {
      if ($_POST["title"] !== "") {
        // $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST["title"])));
        $slug = slug($_POST["title"]);

        if ($_POST["description"] !== "") {
          $NewFileName = $slug . "." . $imageDetails["fext"];

          $user = new User();
          if ($user->exists("gallerys", "title", $NewFileName)) {
            $_SESSION["error_message"] = "File alredy exists";
            redirects("/admin/gallery");
          } else {

            $fileType = getFileType($imageDetails["fext"]);
            if($fileType=="Image"){
              unlinkFile("assets/Upload/Image/" . $NewFileName);
              fileStore($imageDetails["source"], "assets/Upload/Image/" . $NewFileName);

              $fileSource = assets("Upload/Image/".$NewFileName);

            }else if($fileType=="Video"){
              unlinkFile("assets/Upload/Video/" . $NewFileName);
              fileStore($imageDetails["source"], "assets/Upload/Video/" . $NewFileName);
              $fileSource = assets("Upload/Video/".$NewFileName);
            }else if($fileType=="Document"){
              unlinkFile("assets/Upload/Doc/" . $NewFileName);
              fileStore($imageDetails["source"], "assets/Upload/Doc/" . $NewFileName);
              $fileSource = assets("Upload/Doc/".$NewFileName);
            }else{
              $_SESSION["error_message"] = "Wrong file selected!";
              redirects("/admin/gallery");
            }



            $data = [
              "title" => $NewFileName,
              "description" => $_POST["description"],
              "file_type" => $fileType,
              "source" => $fileSource
            ];

            $sql = "INSERT INTO gallerys (`title`,`description`,`file_type`,`source`) VALUES (:title,:description,:file_type,:source)";

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
      $_SESSION["error_message"] = "No File selected";
    }

    redirects("/admin/gallery");







  }

}