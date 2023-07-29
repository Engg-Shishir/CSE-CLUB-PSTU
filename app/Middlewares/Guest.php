<?php
namespace App\Middlewares;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

session_start();
class Guest implements IMiddleware
{
	public function handle(Request $request): void
	{
		if(!isset($_SESSION["auth_security_token"]) && !isset($_SESSION["auth_user"])){
			$request->authenticated = true;
		}else{
			redirects("/");
		}
		// if(isset($_SESSION["auth_security_token"]) && isset($_SESSION["auth_user"])){
		// 	$_SESSION["error_message"] = "Who are you ???";
		// 	$url = $_ENV["APP_URL"] . "/" . $_ENV["BASE_URL"]."/login";
		// 	header("Location: " . $url, true, 301);
		// 	exit();
		// }else{
			
		// }

		
	}
}