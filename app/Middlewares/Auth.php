<?php
namespace App\Middlewares;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

session_start();
class Auth implements IMiddleware
{
	public function handle(Request $request): void
	{
		if(isset($_SESSION["auth_security_token"]) && isset($_SESSION["auth_user"])){
			$request->authenticated = true;
		}else{
            $_SESSION["error_message"]= "You should sign in first";
			redirects("/login");
		}
	}
}