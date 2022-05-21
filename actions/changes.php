<?php
    session_start();
    require_once '../vendor/connect.php';
    DB::getInstance();

    /*unset($_SESSION['message']);
    unset($_SESSION['flag']);*/

    $user = DB::query('SELECT * FROM `users` WHERE `id` = '.'"'. $_GET['id']. '"');

    $user = mysqli_fetch_assoc($user);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Редактирование данных</title>
    <link rel = "stylesheet" href="../styles/main.css">
    <script type = text/javascript src="../scripts/script.js"></script>
</head>

<header>
    <?php
    if($_SESSION['flag']){
        echo '<p class = "message-success"> '. $_SESSION['message'] .'</p>';
    } else if ($_SESSION['flag'] === false){
        echo '<p class = "message"> '. $_SESSION['message'] .'</p>';
    }
    ?>
    <p><a href="../table_users.php" class = "menu">Admin panel</a></p>
    <p><a href="../vendor/logout.php" class = "menu">Выйти</a></p>

</header>

<body>

<form action = "../vendor/update.php" method="post" enctype="multipart/form-data">
    <input type = "hidden" name = "id" value="<?php echo $user['id']?>">
    <div class = "input-wrapper" >
        <h2>Редактирование данных</h2>
        <label>Сменить имя</label>
        <input type = "text" id = "name" placeholder="Новое имя" name = "name" value="<?php echo $user['name']?>">

        <label>Сменить логин</label>
        <input type = "text" id = "login" name = "login" placeholder="Новый логин" value="<?php echo $user['login']?>">

        <label>Сменить пароль</label>
        <div id = "passimg">
            <input type = "password" id = "password" name = "password" placeholder="Новый пароль">
            <div class = "input-icon" id = "icon" onclick="showPassword()">
                <img src = "../image/imageAuto/eye.png">
            </div>
        </div>

        <div id = "passimg">
            <input type = "password" id = "repeat_password" name = "repeat_password" placeholder="Повторите новый пароль" value>
        </div>

        <label>Сменить фотография профиля</label>
        <div>
            <input type = "file" name = "avatar" id = "photo">
        </div>

        <button style="cursor: pointer" type="submit">Сохранить изменения</button>

    </div>
</form>

</body>
</html>