<?php


namespace App\Controllers\Admin;

use App\model\User;

class NoticeController
{

  private bool $errorCheck = false;
  public function notice()
  {
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {
    
      $sql = "SELECT * FROM notices";
      $stmt = $user->execute($sql);
      $data = $stmt->fetchAll();

      $settings = $user->settings();
      $compact = [
        "data" => $data,
        "settings"=>$settings
      ];
    }
    return view("pages/Admin/Static/notice.php", compact("compact"));
  }


  public function noticeInsertPage()
  {
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {

      $settings = $user->settings();
      $compact = [
        "settings"=>$settings
      ];
    }
    return view("pages/Admin/Static/insertNotice.php", compact("compact"));
  }

  public function deleteNotice($code)
  {
    $objs = new User();
    $fetch = $objs->byId("notices","notice_id",$code);

    unlinkFile("assets/Upload/Notice/".$fetch["file_source"]);
    $res = $objs->delete("notices", "notice_id", $code);
    $_SESSION["success_message"] = "Notice Delete Successfully";
    redirects("/admin/notice");
  }

  public function editNotice($code){
    $user = new User();
    $data = $user->fetchById("notices","notice_id",$code);
    return view("pages/Admin/Static/insertNotice.php",compact("data")); 
  }

  public function noticeUpdate(){
    $DB = new User();
      $sql="UPDATE notices set title=:title,des=:des,file_source=:file_source WHERE notice_id=:notice_id";
    
    $imageDetails = fileDetails($_FILES, "file");
    
    $NewFileName = $_POST["old_file"];
    if($imageDetails["fname"] !==""){
      if($_POST["old_file"]!==""){
        unlinkFile("assets/Upload/Notice/".$_POST["old_file"]);
      }
      $slug = slug($_POST["title"]);
      $NewFileName = $slug . "." . $imageDetails["fext"];
      fileStore($imageDetails["source"], "assets/Upload/Notice/" . $NewFileName);
    }

    $data=[
      "title"=>$_POST["title"],
      "des"=>$_POST["des"],
      "file_source"=>$NewFileName,
      'notice_id' =>$_POST["notice_id"]
    ];


    $DB->updateTable($sql,$data);
    $_SESSION["success_message"] = "Notice Updated";
    redirects("/admin/notice");
  }



  public function noticeInsert()
  {
    foreach ($_POST as $key => $value) {
      trim($value);
      $this->errorCheck = isEmpty($key, $value);
    }

    if ($this->errorCheck == true) {
      $_SESSION["error_message"] = "All field required";
      redirects("/admin/notice/insert");
    }
    

    // parray($_POST);

    $user = new User();
    if ($user->exists("notices", "title", $_POST["title"])) {
      $_SESSION["error_message"] = "Notice alredy exists";
      redirects("admin/notice/insert");
    }

    $imageDetails = fileDetails($_FILES, "file");
    $slug = slug($_POST["title"]);
    $NewFileName = $slug . "." . $imageDetails["fext"];
    unlinkFile("assets/Upload/Notice/" . $NewFileName);
    fileStore($imageDetails["source"], "assets/Upload/Notice/" . $NewFileName);
    

    if ($imageDetails["fname"] != null){
      $fileSource = $NewFileName;
    }else{
      $fileSource=null;
    }
    

    $data = [
      "title" => trim($_POST["title"]),
      "des" => $_POST["des"],
      "file_source" => $fileSource
    ];


    $sql = "INSERT INTO notices (`title`,`des`,`file_source`) VALUES (:title,:des,:file_source)";

    $run = $user->insert($sql, $data); // $run = 1 or 0
    if ($run) {
      $_SESSION["success_message"] = "Notice Inserted";
    } else {
      $_SESSION["error_message"] = "Something going wrong!";
    }

    redirects("/admin/notice/insert");

  }


  public function previewNotice(){

  }

}