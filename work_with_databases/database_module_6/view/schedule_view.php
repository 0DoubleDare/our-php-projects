<?php
require '../config.php';

$sql = "
    SELECT
        groups.name AS group_name,
        subjects.name AS subject,
        teachers.name AS teacher
    FROM subjects JOIN groups
    ON subjects.group_id = groups.id JOIN teachers
    ON subjects.teacher_id = teachers.id
";
$schedule = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Расписание епта</title>
</head>
<body>
    <h1>Расписание уроков</h1>
    <table border="2">
        <tr>
            <th>Группа</th>
            <th>Преподователь</th>
            <th>Предмет</th>
        </tr>
        <?php foreach($schedule as $s): ?>
        <tr>
            <td><?= $s['group_name']?></td>
            <td><?= $s['teacher']?></td>
            <td><?= $s['subject']?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
