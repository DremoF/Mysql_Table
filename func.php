<?php
require "ConfigDB.php";

function input($name)
	{
		if (isset($_POST[$name])) {
			$value = $_POST[$name];
		} else {
			$value = '';
		}
		//var_dump($value);
		return
    '<div class="col">
      <input type="text" name="' . $name . '" class="form-control" placeholder = "' . $name . '"
      value="' . $value .'">
    </div>';
	}

	if (!empty($_POST)) {
		$name = $_POST['name'];
		$age = $_POST['age'];
		$salary = $_POST['salary'];
    $еxpert = $_POST["еxpert"];
		$query = "INSERT INTO users SET name='$name', age='$age', salary='$salary', еxpert='$еxpert' ";
		mysqli_query($link, $query) or die(mysqli_error($link));
	}

 ?>
