<?php
require '../config.php';

try {
    $sql = "DELETE FROM students WHERE students.id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute($_GET);
    header("Location: ../index.php");
} catch(PDOException $error) {
    die("Ошибка удаления:" . $error->getMessage());
}

