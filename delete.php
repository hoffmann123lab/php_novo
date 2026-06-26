<?php
require "connection.php";

$id = (int) $_GET['id'];

// se clicou em CONFIRMAR
if (isset($_GET['confirm']) && $_GET['confirm'] == "sim") {

    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: listar.php?msg=deletado");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Excluir Usuário</title>

    <link rel="stylesheet" href="listar.css">
</head>
<body>

<div class="modal">
    <div class="modal-box">

        <h2>⚠️ Atenção</h2>
        <p>Deseja realmente excluir este usuário?</p>

        <a class="btn-sim" href="delete.php?id=<?= $id ?>&confirm=sim">SIM</a>
        <a class="btn-nao" href="listar.php">NÃO</a>

    </div>
</div>

</body>
</html>