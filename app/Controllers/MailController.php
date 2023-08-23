<?php  


namespace App\Controllers;
use App\model\User;

class MailController
{
  public function emailVerification($sender,$token)
  {
    session_start();
    $user = new User();
    $sql = "SELECT * FROM users WHERE username=? AND token=?";
    $stmt = $user->execute($sql, [$sender,$token]);
    if($stmt->rowCount() > 0){
      $sql = "UPDATE users SET is_verified = :is_verified,token = :token WHERE username = :username";
      $data=[
          "is_verified"=>1,
          "username"=>$sender,
          "token"=>null
      ];
      $user->updates($sql,$data);
      $_SESSION["success_message"] = "Account verified ! After review your account you can login. If any emmergency please contact +01925696314";
      redirects("/login");
    }else{
      $_SESSION["success_message"] = "Account alredy verified ! Please Login";
      redirects("/login");
    }


  }

  public function sendCode(){

    $user = new User();

    if ($user->isExist("event_reg","email",$_POST["email"])) {
      $back=[
        "type"=>"error",
        "message"=>"Already registerd in this event"
      ];
      return json_encode($back);
    }else{
      $tokenCode = token(5);
      if(mailVerify($_POST["email"], $_POST["email"], $tokenCode)){
        $user = new User();
        $sql = "INSERT INTO event_reg (`email`,`token`) VALUES (:email,:token)";
        $pass = [
            "email" =>$_POST["email"],
            "token" => $tokenCode
        ];
        $run = $user->insert($sql, $pass);
        if($run){
          $back=[
            "type"=>"success",
            "message"=>"Verification code send to your account"
          ];
          return json_encode($back);
        }
      }else{
        return "Email invalid";
      }
    }
  }

}