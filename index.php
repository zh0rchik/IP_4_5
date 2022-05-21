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

<body>

    <form action = "vendor/loging.php" method="post">
        <div class = "input-wrapper">
            <h2>Welcome to the club buddy</h2>
            <label>Логин</label>
            <input type = "text" id = "login" name = "login" placeholder="Введите логин">

            <label>Пароль</label>
            <div id = "passimg">
                <input type = "password" name = "password" id = "password" placeholder="Введите пароль">
                <div class = "input-icon" id = "icon" onclick="showPassword()">
                    <img src = "../image/imageAuto/eye.png">
                </div>
            </div>
            <!-- для того, чтобы подтведрдить отправку данных -->
            <button style="cursor: pointer" type = "submit">Войти</button>
            <!-- Окно ошибки -->
            <?php
                if($_SESSION['flag']){
                    echo '<p class = "message-success"> '. $_SESSION['message'] .'</p>';
                } else if ($_SESSION['flag'] === false){
                    echo '<p class = "message"> '. $_SESSION['message'] .'</p>';
                    echo '<a href = "register.php">Зарегестрироваться</a>';
                } else{
                    echo '<a href = "register.php">Зарегестрироваться</a>';
                }
                unset($_SESSION['message']);
                unset($_SESSION['flag']);
            ?>

        </div>
    </form>

</body>
</html>