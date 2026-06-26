<?php
require "connection.php";

$id = (int) $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

if (!$usuario) {
    die("Usuário não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Editar Usuário</title>
<link rel="stylesheet" href="editar.css">
</head>
<body>

<div class="container">


    <form action="update.php" method="POST">

        <h2>Editar Usuário</h2>

        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

        <label for="nome">Nome:</label>
        <input
            type="text"
            id="nome"
            name="nome"
            value="<?= htmlspecialchars($usuario['nome']) ?>"
            required
        >

        <label for="idade">Idade:</label>
        <input
            type="number"
            id="idade"
            name="idade"
            value="<?= htmlspecialchars($usuario['idade']) ?>"
            required
        >

        <label for="email">Email:</label>
        <input
            type="email"
            id="email"
            name="email"
            value="<?= htmlspecialchars($usuario['email']) ?>"
            required
        >

        <label for="curso">Curso:</label>
        <input
            type="text"
            id="curso"
            name="curso"
            value="<?= htmlspecialchars($usuario['curso']) ?>"
            required
        >

        <button type="submit">Salvar Alterações</button>

    </form>

</div>

</body>
</html>