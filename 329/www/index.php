<?php
    // require '../src/MyProject/Models/Users/User.php';
    // require '../src/MyProject/Models/Articles/Article.php';
    spl_autoload_register(function (string $className){
        require_once '../src/'.str_replace('\\', '/', $className).'.php';
    });

    @$route = $_GET['route'];
    $routes = require 'routes.php';

    $isRouteFound = false;
    foreach($routes as $pattern => $controllerAndAction){
        preg_match($pattern, $route, $matches);
        if (!empty($matches)){
            $isRouteFound = true;
            break;
        }
    }

    if (!$isRouteFound) {
        echo 'Страница не найдена!';
        return;
    }

    unset($matches[0]);
    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];

    $controller = new $controllerName();
    $controller->$actionName(...$matches);

    // $user = new MyProject\Models\Users\User('Sasha');
    // $article = new MyProject\Models\Articles\Article('Заголовок 1', 'Текст 1', $user);
    // var_dump($article);
?>