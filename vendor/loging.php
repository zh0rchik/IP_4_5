<!--логиниться-->
<?php
    session_start();
    require_once '../vendor/connect.php';                                  //обязательная подключения файла ОДИН РАЗ
    DB::getInstance();

    $login = $_POST['login'];
    $password = $_POST['password'];
    $password = md5($password);

    $request_user = DB::query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'"); // SQL запрос

    if(mysqli_num_rows($request_user) > 0){

        $user = mysqli_fetch_assoc($request_user);

       $_SESSION['user'] = [
           "id" => $user['id'],            //сохраняет id пользователя
           "name" => $user['name'],
           "login" => $user['login'],
           "avatar" => $user['avatar'],
           "record" => $user['record'],
           "admin" => $user['type_user']
       ];

       header('Location: ../prophile.php');

    } else {
        $_SESSION['message'] = 'Ошибка: невеверный логин или пароль';  //$_SESSION - массив, который хранит данные сессии, которые сам туда закинешь
        $_SESSION['flag'] = false;
        header('Location: ../index.php');            //header() - функция, указывающая параметр запроса.
    }

?>
