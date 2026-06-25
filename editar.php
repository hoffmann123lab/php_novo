<?php
    require "connection.php";

    $id = $_GET['id'];

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

<style>
    body{
        font-family: Arial;
        background:#f4f4f4;
    }

    .container{
        width:400px;
        margin:50px auto;
        background:white;
        padding:20px;
        border-radius:10px;
    }

    input{
        width:100%;
        padding:10px;
        margin-bottom:15px;
    }

    button{
        padding:10px 20px;
    }
</style>

</head>
<body>

<div class="container">

<h2>Editar Usuário</h2>

<form action="update.php" method="POST">

    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

    <label>Nome</label>
    <input type="text" name="nome"
           value="<?= htmlspecialchars($usuario['nome']) ?>" required>

    <label>Email</label>
    <input type="email" name="email"
           value="<?= htmlspecialchars($usuario['email']) ?>" required>

    <button type="submit">Salvar Alterações</button>

</form>

</div>

</body>
</html>