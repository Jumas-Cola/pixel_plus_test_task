<?php

namespace App\Classes;

/**
 * Class RequestHandler
 * @author yourname
 */
class RequestHandler
{
    protected $request;
    protected $server;
    protected $routes;

    /**
     * @param $request
     */
    public function __construct($request, $server)
    {
        $this->request = $request;
        $this->server = $server;
        $this->routes = [];
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->routes as $route) {
            if (
                preg_match(
                    "/" . trim($route["path"], "/") . "/",
                    trim($this->server["PATH_INFO"], "/"),
                    $match
                )
            ) {
                header("Content-Type: application/json");
                echo $route["callback"]($this->request);
            }
        }
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function registerRoute($path, $callback)
    {
        $this->routes[] = [
            "path" => $path,
            "callback" => $callback,
        ];
    }
}
