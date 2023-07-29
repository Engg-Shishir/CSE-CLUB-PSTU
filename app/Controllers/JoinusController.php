<?php  


namespace App\Controllers;
use App\model\User;

class JoinusController
{

  private bool $errorCheck = false;
  public function joinus()
  {
    $table = new User();
    return view("pages/Joinus/index.php");
  }
  public function registration()
  {
    foreach ($_POST as $key => $value) {
      trim($value);
      $this->errorCheck = isEmpty($key, $value);
    }

    if ($this->errorCheck == true) {
      $_SESSION["error_message"] = "All field required";
      redirects("/joinus");
    }

    if (passMatch($_POST["password"], $_POST["cpassword"]) == false) {
      $_SESSION["error_message"] = "Confirm Password is not match";
      redirects("/joinus");
    }

    $user = new User();

    
    if ($user->isExists($_POST["username"])) {
      $_SESSION["error_message"] = "Username alredy exists";
      redirects("/joinus");
    }




    $tokenCode = token(5);
    mailVerify($_POST["username"],"Shishir",$tokenCode);



    $sql = "INSERT INTO users (`username`,`password`,`token`) VALUES (:username,:password,:token)";
    $_POST += ["token" => $tokenCode];
    $_POST["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $run  = $user->insert($sql,$_POST); // $run = 1 or 0
    if($run){
      $_SESSION["success_message"] = "You are Rgister! Please Verify Your Email";
    }else{
      $_SESSION["error_message"] = "Something going wrong!";
    }
    redirects("/joinus");




  }

}