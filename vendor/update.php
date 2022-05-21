<!--берёт из формы данные и заносит-->
<?php
    session_start();                                              // начало сессии
    require_once '../vendor/connect.php';                                  //обязательная подключения файла ОДИН РАЗ

    DB::getInstance();
        //Заносим SQL запрос на добавление. DB - класс, который мы используем для работы с базой данных.
        //

        //меняем в БД
    function restart($id){
        $request_user = DB::query("SELECT * FROM `users` WHERE `id` = '$id'"); // SQL запрос
        $user = mysqli_fetch_assoc($request_user);
        $_SESSION['user'] = [
                "id" => $user['id'],            //сохраняет id пользователя
                "name" => $user['name'],
                "login" => $user['login'],
                "avatar" => $user['avatar'],
                "record" => $user['record'],
                "admin" => $user['type_user']
        ];
    }

    $user_id = $_POST['id'];
    unset($_SESSION['message']);
    unset($_SESSION['flag']);

    if(!empty($_POST['login'])){                  //Провекрка пустоты
        $checkLogin = DB::query("SELECT * FROM `users` WHERE `login` = ".'"'. $_POST['login']. '"');
        $checkById = DB::query("SELECT * FROM `users` WHERE `id` = ".'"'. $_POST['id']. '"');
        $loginById = mysqli_fetch_assoc($checkById)['login'];
        $idCheck = mysqli_fetch_assoc($checkById)['id'];

        if($loginById !== $_POST['login'] && mysqli_num_rows($checkLogin) > 0){
            $_SESSION['message'] = 'Ошибка: такой логин уже существует';
            $_SESSION['flag'] = false;
        }else if($loginById !== $_POST['login'] && mysqli_num_rows($checkLogin) === 0){
            DB::query("UPDATE `users` SET `login` =" .'"'.$_POST['login'].'"'.'WHERE `id` = '.'"'. $_POST['id']. '"');
            if (!$_SESSION['user']['admin']) {
                $_SESSION['user']['login']= $_POST['login'];
            } else if($_POST['id'] === $_SESSION['user']['id']){
                restart($_POST['id']);
            }
            $_SESSION['message'] = 'Данные изменены';
            $_SESSION['flag'] = true;
        }
    }

    if(($_SESSION['flag'] !== false)&&(!empty($_POST['password']))){                  //Провекрка пустоты
        if ($_POST['password'] === $_POST['repeat_password']){
            DB::query("UPDATE `users` SET `password` =" .'"'.md5($_POST['password']).'"'.'WHERE `id` = '.'"'. $_POST['id']. '"');
            $_SESSION['message'] = 'Данные изменены';
            $_SESSION['flag'] = true;
        } else {
            $_SESSION['message'] = 'Ошибка: пароли не совпадают.';  //$_SESSION - массив, который хранит данные сессии, которые туда закидываются
            $_SESSION['flag'] = false;
        }
    }

    if(($_SESSION['flag'] !== false)&&(!empty($_FILES['avatar']['name']))){                  //Провекрка пустоты
         $path = 'uploads/'. time(). $_FILES['avatar']['name'];

        if (!move_uploaded_file($_FILES['avatar']['tmp_name'],  '../'.$path)){
            $_SESSION['message'] = 'Ошибка при загрузке фотографии';
            $_SESSION['flag'] = false;
        }

        $checkById = DB::query("SELECT * FROM `users` WHERE `id` = ".'"'. $_POST['id']. '"');
        $idCheck = mysqli_fetch_assoc($checkById)['id'];
        DB::query("UPDATE `users` SET `avatar` =" .'"'.$path.'"'.'WHERE `id` = '.'"'. $_POST['id']. '"');
        if (!$_SESSION['user']['admin']) {
            $_SESSION['user']['avatar']= $path;
        }else if($_POST['id'] === $_SESSION['user']['id']){
            restart($_POST['id']);
        }
        $_SESSION['message'] = 'Данные изменены';
        $_SESSION['flag'] = true;
    }

    if(($_SESSION['flag'] !== false)&&!empty($_POST['name'])){                  //Провекрка пустоты
        $checkName = DB::query("SELECT * FROM `users` WHERE `name` = ".'"'. $_POST['name']. '"');
        $name = mysqli_fetch_assoc($checkName)['name'];
        $checkById = DB::query("SELECT * FROM `users` WHERE `id` = ".'"'. $_POST['id']. '"');
        $idCheck = mysqli_fetch_assoc($checkById)['id'];

        if ($_POST['name'] !== $name) {
            DB::query("UPDATE `users` SET `name` =" .'"'.$_POST['name'].'"'.'WHERE `id` = '.'"'. $_POST['id']. '"');
            if (!$_SESSION['user']['admin']) {
                $_SESSION['user']['name']= $_POST['name'];
            } else if($_POST['id'] === $_SESSION['user']['id']){
                restart($_POST['id']);
            }
            $_SESSION['message'] = 'Данные изменены';
            $_SESSION['flag'] = true;
        }
    }

    if (($_SESSION['flag'] !== false)) {
        header('Location: ../table_users.php');
    } else {
        header('Location: ../actions/changes.php?id='.$user_id);
    }


?>

