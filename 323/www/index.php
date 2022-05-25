<?php
    spl_autoload_register(function (string $classsName){
        require_once __DIR__.'/../src/'.str_replace('\\', '/', $classsName).'.php';
    });

    $route = $_GET['route'] ?? '';
    $routes = require 'routes.php';
    $isRouteFound = false;
    foreach($routes as $pattern => $controllerAndAction){
        preg_match($pattern, $route, $matches);
        if (!empty($matches)) {
            $isRouteFound = true;
            break;
        }
    }
    if (!$isRouteFound) {
        echo 'Страница не найдена';
        return;
    }
    unset($matches[0]);
    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];

    $controller = new $controllerName();
    $controller->$actionName(...$matches);
    
   
    // if (!empty($matches)) $controller->sayHello($matches[1]);
   
    
    // preg_match($pattern, $route, $matches);
    // if (!empty($matches)) {
    //     $controller->main();
    //     return;
    // }

    // echo 'Страница не найдена';
   
   
    // if (isset($_GET['name'])) 
    //     $controller->sayHello($_GET['name']);
    // else $controller->main();
    // require __DIR__.'/../src/MyProject/Models/Users/User.php';
    // require __DIR__.'/../src/MyProject/Models/Articles/Article.php';
    // $author = new MyProject\Models\Users\User('Sasha');
    // $article = new MyProject\Models\Articles\Article('Title', 'Text', $author);
    // var_dump($article);
?>