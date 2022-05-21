<?php
    session_start();
    if(!isset ($_SESSION['user'])){
        die('Ошибка: не авторизован');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel = "stylesheet" href="../styles/main.css">
    <script type = text/javascript src="scripts/script.js"></script>
</head>

<header>
    <p><a href="game/main.php" class = "menu">Играть</a></p>
    <?php
    if($_SESSION['user']['admin']){                             //Когда мы обращемся к первой скобке ['user'], то обращаемся к массиву. Когда - ко второй ['admin'], то полю
        echo '<p><a href="table_users.php" class = "menu">Admin panel</a></p>';
    }
    ?>
    <p class = "menu"><?= $_SESSION['user']['name'] ?></p>
    <p><a href="vendor/logout.php" class = "menu">Выйти</a></p>

</header>

<body>

<form>
    <img src = "<?= $_SESSION['user']['avatar']?>" width="200">
    <h2><?= $_SESSION['user']['name']?></h2>
    <p>Рекорд: <?= $_SESSION['user']['record']?></p>
</form>

</body>
</html>