<?php


//verificações para o login - Autentica o usuario e o nivel para evitar burlar o login

require_once("../conexao.php");
@session_start();
if(!isset($_SESSION['nome_usuario']) || $_SESSION['nivel_usuario'] != 'admin'){
    header("location:../index.php");
}


$notificacoes = 3;

//variaveis dos menus
$item1 = 'home';
$item2 = 'usuarios';
$item3 = 'racas';
$item4 = 'animais';
$item5 = 'servicos';
$item6 = 'notificacoes';
$item7 = 'agendar';
$item8 = 'tipoanimal';
$item9 = 'clientes';
 
//VERIFICAR COM O MENU CLICADO E PASSAR O ESTADO DE ATIVO

if (@$_GET['acao'] == $item1) { //home
    $item1ativo = 'active';
} elseif(@$_GET['acao'] == $item2 or isset($_GET[$item2])) { //usuarios
    $item2ativo = 'active'; 
} elseif (@$_GET['acao'] == $item3) {//racas
    $item3ativo = 'active';
} elseif (@$_GET['acao'] == $item4) { //animais
    $item4ativo = 'active';
} elseif (@$_GET['acao'] == $item5) { //servicos
    $item5ativo = 'active';
} elseif (@$_GET['acao'] == $item6) { //notificacoes
    $item6ativo = 'active';
} elseif (@$_GET['acao'] == $item7) { //agendar
    $item7ativo = 'active';
} elseif (@$_GET['acao'] == $item8) { //tipo animal
    $item8ativo = 'active';
} elseif (@$_GET['acao'] == $item9) { //cliente
    $item9ativo = 'active';
}

?>

<DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Painel Administrativo</title>


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!--O link abaixo se conecta com o fontawesome para colocar icones no menu-->
        <script src="https://kit.fontawesome.com/6e79ac77f8.js" crossorigin="anonymous"></script>

        <!--REFERENCIA FLAVICON-->
        <link rel="shortcut icon" href="..images/favicon/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon/favicon.ico" type="image/x-icon">

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../css/painel.css">


    </head>

    <body>

        <nav class="navbar navbar-light bg-light">
            <div class="col-md-12">
                <img class="float-left" src="../images/logosemfundo.png" alt="meupet">
                <li class="float-right nav-link dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Administrador - <?php echo $_SESSION['nome_usuario']?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../logout.php">Sair
                        </a>
                    </div>
                </li>
        </nav>

        <div class="container-fluid mt-4 ml-2">
            <div class="row">
                <div class="col-md4 mb-4">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link <?php echo $item1ativo  ?>" id="v-pills-home-tab" href="index.php?acao=<?php echo $item1 ?>" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-house-user mr-2"></i>Home</a>
                        
                        <a class="nav-link <?php echo $item2ativo  ?>" id="link-usuarios" href="index.php?acao=<?php echo $item2 ?>" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-users mr-2"></i>Cadastro Usuários</a>

                        <a class="nav-link <?php echo $item9ativo  ?>" id="link-clientes" href="index.php?acao=<?php echo $item9 ?>" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="far fa-address-card"></i> Cadastro de Clientes</a>
                        
                        <a class="nav-link <?php echo $item3ativo  ?>" id="link-racas" href="index.php?acao=<?php echo $item3 ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fas fa-paw mr-2"></i>Cadastro Raças</a>
                        
                        <a class="nav-link <?php echo $item8ativo  ?>" id="v-pills-settings-tab" href="index.php?acao=<?php echo $item8 ?>" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-cat"></i></i> Cadastro Tipo Animal</a>

                        <a class="nav-link <?php echo $item4ativo  ?>" id="link-animais" href="index.php?acao=<?php echo $item4 ?>" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-dog mr-2"></i>Cadastro Animais</a>
                        
                        <a class="nav-link <?php echo $item5ativo  ?>" id="v-pills-settings-tab" href="index.php?acao=<?php echo $item5 ?>" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-hospital-symbol mr-2"></i>Cadastro de Serviços</a>
                        
                        <a class="nav-link <?php echo $item7ativo  ?>" id="v-pills-settings-tab" href="index.php?acao=<?php echo $item7 ?>" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="far fa-calendar-alt mr-2"></i>Agendar</a>

                        

                        <?php
                        if ($notificacoes > 0) { ?>
                            <a class="nav-link <?php echo $item6ativo  ?>" id="v-pills-settings-tab" href="index.php?acao=<?php echo $item6 ?>" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="far fa-bell mr-2">
                                </i>Notificações<span class="badge badge-light">
                                    <?php echo $notificacoes; ?></span></a> <!-- $notificacoes Variavel para armazenar os dados das notificações!-->
                        <?php } ?>

                    </div>
                </div>
                <div class="col-md-10">
                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" role="tabpanel">
                            <?php if (@$_GET['acao'] == $item1) {
                                include_once($item1 . ".php");
                            } elseif(@$_GET['acao'] == $item2 or isset($_GET[$item2])){
                                include_once($item2 . ".php");
                            } elseif (@$_GET['acao'] == $item3) {
                                include_once($item3 . ".php");
                            } elseif (@$_GET['acao'] == $item4) {
                                include_once($item4 . ".php");
                            } elseif (@$_GET['acao'] == $item5) {
                                include_once($item5 . ".php");
                            } elseif (@$_GET['acao'] == $item6) {
                                include_once($item6 . ".php");
                            } elseif (@$_GET['acao'] == $item7) {
                                include_once($item7 . ".php");
                            } elseif (@$_GET['acao'] == $item8) {
                                include_once($item8 . ".php");
                            } elseif (@$_GET['acao'] == $item9) {
                                include_once($item9 . ".php");
                            }else {
                                include_once($item1 . ".php"); //ativa o default do home caso nao tenha nenhum item clicado
                            }
                            ?>
                        </div>



                    </div>
                </div>
            </div>
        </div>


    </body>

    </html>




    <?php
