<?php
class MainController {
    protected function render($view, $data = []) {
        // build view file path
        $viewFile = __DIR__ . '/../modules/views/' . $view . '.php';

        if (!file_exists($viewFile)) {
            throw new Exception("View not found: " . $viewFile);
        }

        // variables
        extract($data);

        // buffer content
        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        // layout
        require __DIR__ . '/../modules/views/layout.php';
    }

    function helperUrl($params = []) {
        $controller = $params['controller'] ?? 'index';
        $action     = $params['action'] ?? 'index';
        $url = rtrim(BASE_URL, '/') . '/' . $controller . '/' . $action;

        if (!empty($params['data']) && is_array($params['data'])) {
            $url .= '?' . http_build_query($params['data']);
        }

        return $url;
    }
}
