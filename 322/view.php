<?php
    function getFriendList($page){
        $my_db = mysqli_connect('localhost', 'root', '', 'friends');
        if (mysqli_connect_errno()) echo 'Ошибка подключения к БД'. mysqli_connect_error();

        $sql = 'SELECT COUNT(*) FROM `notebook`';
        $sql_res = mysqli_query($my_db, $sql);
        if (mysqli_errno($my_db)) return 'Ошибка запроса';
        if (!$row = mysqli_fetch_row($sql_res)) return 'В таблице нет записей';
        $pages = ceil($row[0]/10);
        if ($pages >= $row[0]) $page = $pages-1;
        
        if($_GET['sort'] == 'byid') $sql = 'SELECT * FROM `notebook` ORDER BY `id` LIMIT '.($page*10).',10';
        if($_GET['sort'] == 'surn') $sql = 'SELECT * FROM `notebook` ORDER BY `surname` LIMIT '.($page*10).',10';
        $sql_res = mysqli_query($my_db, $sql);
        if (mysqli_errno($my_db)) return 'Ошибка запроса';

        $result = '<table>';
        $result .= '<tr><th>ID</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Пол</th><th>Дата рождения</th>
        <th>Телефон</th><th>Адрес</th><th>Email</th><th>Комментарий</th></tr>';

        while($row = mysqli_fetch_assoc($sql_res)){
            $result .= '<tr><td>'.$row['id'].'</td>
                        <td>'.$row['surname'].'</td>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['lastname'].'</td>
                        <td>'.$row['gender'].'</td>
                        <td>'.$row['date'].'</td>
                        <td>'.$row['phone'].'</td>
                        <td>'.$row['location'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['comment'].'</td></tr>';
        }
        $result .= '</table>';

        $result .= '<div>';
        for ($i = 0; $i < $pages; $i++){
            if ($i == $page) $result .= '<b>'.($i+1).'</b>';
            else $result .= '<a href="?p=view&sort='.$_GET['sort'].'&pg='.$i.'">'.($i+1).'</a>';
        }
        $result .= '</div>';

        return $result;
    }
?>