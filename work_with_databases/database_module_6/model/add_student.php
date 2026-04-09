<?php
require '../config.php';

try {
    $sql = "INSERT INTO students (name, group_id)
VALUES (:name, :group_id)";
    $statement = $pdo->prepare($sql);
    print_r($_POST);
    $statement->execute(
        [
            'name' => $_POST['name'],
            'group_id' => $_POST['group_id']
        ]
    );
    header("Location: ../");
} catch (PDOException $error) {
    echo "Ошибка добавления студента в бд: " . $error->getMessage();
}

