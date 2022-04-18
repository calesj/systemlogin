<?php
session_start();
if(isset($_SESSION['usuario']) && is_array($_SESSION["usuario"])){
    require ("acoes/conexao.php");
    $adm = $_SESSION['usuario'][1];
    $nome = $_SESSION['usuario'][0];
}else{
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Sistema de Login com PHP</title>
</head>
<body>
    DashBoard - <?php echo $nome; ?>
    <?php if($adm): ?>
        <table>
            <thead>
            <tr>
                <td>Nome</td>
                <td>Email</td>
                <td>Senha</td>
                <td>ADM</td>
                <td>ID</td>
            </tr>
            </thead>
            <tbody><?php
            $query = $conexao->prepare("SELECT * FROM usuario");
            $query->execute();

            $users = $query->fetchAll(PDO::FETCH_ASSOC);
            for($i = 0; $i< count($users); $i++):
            $usuarioAtual = $users[$i]
                ?>
                <tr>
                    <td><?php echo $usuarioAtual['nome']?></td>
                    <td><?php echo $usuarioAtual['email']?></td>
                    <td><?php echo $usuarioAtual['senha']?></td>
                    <td><?php echo $usuarioAtual['adm']?></td>
                    <td><?php echo $usuarioAtual['id']?></td>
                </tr>
        <?php endfor; ?>
            </tbody>
        </table>
    <?php endif; ?>
<a href="acoes/logout.php">Sair</a>
</body>
</html>