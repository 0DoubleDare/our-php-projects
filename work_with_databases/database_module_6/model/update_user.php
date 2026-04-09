<?php
require '../config.php';
$data = [
    'id' => $_POST['student_id'],
    'name' => $_POST['student_name'],
    'group_id' => $_POST['group_id']
];
try {
    $sql = "
        UPDATE students 
        SET group_id = :group_id, name = :name
        WHERE id = :id
    ";
    $statement = $pdo->prepare($sql);
    $statement->execute($data);
    header("Location: ../index.php");
} catch (PDOException $e) {
    die("Ошибка обновления: " . $e->getMessage());
}

