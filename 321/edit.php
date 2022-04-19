<?php
    $my_db = mysqli_connect('localhost', 'root', '', 'friends');
    if (mysqli_connect_errno()) echo 'Ошибка подключения к БД'. mysqli_connect_error();

    $sql = 'SELECT `id`, `surname`, LEFT(`name`,1) as `name` FROM `notebook`';
    $sql_res = mysqli_query($my_db, $sql);
    if (mysqli_errno($my_db)) echo 'Ошибка запроса';
    else while($row = mysqli_fetch_assoc($sql_res)){
        echo '<div class="div-edit"><a href="?p=edit&id='.$row['id'].'">'.$row['surname'].' '.$row['name'].'.</a></div>';
    }
    include 'form.php';

?>