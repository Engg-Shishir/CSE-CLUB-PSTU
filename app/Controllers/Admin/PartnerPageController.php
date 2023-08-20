<?php


namespace App\Controllers\Admin;

use App\model\User;

class PartnerPageController
{

  private bool $errorCheck = false;
  public function partnerPage()
  {  

    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {
      $sql = "SELECT * FROM support_category_image";
      $stmt = $user->execute($sql);
      $data = $stmt->fetchAll();

      $settings = $user->settings();
      $compact = [
        "data"=>$data,
        "settings"=>$settings
      ];

      return view("Backend/Admin/Support/support.php",compact("compact"));
    }
  }

  public function insertSpnsorCategory()
  {
    $imageDetails = fileDetails($_FILES, "image");

    $data = [
      "title" => $_POST["title"],
      "image" => $imageDetails["fname"]
    ];

    if (isBlank($data)) {
      $_SESSION["error_message"] = "All field required";
      redirects("/admin/partnerpage");
    } else {
      if (!isImage($imageDetails["fext"])) {
        $_SESSION["error_message"] = "Wrong file selected";
        redirects("/admin/partnerpage");
      } else {

        $slug = slug($data["title"]);
        $NewFileName = $slug . "." . $imageDetails["fext"];
        unlinkFile("assets/Upload/Sponsor-Category/" . $NewFileName);
        fileStore($imageDetails["source"], "assets/Upload/Sponsor-Category/" . $NewFileName);


        $user = new User();
        $sql = "INSERT INTO support_category_image (`title`,`image`) VALUES (:title,:image)";
        
        $data["image"] = $NewFileName;
        
        $run = $user->insert($sql, $data); // $run = 1 or 0
        if ($run) {
          $_SESSION["success_message"] = "Category Inserted";
          unsetAll($data);
        } else {
          $_SESSION["error_message"] = "Something going wrong!";
        }

        redirects("/admin/partnerpage");
      }
    }

  }

  function statusEventCategory($id){
   
    $objs = new User();
    $fetch = $objs->byId("support_category_image","id",$id);

    if($fetch["status"]==1){
      $status = 0;
    }else{
      $status = 1;
    }

    $DB = new User();
    $sql="UPDATE support_category_image set status=:status WHERE id=:id";
    $data=["status"=>$status,"id"=>$id];
    // unlinkFile("assets/Upload/Partners/".$fetch["image"]);
    // $res = $objs->delete("collaborators", "colla_id", $id);
    $DB->updateTable($sql,$data);
    redirects("/admin/partnerpage");
  }

  function deleteEventCategory($id){
    $objs = new User();
    $fetch = $objs->byId("support_category_image","id",$id);

    unlinkFile("assets/Upload/Sponsor-Category/".$fetch["image"]);
    $res = $objs->delete("support_category_image", "id", $id);
    $_SESSION["success_message"] = "Delete Successfully";
    redirects("/admin/partnerpage");
  }

}