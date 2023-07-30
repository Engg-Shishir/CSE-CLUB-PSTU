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
	}
}