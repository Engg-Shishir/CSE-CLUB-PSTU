<?php
namespace App\Middlewares;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

session_start();
class Guest implements IMiddleware
{
	public function handle(Request $request): void
	{
		if(isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {
			$url = $_ENV["APP_URL"]."/".$_ENV["BASE_URL"];
			?><script type="text/javascript">
				window.location.href = "<?= $url; ?>";
			</script><?php
			die();
	 }else{
		$request->authenticated = true;
	 }


	}
}