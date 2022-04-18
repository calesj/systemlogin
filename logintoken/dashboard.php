<?php
session_start();
if (isset($_SESSION['usuario']) && is_array($_SESSION["usuario"])) {
    require("acoes/conexao.php");
    $adm = $_SESSION['usuario'][1];
    $nome = $_SESSION['usuario'][0];
} else {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style/dashboard.css"
</head>
<body>
<header>
    <div id="content">
        <div id="user">
            <span><?php echo $adm == 1 ? $nome . " (ADM)" : $nome; ?></span>
        </div>

        <span class="logo">Sistema de Acesso</span>

        <div id="logout">
            <a href="acoes/logout.php"><button>Sair</button></a>
        </div>
    </div>
</header>
<div id="content">
    <?php if ($adm == 1): ?>
        <div id="tabelaUsuarios">
            <span class="title">Lista de Usuarios</span>
            <table>
                <thead>
                <tr>
                    <td>Nome</td>
                    <td>Email</td>
                    <td>Senha</td>
                    <td>ADM</td>
                    <td>ID</td>
                    <td>Excluir</td>
                </tr>
                </thead>
                <tbody><?php
                $query = $conexao->prepare("SELECT * FROM usuario");
                $query->execute();

                $users = $query->fetchAll(PDO::FETCH_ASSOC);
                for ($i = 0; $i < count($users); $i++):
                    $usuarioAtual = $users[$i]
                    ?>
                    <tr>
                        <td><?php echo $usuarioAtual['nome'] ?></td>
                        <td><?php echo $usuarioAtual['email'] ?></td>
                        <td><?php echo $usuarioAtual['senha'] ?></td>
                        <td><?php echo $usuarioAtual['adm'] ?></td>
                        <td><?php echo $usuarioAtual['id'] ?></td>
                        <td><button>Excluir</button></td>
                    </tr>
                <?php endfor; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

</body>
</html>