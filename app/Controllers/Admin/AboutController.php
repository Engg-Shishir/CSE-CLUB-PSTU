<?php  


namespace App\Controllers\Admin;
use App\model\User;

class AboutController{

  public function about(){

    $user = new User();
    if (isset($_SESSION["auth_role"]) && $_SESSION["auth_role"] !== "" && $_SESSION["auth_role"] == "admin") {

        $sql = "SELECT * FROM abouts";
        $stmt = $user->execute($sql);
        $aboutData = $stmt->fetchAll();

      $settings = $user->settings();
      $compact = [
        "aboutData"=>$aboutData,
        "settings"=>$settings
      ];
  
      return view("Backend/Admin/Static/about.php", compact("compact"));

    }else{

    }
  }

  public function insertAbout(){
    
    $user = new User();
    $imageDetails = fileDetails($_FILES, "banner");
    $data=[
       "banner" => $imageDetails["fname"],
       "google_map_latitude" => $_POST["google_map_latitude"],
       "google_map_langitude" => $_POST["google_map_langitude"],
       "phone" => $_POST["phone"],
       "fax" => $_POST["fax"],
       "email" => $_POST["email"],
       "about" => $_POST["about"]
    ];


    if(isBlank($data)){
        $_SESSION["error_message"]="Alll field is required";
        redirects("/admin/about");
    }else{
        if (!isImage($imageDetails["fext"])){
            $_SESSION["error_message"] = "Wrong file selected !";
            redirects("/admin/about");
        }else{
          $bannerName = "aboutPageBanner.".$imageDetails["fext"];
          $data["banner"]=$bannerName;


          $sql = "SELECT * FROM abouts";
          $stmt = $user->execute($sql);
          $aboutData = $stmt->fetchAll();

          if ($stmt->rowCount() <= 0){
            // Insert
          fileStore($imageDetails["source"], "assets/Upload/PageBanner/" .$bannerName);
            $sql = "INSERT INTO abouts (`banner`,`google_map_latitude`,`google_map_langitude`,`phone`,`fax`,`email`,`about`) 
                    VALUES (:banner,:google_map_latitude,:google_map_langitude,:phone,:fax,:email,:about)";

            $run = $user->insert($sql, $data); // $run = 1 or 0
            if ($run) {
              $_SESSION["success_message"] = "About section data ipdated";
            } else {
              $_SESSION["error_message"] = "Something going wrong!";
            }
            redirects("/admin/about");
          }else{
            // update
                   
          /*************************************************************
          *?  Linkedin     : engg-shishir
          *!  Purpose       : Delete all file from a path
          *   Details      : unlink() accept path link and delete all file inside of it
          *************************************************************/
          unlinkPath("assets/Upload/PageBanner/".$aboutData["banner"]);


          /*************************************************************
          *?  Linkedin     : engg-shishir
          *!  Purpose      : Store aboutpagebanner file inside PageBanner folder
          *   @params      : original source, destination source
          *   @paramsType  : string, string
          *   @returnType  : void
          *************************************************************/
          fileStore($imageDetails["source"], "assets/Upload/PageBanner/" .$bannerName);
       

          $sql="UPDATE abouts
          SET banner = :banner,
              google_map_latitude = :google_map_latitude,
              google_map_langitude = :google_map_langitude,
              phone = :phone,
              fax = :fax,
              email = :email,
              about = :about";

            $user->updateTable($sql,$data);
            $_SESSION["success_message"] = "About page data Updated";
            redirects("/admin/about");
          }
        }
    }
  }

}

