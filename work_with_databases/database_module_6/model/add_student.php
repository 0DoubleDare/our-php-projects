<?php
require '../config.php';

// Данную конструкцию можно перевести так:
// try - выполни этот код блока, если во время его выполнения появится какая-либо ошибка моментально
// вызови catch
try {
    $sql = "INSERT INTO students (name, group_id)
VALUES (:name, :group_id)";
    $statement = $pdo->prepare($sql);
    $statement->execute(
        [
            'name' => $_POST['name'],
            'group_id' => $_POST['group_id']
        ]
    );
    header("Location: ../");
// catch - код который будет выполняться в случае неудачи
} catch (PDOException $error) {
    //  ^^^^^^^^^^^^^
    //  Указываем вид ошибки и переменную с любым названием
    die("Ошибка добавления студента в бд: " . $error->getMessage());
}

