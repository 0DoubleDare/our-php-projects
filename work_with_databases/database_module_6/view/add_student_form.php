<?php
    require '../config.php';
    $statement = $pdo->query("SELECT * FROM groups");
    $groups = $statement->fetchAll();
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
    <form action="../model/add_student.php" method="post">
        <select name="group_id">
            <?php foreach($groups as $group): ?>
            <option value="<?= $group['id']?>"><?= $group['name']?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="name" placeholder="Введите имя студента">
        <button type="submit">Отправить форму</button>
    </form>
</body>
</html>
