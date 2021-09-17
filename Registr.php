<?php

session_start();
require "ConfigDB.php";

$username = '';
$email = '';
$password = '';
$password_confirm = '';

define('REQUIED_FIELD_ERROR', 'Это поле обязательно к заполнению ');
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST'){


    $username = post_date("username");
    $email = post_date("email");
    $password = post_date("password");
    $password_confirm = post_date("password_confirm");


    if (!$username){
        $errors['username'] = REQUIED_FIELD_ERROR;
    }else if (strlen($username) < 6 || strlen($username) > 16){
        $errors['username'] = 'Имя пользователя должно быть больше 6 или меньше 4 символов';
        }

    if (!$email){
        $errors['email'] = REQUIED_FIELD_ERROR;
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Не верный email адрес';
        }

    if (!$password){
        $errors['password'] = REQUIED_FIELD_ERROR;
    }
    if (!$password_confirm){
        $errors['password_confirm'] = REQUIED_FIELD_ERROR;
    }
    if ($password && $password_confirm && strcmp($password,$password_confirm) !==0){
        $errors['password_confirm'] = 'Пароли не совподают';
    }

    if (empty($errors)){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "INSERT INTO `userlog` (`id`, `username`, `email`, `password`) VALUES (NULL, '$username', '$email', '$password')";
        mysqli_query($link,$query);

        $_SESSION['message'] = 'Регистрация прошла успешно';

        header("Location: login.php");
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
    <title>Регистрация</title>
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
                            <a class="nav-link active" aria-current="page" href="login.php">Вход</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        Окно регистрации:
                    </span>
                </div>
            </div>
        </nav>
    </header>
<main>
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
        <div class="col">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : '' ?>" name="email"
                       name="email" value="<?php echo $email ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['email'] ?? ''?>
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
        <div class="col">
            <div class="form-group">
                <label>Повторите Пароль</label>
                <input type="password"
                       class="form-control <?php echo isset($errors['password_confirm']) ? 'is-invalid' : '' ?>"
                       name="password_confirm" value="<?php echo $password_confirm ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['password_confirm'] ?? ''?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
    </div>
         <br>
    <div class="form-group">
        <button class="btn btn-primary">Регистрация</button>
    </div>
    </form>
</main>

</body>
</html>