<?php
    namespace MyProject\Controllers;
    use MyProject\View\View;

    class MainController{
        private $view;
        public function __construct(){
            $this->view = new View(__DIR__.'/../../../templates');
        }
        public function main(){
            $articles = [
                ['title' => 'Заголовок 1', 'text' => 'Текст 1'],
                ['title' => 'Заголовок 2', 'text' => 'Текст 2'],
            ];
            $this->view->renderHtml('main/main.php', ['articles' => $articles]);
        }
        public function sayHello(string $name){
            $this->view->renderHtml('main/hello.php', ['name' => $name]);
        }
        public function sayBye(string $name){
            echo 'Hello, '.$name;
        }
    }
?>