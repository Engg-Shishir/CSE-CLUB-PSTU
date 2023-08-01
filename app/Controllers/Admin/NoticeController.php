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
    }
    return view("pages/Admin/Static/notice.php", compact("data"));
  }


  public function noticeInsertPage()
  {
    return view("pages/Admin/Static/insertNotice.php");
  }

  public function deleteNotice($code)
  {
    $objs = new User();
    $res = $objs->delete("notices", "notice_id", $code);
    $_SESSION["success_message"] = "Notice Delete Successfully";
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
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST["title"])));
    $NewFileName = $slug . "." . $imageDetails["fext"];
    unlinkFile("assets/Upload/Notice/" . $NewFileName);
    fileStore($imageDetails["source"], "assets/Upload/Notice/" . $NewFileName);
    

    if ($imageDetails["fname"] != null){
      $fileSource = assets("Upload/Notice/".$NewFileName);
    }else{
      $fileSource=null;
    }
    

    $data = [
      "title" => $_POST["title"],
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