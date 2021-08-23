<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table>
      <tr>
        <th>id</th>
        <th>Имя</th>
        <th>Возраст</th>
        <th>Зарплата</th>
        <th>Удаление</th>

        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbName = "test";
        $link = mysqli_connect($host,$user,$password,$dbName)
          or die (mysqli_error($link));
          mysqli_query($link, "SET NAMES 'utf-8'");

        // Сохранение нового
        if (!empty($_POST)) {
			    $name = $_POST['name'];
			    $age = $_POST['age'];
		      $salary = $_POST['salary'];

			    $query = "INSERT INTO users SET name='$name', age='$age', salary='$salary'";
			    mysqli_query($link, $query) or die(mysqli_error($link));
        }

        // Удаление по id
        if (isset($_GET['del'])) {
          $del = $_GET['del'];
          $query = "DELETE FROM users WHERE id = $del";
          mysqli_query($link,$query)
           or die(mysqli_error($link));
        }

        // Получение всех:
        $query = "SELECT * FROM users";
        $result = mysqli_query($link,$query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        // Вывод
        $result = "";
        foreach ($data as $elem) {
          $result .= '<tr>';

          $result .= '<td>' . $elem["id"] . '</td>';
          $result .= '<td>' . $elem["name"] . '</td>';
          $result .= '<td>' . $elem["age"] . '</td>';
          $result .= '<td>' . $elem["salary"] . '</td>';
          $result .= '<td><a href="?del=' . $elem['id'] . '"> Удалить </a></td>';

          $result .= '</tr>';
        }
          echo $result;
         ?>

      </tr>
    </table>
    <br>
    <form action="" method="POST">
	    <input name="name" placeholder="Введите Имя"><br>
	    <input type="number" name="age" placeholder="Введите Возраст"><br>
	    <input type="number" name="salary" placeholder="Введите Зарплату"><br>
	    <input type="submit" value="Добавить">
    </form>
    </tr>
  </body>
</html>
