<?php


namespace App\Controllers\Admin;

use App\model\User;

class ProjectController
{

  private bool $errorCheck = false;
  public function Projects()
  {  
    
    
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {
      $sql = "SELECT p.logo,p.title,p.description,p.project_id,p.status,u.name FROM projects AS p
              INNER JOIN user_details AS u ON p.user_id= u.user_id";
      $stmt = $user->execute($sql);
      $data = $stmt->fetchAll();
      return view("Backend/Admin/Projects/index.php",compact("data"));
    }
  }

  public function insertProject()
  {

    $user = new User();
    $sql = "SELECT * FROM user_details  WHERE user_id=?";
    $stmt = $user->execute($sql, [$_POST["user_id"]]);



    if ($stmt->rowCount() <= 0) {
      $_SESSION["error_message"] = "User profile should be complete";
      redirects("/admin/projects");
    }

    $imageDetails = fileDetails($_FILES, "logo");
    $data = [
      "title" => $_POST["title"],
      "user_id" => $_POST["user_id"],
      "sourcecode" => $_POST["sourcecode"],
      "description" => $_POST["description"],
      "logo" => $imageDetails["fname"]
    ];

    if (isBlank($data)) {
      $_SESSION["error_message"] = "All field required";
      redirects("/admin/projects");
    } else {
      if (!isImage($imageDetails["fext"])) {
        $_SESSION["error_message"] = "Wrong file selected";
        redirects("/admin/projects");
      } else {

        $slug = slug($data["title"]);
        $NewFileName = $slug . "." . $imageDetails["fext"];
        unlinkFile("assets/Upload/Projects/" . $NewFileName);
        fileStore($imageDetails["source"], "assets/Upload/Projects/" . $NewFileName);


        
        $sql = "INSERT INTO projects (`title`,`logo`,`sourcecode`,`description`,`user_id`) VALUES (:title,:logo,:sourcecode,:description,:user_id)";
        
        $data["logo"] = $NewFileName;
        
        $run = $user->insert($sql, $data); // $run = 1 or 0
        if ($run) {
          $_SESSION["success_message"] = "Project Inserted";
          unsetAll($data);
        } else {
          $_SESSION["error_message"] = "Something going wrong!";
        }

        redirects("/admin/projects");
      }
    }

  }

  function statusProject($id){
   
    $objs = new User();
    $fetch = $objs->byId("projects","project_id",$id);

    if($fetch["status"]==1){
      $status = 0;
    }else{
      $status = 1;
    }

    $DB = new User();
    $sql="UPDATE projects set status=:status WHERE project_id=:project_id";
    $data=["status"=>$status,"project_id"=>$id];
    // unlinkFile("assets/Upload/Partners/".$fetch["image"]);
    // $res = $objs->delete("collaborators", "colla_id", $id);
    $DB->updateTable($sql,$data);
    redirects("/admin/projects");
  }

}