<?php


namespace App\Controllers\Admin;

use App\model\User;

class FaqController
{

  private bool $errorCheck = false;
  public function faq()
  {
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {

      $sql = "SELECT * FROM faqs";
      $stmt = $user->execute($sql);
      $data = $stmt->fetchAll();

      $settings = $user->settings();
      $compact = [
        "data" => $data,
        "settings" => $settings
      ];
    }
    return view("Backend/Admin/Faq/faq.php", compact("compact"));
  }

  public function faqByType($type)
  {
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {
      $settings = $user->settings();

      $sql = "SELECT * FROM faqs";
      $stmt = $user->execute($sql);
      $data = $stmt->fetchAll();


      $selectType=NULL;
      if($type=="carnival"){
        $sql = "SELECT carnivals.slug,carnivals.title FROM carnivals";
        $stmt = $user->execute($sql);
        $selectType = $stmt->fetchAll();
        $_SESSION["faqProcede"]="carnival";
      }else if($type=="events"){
        $sql = "SELECT events.event_slug,events.event_name FROM events";
        $stmt = $user->execute($sql);
        $selectType = $stmt->fetchAll();
        $_SESSION["faqProcede"]="events";
      }else{
        $selectType = $type;
        $_SESSION["faqProcede"]=$type;
      }

      $compact =[
        "settings"=>$settings,
        "data"=>$data,
        "selectType"=>$selectType
      ];
    }
    return view("Backend/Admin/Faq/insertFaq.php", compact("compact"));
  }
  

  public function deleteFaq($code)
  {
    $objs = new User();
    $res = $objs->delete("faqs", "faq_id", $code);
    $_SESSION["success_message"] = "Faq Delete Successfully";
    redirects("/admin/faq");
  }



  public function insertFaq()
  {

    $data = [
      "faq_category" => $_POST["faq_category"],
      "question" => $_POST["question"],
      "ans" => $_POST["ans"]
    ];


    if (isBlank($data)) {
      $_SESSION["error_message"] = "All field required";
      redirects("/admin/faq/".$_SESSION["faqProcede"]);
    }else{
      $user = new User();
      
      $sql = "SELECT * FROM faqs WHERE faq_category=? AND question=?";
      $stmt = $user->execute($sql,[$_POST["faq_category"],$_POST["question"]]);
      $faqCount = $stmt->rowCount();

      if ($faqCount>0) {
        $_SESSION["error_message"] = "Question alredy exists";
        redirects("/admin/faq/".$_SESSION["faqProcede"]);
      }
  
  
  
      $sql = "INSERT INTO faqs (`question`,`ans`,`faq_category`) VALUES (:question,:ans,:faq_category)";
  
      $run = $user->insert($sql, $data); // $run = 1 or 0
      if ($run) {
        $_SESSION["success_message"] = "Faq Inserted";
      } else {
        $_SESSION["error_message"] = "Something going wrong!";
      }
  
      redirects("/admin/faq/".$_SESSION["faqProcede"]);
    }

  }

}