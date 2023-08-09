<?php


namespace App\Controllers\Admin;

use App\model\User;

class partnerController
{

  private bool $errorCheck = false;
  public function partners()
  {  
    
    
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {
      $sql = "SELECT * FROM collaborators";
      $stmt = $user->execute($sql);
      $data = $stmt->fetchAll();
      return view("pages/Admin/Partners/index.php",compact("data"));
    }
  }

  public function insertPartner()
  {
    $imageDetails = fileDetails($_FILES, "image");

    $data = [
      "name" => $_POST["name"],
      "email" => $_POST["email"],
      "phone" => $_POST["phone"],
      "address" => $_POST["address"],
      "description" => $_POST["description"],
      "image" => $imageDetails["fname"],
      "web" => $_POST["web"]
    ];

    if (isBlank($data)) {
      $_SESSION["error_message"] = "All field required";
      redirects("/admin/partners");
    } else {
      if (!isImage($imageDetails["fext"])) {
        $_SESSION["error_message"] = "Wrong file selected";
        redirects("/admin/partners");
      } else {

        $slug = slug($data["name"]);
        $NewFileName = $slug . "." . $imageDetails["fext"];
        unlinkFile("assets/Upload/Partners/" . $NewFileName);
        fileStore($imageDetails["source"], "assets/Upload/Partners/" . $NewFileName);


        $user = new User();
        $sql = "INSERT INTO collaborators (`name`,`email`,`phone`,`address`,`description`,`image`,`web`) VALUES (:name,:email,:phone,:address,:description,:image,:web)";
        
        $data["image"] = $NewFileName;
        
        $run = $user->insert($sql, $data); // $run = 1 or 0
        if ($run) {
          $_SESSION["success_message"] = "Partner Inserted";
          unsetAll($data);
        } else {
          $_SESSION["error_message"] = "Something going wrong!";
        }

        redirects("/admin/partners");
      }
    }

  }

  function statusPartner($id){
   
    $objs = new User();
    $fetch = $objs->byId("collaborators","colla_id",$id);

    if($fetch["status"]==1){
      $status = 0;
    }else{
      $status = 1;
    }

    $DB = new User();
    $sql="UPDATE collaborators set status=:status WHERE colla_id=:colla_id";
    $data=["status"=>$status,"colla_id"=>$id];
    // unlinkFile("assets/Upload/Partners/".$fetch["image"]);
    // $res = $objs->delete("collaborators", "colla_id", $id);
    $DB->updateTable($sql,$data);
    redirects("/admin/partners");
  }

}