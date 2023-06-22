<?php  


namespace App\master;

use Pecee\SimpleRouter\SimpleRouter;

use Closure;
use Pecee\Exceptions\InvalidArgumentException;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Route\IGroupRoute;
use Pecee\SimpleRouter\Route\IRoute;
use Pecee\SimpleRouter\Route\RouteGroup;
use Pecee\SimpleRouter\Route\RouteUrl;

class Router extends SimpleRouter{

    /**
     * Route the given url to your callback on GET request method.
     *
     * @param string $url
     * @param string|array|Closure $callback
     * @param array|null $settings
     *
     * @return RouteUrl|IRoute
     */
    public static function get(string $url, $callback, array $settings = null): IRoute
    {
      $url = BASE_URL .'/'.$url;
      return static::match([Request::REQUEST_TYPE_GET], $url, $callback, $settings);
    }




    /**
     * Route the given url to your callback on POST request method.
     *
     * @param string $url
     * @param string|array|Closure $callback
     * @param array|null $settings
     * @return RouteUrl|IRoute
     */
    public static function post(string $url, $callback, array $settings = null): IRoute
    {
       $url = BASE_URL .'/'.$url;
        return static::match([Request::REQUEST_TYPE_POST], $url, $callback, $settings);
    }

    /**
     * Route the given url to your callback on PUT request method.
     *
     * @param string $url
     * @param string|array|Closure $callback
     * @param array|null $settings
     * @return RouteUrl|IRoute
     */
    public static function put(string $url, $callback, array $settings = null): IRoute
    {
      $url = BASE_URL .'/'.$url;
        return static::match([Request::REQUEST_TYPE_PUT], $url, $callback, $settings);
    }

    /**
     * Route the given url to your callback on PATCH request method.
     *
     * @param string $url
     * @param string|array|Closure $callback
     * @param array|null $settings
     * @return RouteUrl|IRoute
     */
    public static function patch(string $url, $callback, array $settings = null): IRoute
    {
      $url = BASE_URL .'/'.$url;
        return static::match([Request::REQUEST_TYPE_PATCH], $url, $callback, $settings);
    }

    /**
     * Route the given url to your callback on OPTIONS request method.
     *
     * @param string $url
     * @param string|array|Closure $callback
     * @param array|null $settings
     * @return RouteUrl|IRoute
     */
    public static function options(string $url, $callback, array $settings = null): IRoute
    {
      $url = BASE_URL .'/'.$url;
        return static::match([Request::REQUEST_TYPE_OPTIONS], $url, $callback, $settings);
    }

    /**
     * Route the given url to your callback on DELETE request method.
     *
     * @param string $url
     * @param string|array|Closure $callback
     * @param array|null $settings
     * @return RouteUrl|IRoute
     */
    public static function delete(string $url, $callback, array $settings = null): IRoute
    {
      $url = BASE_URL .'/'.$url;
        return static::match([Request::REQUEST_TYPE_DELETE], $url, $callback, $settings);
    }

    /**
     * Groups allows for encapsulating routes with special settings.
     *
     * @param array $settings
     * @param Closure $callback
     * @return RouteGroup|IGroupRoute
     * @throws InvalidArgumentException
     */
    public static function group(array $settings, Closure $callback): IGroupRoute
    {
        $group = new RouteGroup();
        $group->setCallback($callback);
        $group->setSettings($settings);

        static::router()->addRoute($group);

        return $group;
    }
}