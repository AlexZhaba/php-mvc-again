<?php
    echo '<header>';
        if (!isset($_GET['p'])) $_GET['p'] = 'view';
        echo '<a href="?p=view"';
        if($_GET['p'] == 'view') echo 'class="select"';
        echo '>Просмотр</a>';
        echo '<a href="?p=add"';
        if($_GET['p'] == 'add') echo 'class="select"';
        echo '>Добавление записи</a>';
        echo '<a href="?p=edit"';
        if($_GET['p'] == 'edit') echo 'class="select"';
        echo '>Редактирование записи</a>';
        echo '<a href="?p=delete"';
        if($_GET['p'] == 'delete') echo 'class="select"';
        echo '>Удаление записи</a>';
    echo '</header>';
    echo '<div class="submenu">';
        if ($_GET['p'] == 'view'){
        if (!isset($_GET['sort'])) $_GET['sort'] = 'byid';
        echo '<a href="?p=view&sort=byid"';
        if ($_GET['sort'] == 'byid') echo 'class="select"';
        echo '>По-умолчанию</a>';
        echo '<a href="?p=view&sort=surn"';
        if ($_GET['sort'] == 'surn') echo 'class="select"';
        echo '>По фамилии</a>';
    }
    
    echo '</div>';
?>