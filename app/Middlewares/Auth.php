<?php
namespace App\Middlewares;

use App\model\User;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

session_start();
class Auth implements IMiddleware
{
	public function handle(Request $request): void
	{
		$securityKey = $_ENV["APP_KEY"].base64_encode($_ENV["SECURITY_KEY"]);
		// Check _token is match or not 
		if ($securityKey == ($_POST["_token"].base64_encode($_ENV["SECURITY_KEY"]))) {
			
			$user = new User();
			$sql = "SELECT users.role,users.password FROM users WHERE username=?";
			$stmt = $user->execute($sql, [$_POST["username"]]);
			$data = $stmt->fetch(\PDO::FETCH_ASSOC);
			if ($stmt->rowCount() > 0) {

				if (password_verify($_POST["password"], $data['password'])) {
					$_SESSION["auth_user"] = $_POST["username"];
					$_SESSION["auth_role"] = $data['role'];
					$_SESSION["auth_security_token"]=$securityKey.$_POST["username"];
					$request->authenticated = true;
				} else {
					$_SESSION["error_message"] = "credential is not match";
	        redirects("/login");
				}
			} else {
				$_SESSION["error_message"] = "No username found";
				redirects("/login");
			}

		} else {
			$_SESSION["error_message"] = "Cross site protection detected";
			redirects("/login");
		}
	}
}