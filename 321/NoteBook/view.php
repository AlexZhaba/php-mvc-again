<?php
    function getFriendList($sort, $page){
        $my_db = mysqli_connect('localhost', 'root', '', 'friends');
        if (mysqli_connect_errno()) echo 'Ошибка подключения к БД'. mysqli_connect_error();

        $sql = 'SELECT COUNT(*) FROM `notebook`';
        $sql_res = mysqli_query($my_db, $sql);
        if (mysqli_errno($my_db)) return 'Ошибка запроса';

        if (!$row = mysqli_fetch_row($sql_res)) return 'Записей нет';
        $pages = ceil($row[0]/10);
        if ($pages >= $row[0]) $page = $pages - 1;

        if ($_GET['sort'] == 'byid') $sql = 'SELECT * FROM `notebook` ORDER BY `id` LIMIT '.($page*10).', 10';
        if ($_GET['sort'] == 'surn') $sql = 'SELECT * FROM `notebook` ORDER BY `surname` LIMIT '.($page*10).', 10';
        $sql_res = mysqli_query($my_db, $sql);

        $result = '<table>';
        $result .= '<tr><td>ID</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Пол</td><td>Дата рождения</td><td>Телефон</td>
            <td>Адрес</td><td>Email</td><td>Комментарий</td></tr>';
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
        if( $pages>1 ) // если страниц больше одной – добавляем пагинацию
            {
                $result.='<div id="pages">'; // блок пагинации
                for($i=0; $i<$pages; $i++) // цикл для всех страниц пагинации
                if( $i != $page ) // если не текущая страница
                $result.='<a href="?sort='.$_GET['sort'].'&p=view&pg='.$i.'">'.($i+1).'</a>';
                else // если текущая страница
                $result.='<b>'.($i+1).'</b>';
                $result.='</div>';
            }
        return $result;
    }
?>