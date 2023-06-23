<?php
namespace App\Middlewares;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;
session_start();
class Auth implements IMiddleware
{
	public function handle(Request $request) : void
	{
		if (strpos($_SESSION['auth'], shishirEnv("APP_KEY")) !== false){
			$request->authenticated = true;
		}else{
			$url = $_ENV["APP_URL"]."/".$_ENV["BASE_URL"]."/login";
			?><script type="text/javascript">
				window.location.href = "<?= $url; ?>";
			</script><?php
			die();
		}
	}
}

