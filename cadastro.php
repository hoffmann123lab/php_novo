<?php
    require "connection.php";

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    $stmt = $conn->prepare(
        "INSERT INTO usuarios (nome, idade, email, curso)
        VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param("siss", $nome, $idade, $email, $curso);

    $stmt->execute();

    header("Location: listar.php");
exit;