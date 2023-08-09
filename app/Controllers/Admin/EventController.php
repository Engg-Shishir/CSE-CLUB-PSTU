<?php


namespace App\Controllers\Admin;

use App\model\User;

class EventController
{

  private bool $errorCheck = false;
  public function events()
  {  
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {
      $sql = "SELECT * FROM events";
      $stmt = $user->execute($sql);
      $data = $stmt->fetchAll();
      return view("pages/Admin/Events/index.php",compact("data"));
    }
  }

  public function insertEvents()
  {
    $imageDetails = fileDetails($_FILES, "event_image");

    $data = [
      "event_name" => $_POST["event_name"],
      "event_loc" => $_POST["event_loc"],
      "reg_date" => $_POST["reg_date"],
      "event_date" => $_POST["event_date"],
      "event_time" => $_POST["event_time"],
      "event_image" => $imageDetails["fname"],
      "event_des" => $_POST["event_des"]
    ];

    if (isBlank($data)) {
      $_SESSION["error_message"] = "All field required";
      redirects("/admin/events");
    } else {
      if (!isImage($imageDetails["fext"])) {
        $_SESSION["error_message"] = "Wrong file selected";
        redirects("/admin/events");
      } else {

        $slug = slug($data["event_name"]);
        $NewFileName = $slug . "." . $imageDetails["fext"];
        unlinkFile("assets/Upload/Events/" . $NewFileName);
        fileStore($imageDetails["source"], "assets/Upload/Events/" . $NewFileName);


        $user = new User();
        $sql = "INSERT INTO events (`event_name`,`event_loc`,`reg_date`,`event_date`,`event_time`,`event_image`,`event_des`) VALUES (:event_name,:event_loc,:reg_date,:event_date,:event_time,:event_image,:event_des)";
        
        $data["event_image"] = $NewFileName;
        
        $run = $user->insert($sql, $data); // $run = 1 or 0
        if ($run) {
          $_SESSION["success_message"] = "Event Inserted";
          unsetAll($data);
        } else {
          $_SESSION["error_message"] = "Something going wrong!";
        }

        redirects("/admin/events");
      }
    }

  }

  function statusEvent($id){
   
    $objs = new User();
    $fetch = $objs->byId("events","event_id",$id);

    if($fetch["status"]==1){
      $status = 0;
    }else{
      $status = 1;
    }

    $DB = new User();
    $sql="UPDATE events set status=:status WHERE event_id=:event_id";
    $data=["status"=>$status,"event_id"=>$id];
    // unlinkFile("assets/Upload/Partners/".$fetch["image"]);
    // $res = $objs->delete("collaborators", "colla_id", $id);
    $DB->updateTable($sql,$data);
    $_SESSION["success_message"] = "Status Updated";
    redirects("/admin/events");
  }

}