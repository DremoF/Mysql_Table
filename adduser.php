<?php

  include "index.php";

 ?>
<form action="index.php" method="POST">
  <input type="text" name="name" placeholder="Введите Имя"
    value="<?php if (isset($_POST["name"])) echo $_POST['name']; ?>">
  <br>
	<input type="number" name="age" placeholder="Введите Возраст"
    value="<?php if (isset($_POST["age"])) echo $_POST['age']; ?>">
  <br>
	<input type="number" name="salary" placeholder="Введите Зарплату"
    value="<?php if (isset($_POST["salary"])) echo $_POST['salary']; ?>">
  <br>
	<input type="submit" value="Добавить">
</form>
