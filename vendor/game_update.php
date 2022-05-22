<?php
    session_start();
    require_once 'connect.php';

    DB::getInstance();

    $user = DB::query("SELECT * FROM `users` WHERE `login` = ".'"'. $_SESSION['user']['login']. '"');

    $user = mysqli_fetch_assoc($user);
    $old_record = $user['record'];

    if($old_record < $_POST['count']){
        DB::query("UPDATE `users` SET `record` =" .'"'.$_POST['count'].'"'.'WHERE `login` = '.'"'. $_SESSION['user']['login']. '"');
        $_SESSION['user']['record'] = $_POST['count'];
    }
?>