<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Главная страница</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
  <header class="page-header">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
              <a class="navbar-brand" href="login.php">Вход</a>
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
                      Таблица учёта пользователей:
                  </span>
              </div>
          </div>
      </nav>
  </header>
  <main>
    <table class="table table-bordered" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Возраст</th>
      <th scope="col">Зарплата</th>
      <th scope="col">Стаж</th>
      <th scope="col">Действие</th>

        <?php
        require "ConfigDB.php";
        require "func.php";


        // Получение данных:
        $query = "SELECT * FROM users";
        $result = mysqli_query($link,$query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

        foreach ($data as $elem => $value){
          ?>
          <tr>
            <th scope="col"> <?php echo $value['id']; ?> </th>
            <th scope="col"> <?php echo $value['name']; ?> </th>
            <th scope="col"> <?php echo $value['age']; ?> </th>
            <th scope="col"> <?php echo $value['salary']; ?> </th>
            <th scope="col"> <?php echo $value['еxpert']; ?> </th>
            <th scope="col">
              <form action="" method="GET">
              <?php echo '<button type="submit" name="dell" value="'.$value['id'].'" class="btn btn-outline-danger">Удалить</button>'; ?>
            </th>
          </form>

              </form>
          </tr>

          <?php
        }
          ?>

        </tr>
      </thead>
    </table>
    <br>
    </tr>
      <h1>Добавление нового сотрудника</h1>
    <br>
      <form action="" method="POST">
        <div class="row">
          <? echo input('name'); ?>
          <? echo input('age'); ?>
          <? echo input('salary'); ?>
          <? echo input("еxpert"); ?>
        </div>
    <br>
      <button type="submit" class="btn btn-outline-success">Добавить</button>
    </form>
      </main>
  </body>
</html>
