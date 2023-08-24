<?php
namespace App\Middlewares;

use App\model\User;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

session_start();
class Participant implements IMiddleware
{
  public function handle(Request $request): void
  {
    if (isset($_SESSION["auth_security_token"]) && $_SESSION["auth_security_token"] !== "" && isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "" && isset($_SESSION["auth_role"]) && $_SESSION["auth_role"] !== "" && $_SESSION["auth_role"] == "participant") {
      if (strpos($_SESSION["auth_security_token"], $_SESSION["auth_user"]) !== "") {
        $user = new User();
        $sql = "SELECT * FROM `event_reg` WHERE `email`=? && `verified`=? && `status`=? && `reg_id`=?";
        $stmt = $user->execute($sql, [$_SESSION["auth_user"], 1, 1, $_SESSION["auth_id"]]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {
          $request->authenticated = true;
        } else {
          $_SESSION["error_message"] = "Email unverified or Status Inactive";
          redirects("/login");
        }
      } else {
        $_SESSION["error_message"] = "Unauthenticated Participant";
        redirects("/login");
      }
    } else {
      $_SESSION["error_message"] = "Login first as a Participant";
      redirects("/login");
    }
  }
}