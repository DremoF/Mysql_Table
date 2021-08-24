<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Возраст</th>
      <th scope="col">Зарплата</th>

        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbName = "test";
        $link = mysqli_connect($host,$user,$password,$dbName)
          or die (mysqli_error($link));
          mysqli_query($link, "SET NAMES 'utf-8'");

        // добавление
        if (!empty($_POST)) {
          $name = $_POST["name"];
          $age = $_POST["age"];
        	$salary = $_POST["salary"];

        	$query = "INSERT INTO users SET name='$name', age='$age', salary='$salary'";
        	mysqli_query($link, $query) or die(mysqli_error($link));
        }

        // Удаление по id (не подключен)
        if (isset($_GET["dell"])) {
          $del = $_GET["dell"];
          $query = "DELETE FROM users WHERE id = $del";
          mysqli_query($link,$query)
           or die(mysqli_error($link));
        }

        // Получение всех:
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
            <form action="" method="GET">
              <th scope="col">
                <button type="submit"  class="btn btn-danger" value="">Удалить</button>
              </th>
            </form>
          </tr>
          <?php
        }
          ?>

        </tr>
      </thead>
    </table>

    <br>
    <form action="adduser.php" method="POST">
      <button type="submit" class="btn btn-success">Добавить содрудника</button>
    </form>
    </tr>
  </body>
</html>
