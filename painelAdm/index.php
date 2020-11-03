<?php
$notificacoes = 3;

//variaveis dos menus
$item1 = 'home';
$item2 = 'usuarios';
$item3= 'racas';
$item4 = 'animais';
$item5= 'servicos';
$item6 = 'notificacoes';
$item7 = 'agendar';
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
                        Administrador - Dener Melo
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Sair
                        </a>
                    </div>
                </li>
        </nav>

        <div class="container-fluid mt-4 ml-2">
            <div class="row">
                <div class="col-md4 mb-4">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" href="index.php?acao=<?php echo $item1?>" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-house-user mr-2"></i>Home</a>
                        <a class="nav-link" id="link-usuarios" href="index.php?acao=<?php echo $item2?>" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-users mr-2"></i>Cadastro Usuários</a>
                        <a class="nav-link" id="link-racas" href="index.php?acao=<?php echo $item3?>" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fas fa-paw mr-2"></i>Cadastro Raças</a>
                        <a class="nav-link" id="link-animais"  href="index.php?acao=<?php echo $item4?>" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-dog mr-2"></i>Cadastro Animais</a>
                        <a class="nav-link" id="v-pills-settings-tab"  href="index.php?acao=<?php echo $item5?>" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-hospital-symbol mr-2"></i>Cadastro de Serviços</a>
                        <a class="nav-link" id="v-pills-settings-tab"  href="index.php?acao=<?php echo $item7?>" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="far fa-calendar-alt mr-2"></i>Agendar</a>

                        <?php
                        if ($notificacoes > 0) { ?>
                            <a class="nav-link" id="v-pills-settings-tab"  href="index.php?acao=<?php echo $item6?>" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="far fa-bell mr-2">
                                </i>Notificações<span class="badge badge-light">
                                    <?php echo $notificacoes; ?></span></a> <!-- $notificacoes Variavel para armazenar os dados das notificações!-->
                        <?php } ?>

                    </div>
                </div>
                <div class="col-md-10">
                    <div class="tab-content" id="v-pills-tabContent">
                            <!--Execucao do home e chamada-->
                        <?php if (@$_GET['acao'] == $item1) { ?> <!--Esse @ ignora a execucao dos alerts caso nao exista-->
                            <div class="tab-pane fade show active" role="tabpanel">
                                <?php include_once($item1.".php") ?>
                            </div>
                        <?php } ?>
                            <!--Execucao do usuarios e chamada-->
                        <?php if (@$_GET['acao'] == $item2) { ?>
                            <div class="tab-pane fade show active" role="tabpanel">
                            <?php include_once($item2.".php") ?>
                            </div>
                        <?php } ?>
                            <!--Execucao do racas e chamada-->
                        <?php if (@$_GET['acao'] == $item3) { ?>
                            <div class="tab-pane fade show active" role="tabpanel">
                            <?php include_once($item3.".php") ?>
                            </div>
                        <?php } ?>
                        <!--Execucao do animais e chamada-->
                        <?php if (@$_GET['acao'] == $item4) { ?>
                            <div class="tab-pane fade show active" role="tabpanel">
                            <?php include_once($item4.".php") ?>
                            </div>
                        <?php } ?>

                        <!--Execucao do servicos e chamada-->
                        <?php if (@$_GET['acao'] == $item5) { ?>
                            <div class="tab-pane fade show active" role="tabpanel">
                            <?php include_once($item5.".php") ?>
                            </div>
                        <?php } ?>

                        <!--Execucao do notificacoes e chamada-->
                        <?php if (@$_GET['acao'] == $item6) { ?>
                            <div class="tab-pane fade show active" role="tabpanel">
                            <?php include_once($item6.".php") ?>
                            </div>
                        <?php } ?>

                        <!--Execucao do agendar e chamada-->
                        <?php if (@$_GET['acao'] == $item7) { ?>
                            <div class="tab-pane fade show active" role="tabpanel">
                            <?php include_once($item7.".php") ?>
                            </div>
                        <?php } ?>
                        


                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>


    <?php
    /*
    //Executar um link href com script
    if (isset($_GET['btnbuscarUsuarios'])) { ?>

        <script type="text/javascript">
            $('#link-usuarios').click();
        </script>
    <?php }

    ?>*/