<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
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

        // удаление
        if (isset($_GET["dell"])) {
          $del = $_GET["dell"];
          $query = "DELETE FROM users WHERE id = $del";
          mysqli_query($link,$query)
            or die(mysqli_error($link));
        }

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
          <?php echo input('name'); ?>
          <?php echo input('age'); ?>
          <?php echo input('salary'); ?>
          <?php echo input("еxpert"); ?>
        </div>
    <br>
      <button type="submit" class="btn btn-outline-success">Подтвердить</button>
    </form>
  </body>
</html>
