<?php
require "connection.php";

$result = $conn->query("SELECT * FROM usuarios ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .btn:hover {
            background: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #eee;
        }

        .edit {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .delete {
            color: red;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Usuários Cadastrados</h2>

    <a class="btn" href="index.html">+ Cadastrar Novo Usuário</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Email</th>
            <th>Curso</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>

        <?php if ($result->num_rows > 0): ?>
            <?php while ($u = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $u['id'] ?></td>
                    <td><?= htmlspecialchars($u['nome']) ?></td>
                    <td><?= $u['idade'] ?></td>
                    <td><?= htmlspecialchars($u['email']) ?></td>
                    <td><?= htmlspecialchars($u['curso']) ?></td>

                    <td>
                        <a class="edit" href="editar.php?id=<?= $u['id'] ?>">
                            Editar
                        </a>
                    </td>

                    <td>
                        <a class="delete"
                           href="delete.php?id=<?= $u['id'] ?>"
                           onclick="return confirm('Deseja realmente excluir este usuário?')">
                            Excluir
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Nenhum usuário cadastrado</td>
            </tr>
        <?php endif; ?>

    </table>

</div>

</body>
</html>