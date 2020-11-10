<?php
require_once ("conexao.php");

@session_start();

if(empty($_POST['usuario']) || empty($_POST['senha'])){
    header(("location:login.php"));
}
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$res = $pdo->prepare("SELECT * FROM usuarios where usuario =:usuario and senha = :senha ");

$res->bindValue(":usuario", $usuario);
$res->bindValue(":senha", $senha);
$res->execute();

$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados);

if($linhas > 0 ){
    $_SESSION['nome_usuario']=$dados[0]['nome'];
    $_SESSION['nivel_usuario']=$dados[0]['nivel'];
    
    if($_SESSION['nivel_usuario'] == 'admin'){
        header("location:painelAdm/index.php");
        exit();
    }

    if($_SESSION['nivel_usuario'] == 'user'){
        header("location:painelUsuario/index.php");
        exit();
    }
    




}else{
    echo "<script language='javascript'>window.alert('E-mail ou Senha Incorretos!');</script>";
    
    
    echo "<script language='javascript'>window.location='index.php';</script>";

}



?>

