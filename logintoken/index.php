<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login com Hierarquia</title>
    <script type="text/javascript" src="script/jquery.js"></script>
    <script type="text/javascript" src="script/acesso.js"></script>
    <link rel="stylesheet" type="text/css" href="style/acesso.css"
</head>
<body>
<header>Sistema de acesso</header>
<div id="mensagem"></div>
<div id="formulario">
    <form id="formularioLogin">
        <span class="title">Acesse sua conta</span><br>

        <div id="linha">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" placeholder="Digite seu email"> <br>
        </div>

        <div id="linha">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua Senha"> <br>
        </div>

        <div id="button">
            <button id="btnEntrar">Entrar</button><br>
        </div>
    </form>

    <div id="textoCadastro">
        <span class="title">Não possui uma conta?</span>
        <span class="subtitle">Crie uma agora para acessar todas as ferramentas"</span>
        <button id="btnCadastrar">Cadastre-se Agora</button>
    </div>
</div>
</body>
</html>