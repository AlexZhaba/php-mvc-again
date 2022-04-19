<?php
    include 'form.php';
    $my_db = mysqli_connect('localhost', 'root', '', 'friends');
    if (mysqli_connect_errno()) echo 'Ошибка подключения к БД'. mysqli_connect_error();
    
    if (isset($_POST['button']) && $_POST['button'] == 'Добавить запись'){
        $sql = 'INSERT INTO `notebook`(`surname`, `name`, `lastname`, `gender`, `date`, `phone`, `location`, `email`, `comment`) 
            VALUES ("'.htmlspecialchars($_POST['surname']).'","'.htmlspecialchars($_POST['name']).'",
            "'.htmlspecialchars($_POST['lastname']).'","'.htmlspecialchars($_POST['gender']).'",
            "'.htmlspecialchars($_POST['date']).'","'.htmlspecialchars($_POST['phone']).'",
            "'.htmlspecialchars($_POST['location']).'","'.htmlspecialchars($_POST['email']).'","'.htmlspecialchars($_POST['comment']).'")';

    $sql_res = mysqli_query($my_db, $sql);
    if (mysqli_errno($my_db)) echo 'Ошибка запроса';
    else echo '<div class = "success">Запись добавлена';
    }
    
?>