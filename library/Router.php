<?php
class Router {
    private $controller = 'IndexController';
    private $action = 'indexAction';

    public function __construct($url) {
        $parts = explode('/', trim($url, '/'));

        if (!empty($parts[0]))
            $this->controller = 'controllers_' . $parts[0] . 'Controller';
        if (!empty($parts[1]))
            $this->action = $parts[1] . 'Action';
    }

    public function dispatch() {
        require_once 'DV_Controllers.php';
        if (class_exists($this->controller)) {
            $controller = new $this->controller();
            if (method_exists($controller, $this->action))
                $controller->{$this->action}();
            else
                echo "Action {$this->action} not found!";
        } else
            Logger::logDebugInformation("Controller {$this->controller} not found!");
    }
}
