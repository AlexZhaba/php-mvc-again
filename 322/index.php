<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
        require 'menu.php';
    ?>
    <main>
        <?php
            if ($_GET['p'] == 'view'){
                include 'view.php';
                if(!isset($_GET['pg'])) $_GET['pg'] = 0;
                echo getFriendList($_GET['pg']);
            } 
            else if (file_exists($_GET['p'].'.php')) include $_GET['p'].'.php';
        ?>
    </main>
</body>
</html>