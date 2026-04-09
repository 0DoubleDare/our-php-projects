<?php
require '../config.php';

try {
    $sql = "DELETE FROM students WHERE students.id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute($_GET);
} catch(PDOException $error) {
    echo "Ошибка удаления:" . $error->getMessage();
}
header("Location: ../index.php");

