<?php
    require_once '../vendor/connect.php';
    DB::getInstance();

    DB::query('DELETE FROM `users` WHERE `id` = '.'"'. $_GET['id']. '"');

    header('Location: ../table_users.php');
?>