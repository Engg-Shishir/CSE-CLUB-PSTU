<?php
namespace App\Middlewares;

use App\model\User;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

session_start();
class Admin implements IMiddleware
{
	public function handle(Request $request): void
	{
		if(isset($_SESSION["auth_security_token"]) && isset($_SESSION["auth_user"])){
			if (strpos($_SESSION["auth_security_token"], $_SESSION["auth_user"]) !== false) { 
				$request->authenticated = true;
			}else {
				$_SESSION["error_message"] = "Who are you ???";
				$url = $_ENV["APP_URL"] . "/" . $_ENV["BASE_URL"]."/login";
				header("Location: " . $url, true, 301);
				exit();
			}
		}else {
			$_SESSION["error_message"] = "Who are you ???";
			$url = $_ENV["APP_URL"] . "/" . $_ENV["BASE_URL"]."/login";
			header("Location: " . $url, true, 301);
			exit();
		}
	}
}