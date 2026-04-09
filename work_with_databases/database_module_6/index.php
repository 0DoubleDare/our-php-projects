<?php
require 'config.php';
$statement = $pdo->query(
    "SELECT
            students.id,
            students.name,
            groups.name AS group_name
            FROM students JOIN groups
            ON groups.id = students.group_id
    "
);
$students = $statement->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Список студентов</h1>
    <a href="view/add_student_form.php">Добавить</a>
    <ul>
        <?php foreach($students as $student): ?>
            <li><?= htmlspecialchars($student['name']) ?></li>
            <li><?= htmlspecialchars($student['group_name']) ?></li>
            <a href="./view/change_user_form.php?id=<?=$student['id']?>">Редактировать</a>
            <a href="./model/delete_user.php?id=<?=$student['id']?>">Удалить</a><br><br>
        <?php endforeach;?>
    </ul>
</body>
</html>