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

      $sql = "SELECT 
                  e.event_name,
                  e.event_des,
                  e.event_date,
                  e.event_time,
                  e.event_loc,
                  e.status,
                  e.event_id,
                  c.title AS carnival
                  FROM events AS e INNER JOIN carnivals AS c ON e.carnival_id =c.carnival_id";
      $stmt = $user->execute($sql);
      $data = $stmt->fetchAll();

      $sql = "SELECT title As carnival FROM carnivals";
      $stmt = $user->execute($sql);
      $carnivals = $stmt->fetchAll();
      
      $settings = $user->settings();

      $compact = ["data" => $data, "settings" => $settings];

      return view("pages/Admin/Events/index.php", compact("compact"));
    } else {
      redirects("/");
    }
  }
  public function carnivals()
  {

    $user = new User();
    $sql = "SELECT * FROM carnivals";
    $stmt = $user->execute($sql);
    $carnivals = $stmt->fetchAll();

    $settings = $user->settings();

    $compact = ["carnivals" => $carnivals, "settings" => $settings];


    return view("pages/Admin/Events/carnivals.php", compact("compact"));
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
      "carnival_id" => $_POST["carnival_id"],
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
        $sql = "INSERT INTO events (`event_name`,`event_loc`,`reg_date`,`event_date`,`event_time`,`event_image`,`event_des`,`carnival_id`) VALUES (:event_name,:event_loc,:reg_date,:event_date,:event_time,:event_image,:event_des,:carnival_id)";

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
  public function insertCarnivals()
  {
    $imageDetails = fileDetails($_FILES, "banner");

    $data = [
      "title" => $_POST["title"],
      "start" => $_POST["start"],
      "end" => $_POST["end"],
      "banner" => $imageDetails["fname"]
    ];

    if (isBlank($data)) {
      $_SESSION["error_message"] = "All field required";
      redirects("/admin/carnivals");
    } else {
      if (!isImage($imageDetails["fext"])) {
        $_SESSION["error_message"] = "Wrong file selected";
        redirects("/admin/carnivals");
      } else {

        $slug = slug($data["title"]);
        $NewFileName = $slug . "." . $imageDetails["fext"];
        unlinkFile("assets/Upload/Carnivals/" . $NewFileName);
        fileStore($imageDetails["source"], "assets/Upload/Carnivals/" . $NewFileName);


        $user = new User();
        $sql = "INSERT INTO carnivals (`title`,`start`,`end`,`banner`) VALUES (:title,:start,:end,:banner)";

        $data["banner"] = $NewFileName;

        $run = $user->insert($sql, $data); // $run = 1 or 0
        if ($run) {
          $_SESSION["success_message"] = "Carnival Inserted";
          unsetAll($data);
        } else {
          $_SESSION["error_message"] = "Something going wrong!";
        }

        redirects("/admin/carnivals");
      }
    }

  }


  function statusEvent($id)
  {

    $objs = new User();
    $fetch = $objs->byId("events", "event_id", $id);

    if ($fetch["status"] == 1) {
      $status = 0;
    } else {
      $status = 1;
    }

    $DB = new User();
    $sql = "UPDATE events set status=:status WHERE event_id=:event_id";
    $data = ["status" => $status, "event_id" => $id];
    // unlinkFile("assets/Upload/Partners/".$fetch["image"]);
    // $res = $objs->delete("collaborators", "colla_id", $id);
    $DB->updateTable($sql, $data);
    $_SESSION["success_message"] = "Status Updated";
    redirects("/admin/events");
  }

  function deleteCarnival($id){
    $objs = new User();
    $fetch = $objs->byId("carnivals","carnival_id",$id);

    unlinkFile("assets/Upload/Carnivals/".$fetch["banner"]);
    $res = $objs->delete("carnivals", "carnival_id", $id);
    $_SESSION["success_message"] = "Delete Successfully";
    redirects("/admin/carnivals");
  }

}