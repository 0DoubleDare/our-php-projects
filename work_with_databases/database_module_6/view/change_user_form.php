<?php
require '../config.php';

// TODO: Не помешает бы вынести оба запроса в отдельный файл модели.
// Но для наглядности и просто чтоб работало оставлю так
$statement = $pdo->prepare("SELECT * FROM students WHERE id = :id");
$statement->execute($_GET);
$student = $statement->fetch();

$group = $pdo->query("SELECT * FROM groups")->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Izmenenie user</title>
</head>
<body>
    <form action="../model/update_user.php" method="post">
        <select name="group_id">
            <?php foreach($groups as $group): ?>
                <option value="<?= $group['id']?>"><?= $group['name']?></option>
            <?php endforeach; ?>
        </select>
        <input type="hidden" name="student_id" value="<?= $student['id'] ?>">
        <label for="">Имя</label>
        <input type="text" name="student_name" value="<?= $student['name']?>"><br>
        <button type="submit">Отправить</button>
    </form>
</body>
</html>