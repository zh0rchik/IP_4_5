<!--берёт из формы данные и заносит-->
<?php
    session_start();                                              // начало сессии
    require_once '../vendor/connect.php';                                  //обязательная подключения файла ОДИН РАЗ

    DB::getInstance();

    $name = $_POST['name'];                                     //$_POST - скрывает передваемые данные
    $login = $_POST['login'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    $checkLogin = DB::query("SELECT * FROM `users` WHERE `login` = '$login'");

    if(mysqli_num_rows($checkLogin) > 0){
        $_SESSION['message'] = 'Ошибка: такой логин уже существует';
        header('Location: ../register.php');
    } else{
        if ($password === $repeat_password){                        // условие на проверку паролей на идентичность
            //con..
            $path = 'uploads/'. time(). $_FILES['avatar']['name'];

            if (!move_uploaded_file($_FILES['avatar']['tmp_name'],  '../'.$path)){
                $_SESSION['message'] = 'Ошибка: не удалось загрузить фотографию';
                header('Location: ../register.php');
            }

            //Заносим SQL запрос на добавление. DB - класс, который мы используем для работы с базой данных.
            $password = md5($password);

            DB::query("INSERT INTO `users` (`id`, `name`, `login`, `password`, `avatar`, `record`, `type_user`) VALUES (NULL, '$name', '$login', '$password', '$path', 0, 0)");


            $_SESSION['message'] = 'Регестрация прошла успешно';
            $_SESSION['flag'] = true;
            $_SESSION['admin'] = false;
            header('Location: ../index.php');

        } else {
            $_SESSION['message'] = 'Ошибка: пароли не совпадают.';  //$_SESSION - массив, который хранит данные сессии, которые туда закидываются
            $_SESSION['flag'] = false;
            header('Location: ../register.php');            //header() - функция, указывающая параметр запроса.
        }

    }


?>

