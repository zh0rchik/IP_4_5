<!--выход-->
<?php
    session_start();
    unset($_SESSION['user']);// уничтожение переменной
    header('Location: ../index.php');// установка заголовка запроса
?>