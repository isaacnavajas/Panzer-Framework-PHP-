<?php

require_once('./Honoo/http.php');
require_once('./App/Routers/web.php');
require_once('./Honoo/ORMBear/HelpersBear/passwordEncryption.php');

class Kernel{
    //Ejecutar la aplicación y la lógica del router
    public function coreRouter() {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        
        $route = Http::route($url, $method);
        $controllerName = $route['controller'];
        $method = $route['method'];
        
        $controller = new $controllerName();
        $params = isset($route['params']) ? $route['params'] : [];
        call_user_func_array([$controller, $method], $params);
    }
    
    public function helpers(){
        //echo "logica de helpers";
    }
    
    public function env(){
        $env_file = __DIR__ . '/../.env';
        if (file_exists($env_file)) {
            $lines = file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0) continue; // Saltar comentarios
                list($key, $value) = explode('=', $line, 2);
                putenv("$key=$value");
            }

        } else {
            echo "Error: No se encontró el archivo .env";
        }
    }

}
