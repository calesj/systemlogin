<?php
require ("conexao.php");

Class Acesso
{
    private $con = null;

    public function __construct($conexao)
    {
        $this->con = $conexao;

    }

    public function send(){
        if(empty($_POST) || $this->con == null){
            echo json_encode(array("erro" => 1, "mensagem" => "Ocorreu um erro interno no servidor"));
            return;
        }
        elseif (isset($_POST["type"]) && $_POST["type"] == "login" && isset($_POST['email']) && isset($_POST['senha'])){
                echo $this->login($_POST['email'], $_POST['senha']);
        }

        elseif (isset($_POST["type"]) && $_POST["type"] == "cadastro" && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['nome']) ){
            echo $this->cadastro($_POST['email'], $_POST['senha'], $_POST['nome']);
        }
    }

    public function login($email,$senha)
    {
        $conexao = $this->con;
        $query = $conexao->prepare("SELECT * FROM usuario where email = ? AND senha = ?");
        $query->execute(array($email,$senha));

        if($query->rowCount()>0){
            $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];
            session_start();
            $_SESSION["usuario"] = array($user["nome"],["adm"]);
            return json_encode(array("erro" => 0));
        }else{
            return json_encode(array("erro" => 1, "mensagem" => "Usuario ou senha invalidos"));
        }
    }
    public function cadastro($email,$senha,$nome){
        $conexao = $this->con;
        $query = $conexao->prepare("INSERT INTO usuario (email, senha, nome, adm) values(?,?,?,?)");
        if($query->execute(array($email,$senha,$nome,0))){
            session_start();
            $_SESSION['usuario'] = array($nome,0);

            return json_encode(array("erro" => 0));
        }else{
            return json_encode(array("erro" => 1, "mensagem"=>"Ocorreu um erro na solicitação de cadastro"));
        }
    }
}

$conexao = new Conexao();
$classe = new Acesso($conexao->Conectar());
$classe->send();
