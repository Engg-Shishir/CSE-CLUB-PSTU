<?php


namespace App\Controllers\Admin;

use App\model\User;

class BlogController
{


  public function show()
  {
    $user = new User();
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {
      
      $blogCategory = $user->all("blog_categories");


    }
    $settings = $user->settings();
    $compact = [
      "blogCategory" => $blogCategory,
      "settings"=>$settings
    ];
    

    return view("Backend/Admin/Blog/blogCategory.php", compact("compact"));
  }

  public function deleteCollege($code)
  {
    $objs = new User();
    $res = $objs->delete("colleges", "college_code", $code);
    $_SESSION["success_message"] = "College Delete Successfully";
    redirects("/admin/college");
  }



  public function blogcategoryInsert()
  {
    $data = [
        "name" => $_POST["name"],
        "description" => $_POST["description"]
    ];
  
    if (isBlank($data)) {
        $_SESSION["error_message"] = "All field required";
        redirects("/admin/blogcategory");
    }else{

        $user = new User();
        if ($user->exists("blog_categories", "name", $_POST["name"])) {
          $_SESSION["error_message"] = "Category alredy exists";
          redirects("/admin/blogcategory");
        }


        $sql = "INSERT INTO blog_categories (`name`,`description`) VALUES (:name,:description)";
    
        $run = $user->insert($sql, $_POST); // $run = 1 or 0
        if ($run) {
          $_SESSION["success_message"] = "CAtegory Inserted";
        } else {
          $_SESSION["error_message"] = "Something going wrong!";
        }
    
        redirects("/admin/blogcategory");

    }



  }

}