<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel = "stylesheet" href="../styles/main.css">
    <script type = text/javascript src="scripts/script.js"></script>
</head>
<header><p><a href="index.php" class = "menu">Войти</a></p></header>
<body>

<form action = "vendor/registering.php" method="post" enctype="multipart/form-data">
    <div class = "input-wrapper">
        <h2>Регистрация</h2>
        <label>Имя</label>
        <input type = "text" id = "name" placeholder="Ф.И.О." name = "name">

        <label>Логин</label>
        <input type = "text" id = "login" name = "login" placeholder="Придумайте логин">

        <label>Пароль</label>
        <div id = "passimg">
            <input type = "password" id = "password" name = "password" placeholder="Придумайте пароль">
            <div class = "input-icon" id = "icon" onclick="showPassword()">
                <img src = "image/imageAuto/eye.png">
            </div>
        </div>

        <div id = "passimg">
            <input type = "password" id = "repeat_password" name = "repeat_password" placeholder="Повторите пароль">
        </div>

        <label>Фотография профиля</label>
        <div>
            <input type = "file" name = "avatar" id = "photo">
        </div>

        <button style="cursor: pointer" type="submit">Зарегестрироваться</button>

        <!-- Окно ошибки -->
        <?php
            if($_SESSION['message']){
                echo '<p class = "message"> '. $_SESSION['message'] .'</p>';
            }
            unset($_SESSION['message']);
        ?>

    </div>
</form>

</body>
</html>