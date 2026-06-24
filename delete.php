<?php
require "connection.php";

$id = (int) $_GET['id'];

$stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);

$stmt->execute();

header("Location: listar.php");
exit;