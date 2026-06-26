<?php
require "connection.php";

$id = (int)$_POST['id'];
$nome = $_POST['nome'];
$idade = (int)$_POST['idade'];
$email = $_POST['email'];
$curso = $_POST['curso'];

$stmt = $conn->prepare("
    UPDATE usuarios
    SET nome = ?, idade = ?, email = ?, curso = ?
    WHERE id = ?
");

$stmt->bind_param("sissi", $nome, $idade, $email, $curso, $id);

if ($stmt->execute()) {
    header("Location: listar.php?msg=editado");
    exit;
} else {
    echo "Erro ao atualizar.";
}