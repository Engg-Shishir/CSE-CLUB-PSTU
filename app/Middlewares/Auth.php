<?php
namespace App\Middlewares;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

session_start();
class Auth implements IMiddleware
{
	public function handle(Request $request): void
	{

		// $_SESSION['auth'] = shishirEnv("APP_KEY") . "++++hellooooo";
    
		// If auth is contain something
		if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {
			// If auth is not null & contain app key--- then middleware permit this route to go in /admin route. Else return to main page
			if (strpos($_SESSION['auth'], shishirEnv("APP_KEY")) !== false) {
				$request->authenticated = true;
			} else {
				$url = $_ENV["APP_URL"] . "/" . $_ENV["BASE_URL"];
				header("Location: ".$url, true, 301);
				exit();
			}
		} else {
			$url = $_ENV["APP_URL"] . "/" . $_ENV["BASE_URL"];
			header("Location: ".$url, true, 301);
      exit();
		}
	}
}