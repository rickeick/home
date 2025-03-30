<?php
final class Router {
    private $routes;

    public final function __construct($routes) {
        $this->routes = $routes;
    }

    public final function handle_request($url) : void {
        if (isset($this->routes[$url])) {
            $configs = $this->routes[$url];
            if (count($configs) === 2) {
                $source = $configs[0];
                $action = $configs[1];
                $class = $source.'Controller';
                $file = "app/controllers/$class.php";
                if (file_exists($file)) {
                    require_once $file;
                    $controller = new $class;
                    if (method_exists($controller, $action)) {
                        $controller->{$action}();
                        return;
                    }
                }
            }
        }
        require dirname(__DIR__).'/views/message.php';
    }
}
?>
