<?php
    session_start();
    if(!($_SESSION['user']['admin']) ){
        die('Ошибка: не авторизован');
    }

    require_once 'vendor/connect.php';                                  //обязательная подключения файла ОДИН РАЗ
    DB::getInstance();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel = "stylesheet" href="styles/main.css">
    <script type = text/javascript src="scripts/script.js"></script>
</head>

<header>
    <?php
        if($_SESSION['flag']){
            echo '<p class = "message-success"> '. $_SESSION['message'] .'</p>';
        } else if ($_SESSION['flag'] === false){
            echo '<p class = "message"> '. $_SESSION['message'] .'</p>';
        }
        unset($_SESSION['message']);
        unset($_SESSION['flag']);
    ?>

    <?php
    if($_SESSION['user']['admin']){                             //Когда мы обращемся к первой скобке ['user'], то обращаемся к массиву. Когда - ко второй ['admin'], то полю
        echo '<p><a href="prophile.php" class = "menu">Профиль</a></p>';
    }
    ?>
    <p class = "menu"><?= $_SESSION['user']['name'] ?></p>
    <p><a href="vendor/logout.php" class = "menu">Выйти</a></p>
</header>

<body style="margin-top:100px">
    <table>
        <?php
            $request_user = DB::query("SELECT * FROM `users`"); // SQL запрос

            echo '<tr><td>id</td><td>login</td><td>avatar</td><td>record</td><td>name</td><td style = "width: 200px">Действия</td></tr>';

            while($user = mysqli_fetch_array($request_user)){
                echo '<tr><td>'.$user['id'].'</td><td>'.$user['login'].'</td><td id = "avatar_img">'.
                '<img style = "width: 100px" src = '.$user['avatar'].'></td><td>'.$user['record'].'</td><td>'.$user['name'].
                    '</td>'.
                        '<td>'.
                            '<div class = "actions">'.
                                '<a  style = "cursor: pointer" onclick = "confirmWindow('.$user['id'].');"><img src = "../image/imageAuto/delete.png" ></a>'.
                                '<a href = "actions/changes.php?id='.$user['id'].'"><img src = "../image/imageAuto/change.png"></a>'.
                            '</div>'.
                        '</td>'.
                 '</tr>';
            }
        ?>
    </table>

</body>
</html>