<?php
require "connection.php";

$result = $conn->query("SELECT * FROM usuarios ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>

    <!-- CSS CORRETO -->
    <link rel="stylesheet" href="listar.css">
</head>

<body>

<?php if (isset($_GET['msg'])): ?>

    <?php if ($_GET['msg'] == "cadastrado"): ?>
        <div id="modalSucesso" class="modal">
            <div class="modal-box">
                <h2>Sucesso!</h2>
                <p>✅ Usuário cadastrado com sucesso!</p>
                <button onclick="fecharModal()">OK</button>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($_GET['msg'] == "editado"): ?>
        <div id="modalSucesso" class="modal">
            <div class="modal-box">
                <h2>Sucesso!</h2>
                <p>✏️ Usuário atualizado com sucesso!</p>
                <button onclick="fecharModal()">OK</button>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($_GET['msg'] == "deletado"): ?>
        <div id="modalSucesso" class="modal">
            <div class="modal-box">
                <h2>Sucesso!</h2>
                <p>🗑 Usuário excluído com sucesso!</p>
                <button onclick="fecharModal()">OK</button>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>

<script>
function fecharModal(){
    document.getElementById('modalSucesso').style.display = 'none';
}
</script>

<div class="container">

    <h2>Usuários Cadastrados</h2>

    <a class="btn" href="index.html">+ Cadastrar Novo Usuário</a>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Email</th>
                <th>Curso</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>

        <tbody>

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
                            ✏️ Editar
                        </a>
                    </td>

                    <td>
                        <a class="delete"
                           href="delete.php?id=<?= $u['id'] ?>"
                           onclick="return confirm('Deseja realmente excluir este usuário?')">
                            🗑 Excluir
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Nenhum usuário cadastrado</td>
            </tr>
        <?php endif; ?>

        </tbody>

    </table>

</div>

</body>
</html>