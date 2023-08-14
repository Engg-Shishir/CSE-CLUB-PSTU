<?php


namespace App\Controllers\Admin;

use App\model\User;

class SettingController
{

  private bool $errorCheck = false;
  public function setting()
  {  

    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {
      $sql = "SELECT * FROM settings";
      $stmt = $user->execute($sql);
      $data = $stmt->fetchAll();

      $settings = $user->settings();
      $compact = [
        "data"=>$data,
        "settings"=>$settings
      ];

      return view("pages/Admin/Settings/index.php",compact("compact"));
    }
  }

  public function updateSetting()
  {

    /*************************************************************
    *?  Linkedin     : engg-shishir
    *!  Purpose      : Find file details.Like : name, size, extention, type etc
    *   @params      : $file, $fileName
    *   @paramsType  : 
    *   @returnType  : array
    *************************************************************/
    $logo = fileDetails($_FILES, "logo");
    $favicon = fileDetails($_FILES, "favicon");
    $navLogo = fileDetails($_FILES, "navLogo");
    $video = fileDetails($_FILES, "video");

    $data = [
      "title" => trim($_POST["title"]),
      "logo" => trim($logo["fname"]),
      "navLogo" => trim($navLogo["fname"]),
      "video" => trim($video["fname"]),
      "favicon" => trim($favicon["fname"]),
      "notice_status" => trim($_POST["notice_status"]),
      "event_status" => trim($_POST["event_status"]),
      "project_section_text" => trim($_POST["project_section_text"]),
      "partners_section_text" => trim($_POST["partners_section_text"]),
      "short_des" => trim($_POST["short_des"]),
      "description" => trim($_POST["description"]),
      "meta_author" => trim($_POST["meta_author"]),
      "meta_keywords" => trim($_POST["meta_keywords"])
    ];



    /*************************************************************
    *?  Linkedin     : engg-shishir
    *!  Purpose      : isBlank() check any associative array key is empty or not
    *   @params      : $data
    *   @paramsType  : array
    *   @returnType  : boolean
    *************************************************************/

    if (isBlank($data)) {
      $_SESSION["error_message"] = "All field required";
      redirects("/admin/setting");
    } else {

      /*************************************************************
      *?  Linkedin     : engg-shishir
      *!  Purpose      : isImage() check file is image or not
      *   @params      : 
      *   @paramsType  : 
      *   @returnType  : 
      *************************************************************/
      if (!isImage($logo["fext"]) || !isImage($navLogo["fext"]) || !isImage($favicon["fext"])){
        $_SESSION["error_message"] = "Wrong file selected !";
        redirects("/admin/setting");
      }else{
        $data["logo"] = "logo.".$logo["fext"];
        $data["navLogo"] = "navLogo.".$navLogo["fext"];
        $data["favicon"] = "favicon.".$favicon["fext"];
        $data["video"] = "video.".$video["fext"];


        $user = new User();
        $sql = "SELECT * FROM settings";
        $stmt = $user->execute($sql);
        if ($stmt->rowCount() <= 0) {
          // Insert

          fileStore($logo["source"], "assets/Upload/Settings/" . $data["logo"]);
          fileStore($navLogo["source"], "assets/Upload/Settings/" . $data["navLogo"]);
          fileStore($favicon["source"], "assets/Upload/Settings/" . $data["favicon"]);
          fileStore($video["source"], "assets/Upload/Settings/" . $data["video"]);
  
          
          $sql = "INSERT INTO settings (`title`,`logo`,`navLogo`,`video`,`favicon`,`notice_status`,`event_status`,`project_section_text`,`partners_section_text`,`short_des`,`description`,`meta_author`,`meta_keywords`) VALUES (:title,:logo,:navLogo,:video,:favicon,:notice_status,:event_status,:project_section_text,:partners_section_text,:short_des,:description,:meta_author,:meta_keywords)";
        
          
          $run = $user->insert($sql, $data); // $run = 1 or 0
          if ($run) {
            $_SESSION["success_message"] = "Settings Updated";
          } else {
            $_SESSION["error_message"] = "Something going wrong!";
          }
          redirects("/admin/setting");
        }else{
          
          /*************************************************************
          *?  Linkedin     : engg-shishir
          *!  Purpose       : Delete all file from a path
          *   Details      : unlink() accept path link and delete all file inside of it
          *************************************************************/
          unlinkPath("assets/Upload/Settings/");


          /*************************************************************
          *?  Linkedin     : engg-shishir
          *!  Purpose      : Store settings file inside Settings folder
          *   @params      : original source, destination source
          *   @paramsType  : string, string
          *   @returnType  : void
          *************************************************************/
          fileStore($logo["source"], "assets/Upload/Settings/". $data["logo"]);
          fileStore($navLogo["source"], "assets/Upload/Settings/". $data["navLogo"]);
          fileStore($favicon["source"], "assets/Upload/Settings/". $data["favicon"]);
          fileStore($video["source"], "assets/Upload/Settings/". $data["video"]);


          $sql="UPDATE settings
          SET title = :title,
              logo = :logo,
              navLogo = :navLogo,
              video = :video,
              favicon = :favicon,
              notice_status = :notice_status,
              event_status = :event_status,
              project_section_text = :project_section_text,
              partners_section_text = :partners_section_text,
              short_des = :short_des,
              description = :description,
              meta_author = :meta_author,
              meta_keywords = :meta_keywords
              WHERE id = 1";

          $user->updateTable($sql,$data);
          $_SESSION["success_message"] = "Setting Updated";
          redirects("/admin/setting");
        }
      }

    }

  }


}