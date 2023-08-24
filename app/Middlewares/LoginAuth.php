<?php
namespace App\Middlewares;

use App\model\User;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

session_start();
class LoginAuth implements IMiddleware
{
	public function handle(Request $request): void
	{
		$securityKey = $_ENV["APP_KEY"].base64_encode($_ENV["SECURITY_KEY"]);
		// Check _token is match or not 
		if ($securityKey == ($_POST["_token"].base64_encode($_ENV["SECURITY_KEY"]))) {
			// requested user role
			$role= $_POST["role"];
           if($role!=="" && $role=="participant"){
				$user = new User();
				$sql = "SELECT * FROM `event_reg` WHERE `email`=? && `verified`=? && `status`=? && `password`=?";
				$stmt = $user->execute($sql, [$_POST["username"],1,1,$_POST["password"]]);
				$data = $stmt->fetch(\PDO::FETCH_ASSOC);
				if ($stmt->rowCount() > 0){
					$_SESSION["auth_user"] = $_POST["username"];
					$_SESSION["auth_role"] = $role;
					$_SESSION["auth_id"] = $data['reg_id'];
					$_SESSION["auth_security_token"]=$securityKey.$_POST["username"];
					$request->authenticated = true;
				}else{
					$_SESSION["error_message"] = "Either mail is not verified Or status in active by admin.";
					redirects("/login");
				}
		   }else if($role!=="" && $role=="partner"){

		   } else{
				$user = new User();
				$sql = "SELECT users.user_id,users.role,users.password,users.status FROM `users` WHERE `username`=? && `role`=?";
				$stmt = $user->execute($sql, [$_POST["username"],$role]);
				$data = $stmt->fetch(\PDO::FETCH_ASSOC);
				if ($stmt->rowCount() > 0) {
					if (password_verify($_POST["password"], $data['password'])) {
						if ($data['status']!==0) {
							$_SESSION["auth_user"] = $_POST["username"];
							$_SESSION["auth_id"] = $data['user_id'];
							$_SESSION["auth_role"] = $role;
							$_SESSION["auth_security_token"]=$securityKey.$_POST["username"];
							$request->authenticated = true;
						}else {
							$_SESSION["error_message"] = "Status off";
							redirects("/login");
						}
					} else {
						$_SESSION["error_message"] = "credential is not match";
						redirects("/login");
					}
				} else {
					$_SESSION["error_message"] = "No user found";
					redirects("/login");
				}
		   }

		} else {
			$_SESSION["error_message"] = "You are not authenticated user";
			redirects("/login");
		}
	}
}