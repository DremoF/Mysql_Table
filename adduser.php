 <!DOCTYPE html>
 <html lang="ru" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   </head>
   <body>
    <h1>Добавление нового сотрудника</h1>
    <br>
     <form action="index.php" method="POST">
  <div class="row">
    <div class="col">
      <input type="text" name="name" class="form-control" placeholder="Имя"
      value="<?php if (isset($_POST["name"])) echo $_POST['name']; ?>">
    </div>
    <div class="col">
      <input type="number" name="age" class="form-control" placeholder="Возраст"
      value="<?php if (isset($_POST["age"])) echo $_POST['age']; ?>">
    </div>
    <div class="col">
      <input type="number" name="salary" class="form-control" placeholder="Зарплата"
      value="<?php if (isset($_POST["salary"])) echo $_POST['salary']; ?>"><br>
    </div>
  </div>
  <button type="submit" class="btn btn-success">Подтвердить</button>
</form>

   </body>
 </html>
