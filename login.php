<?php

session_start();

require "ConfigDB.php";

$username = '';
$password = '';


define('REQUIED_FIELD_ERROR','Это поле обязательно к заполнению ');
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST'){


    $username = post_date("username");
    $password = post_date("password");


    if (!$username){
        $errors['username'] = REQUIED_FIELD_ERROR;
    }else if (strlen($username) < 6 || strlen($username) > 16){
        $errors['username'] = 'Имя пользователя должно быть больше 6 или меньше 4 символов';
    }

    if (!$password){
        $errors['password'] = REQUIED_FIELD_ERROR;
    }

}





if (empty($errors)){

    if (isset($_POST['username']) and isset($_POST['password'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM userlog WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($link,$query);
        var_dump($result);

        if ($result === false || mysqli_num_rows($result) === 0){

            $_SESSION['message'] = 'Ошибка авторизации';

        }else{

            $_SESSION['message'] = 'Авторизация прошла успешно';

        }

    }

}

function post_date($field){

    $_POST[$field] ??= '';

    return htmlspecialchars(stripcslashes($_POST[$field]));
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<header class="page-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Главная</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Registr.php">Регистрация</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    Окно входа:
                </span>
            </div>
        </div>
    </nav>
</header>

<form action="" method="post" novalidate>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Имя Пользователя</label>
                <input class="form-control <?php echo isset($errors['username']) ? 'is-invalid' : '' ?>"
                       name="username" value="<?php echo $username ?>">
                <small class="form-text text-muted">Мин: 6 или Макс: 16 символов</small>
                <div class="invalid-feedback">
                    <?php echo $errors['username'] ?? ''?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Пароль</label>
                <input type="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : '' ?>"
                       name="password" value="<?php echo $password ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['password'] ?? ''?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
    </div>
    <br>
    <div class="form-group">
        <button class="btn btn-primary">Войти</button>
    </div>
    <div class="toast-body">
        <?php if (isset($_SESSION['message'])){

            if ($_SESSION['message']){

                echo $_SESSION['message'];
            }
            unset($_SESSION['message']);
        } ?>
    </div>
</form>
</body>
</html>