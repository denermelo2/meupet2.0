<div class="row ml-2">
    <a id="btn-novo" data-toggle="modal" data-target="#modal" type="button"></a>
    <a href="index.php?acao=usuarios&funcao=novo" type="button" class="btn btn-secondary">Novo Usuário</a>
</div>

<div class="row ml-1 mt-3">
    <div class="col-md-6 col-sm-12">
        <div class="float-left">

            <label class="registro" for="exampleFormControlSelect1">Registros</label>
            <select class="form-control-sm" id="exampleFormControlSelect1">
                <option>10</option>
                <option>20</option>
                <option>50</option>
            </select>

        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="float-right mr-4">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Nome, E-mail ou Cód" aria-label="Search" name="txtbuscar">
                <button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" type="submit" name="<?php echo $item2; ?>"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>


</div>


<table class="table table-sm mt-3">
    <thead class="thead-light">
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Usuario</th>
            <th scope="col">Senha</th>
            <th scope="col">Nivel</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>


        <?php
        //OPERADOR LIKE PARA FAZER A APROXIMAÇÃO DOS VALORES NO BANCO DE DADOS Juntamente com a query executada abaixo


        if (isset($_GET[$item2]) and $_GET['txtbuscar'] != '') {
            $nome_buscar = '%' . $_GET['txtbuscar'] . '%';
            $res = $pdo->prepare("SELECT * FROM usuarios where nome  LIKE :nome or usuario LIKE :usuario or id LIKE :id order by id DESC ");
            $res->bindValue(":nome", $nome_buscar);
            $res->bindValue(":id", $nome_buscar);
            $res->bindValue(":usuario", $nome_buscar);
            $res->execute();
        } else {
            $res = $pdo->query("SELECT * FROM usuarios order by id asc, nome");
        }





        $dados = $res->fetchAll(PDO::FETCH_ASSOC);

        for ($i = 0; $i < count($dados); $i++) {
            foreach ($dados[$i] as $key => $value) {
            }
            $id = $dados[$i]['id'];
            $nome = $dados[$i]['nome'];
            $usuario = $dados[$i]['usuario'];
            $senha = $dados[$i]['senha'];
            $nivel = $dados[$i]['nivel'];


            $linhas = count($dados);


        ?>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $nome ?></td>
                <td><?php echo $usuario ?></td>
                <td><?php echo $senha ?></td>
                <td><?php echo $nivel ?></td>
                <td>
                    <a href="index.php?acao=usuarios&funcao=editar&id=<?php echo  $id  ?>"><i class="fas fa-user-edit text-info mr-2"></i></a>
                    <a href="index.php?acao=usuarios&funcao=excluir&id=<?php echo  $id  ?>"><i class="fas fa-trash-alt text-danger"></i></a>
                </td>
            </tr>

        <?php } ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>









<!--Modal | Formulário de Cadastro de Infos-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">


                <!-- Essa porção de codigo terminando na div h5, faz
                a verificação de uma variavel para puxar o Modal Evitando assim usar o mesmo bloco mais de uma vez-->
                <h5 class="modal-title" id="exampleModalLabel">
                    <?php if (@$_GET['funcao'] == 'editar') {
                        $nome_botao = 'Editar';
                        $id_usuario = $_GET['id'];

                        //BUSCAR DADOS DO REGISTRO A SER EDITADO

                        $res = $pdo->query("select * from usuarios where id = '$id_usuario'");
                        $dados = $res->fetchAll(PDO::FETCH_ASSOC);
                        $nome_usuario = $dados[0]['nome'];
                        $email_usuario = $dados[0]['usuario'];
                        $senha_usuario = $dados[0]['senha'];
                        $email_usuario_rec = $dados[0]['usuario'];
                        echo 'Editar Usuário';
                    } else
                        $nome_botao = 'Salvar';
                        echo 'Cadastro de Usuários';
                    ?>
                </h5>


                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nome</label>
                        <input type="text" class="form-control" id="" placeholder="Maria da Silva" name="nome" value="<?php echo @$nome_usuario ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlInput1">E-mail</label>
                        <input type="text" class="form-control" id="" placeholder="Insira seu E-mail" name="usuario" value="<?php echo @$email_usuario ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Senha</label>
                        <input type="text" class="form-control" id="" placeholder="Insira sua senha" name="senha" value="<?php echo @$senha_usuario ?>">
                    </div>

            </div>
            <div class="modal-footer">

                <button type="submit" name="<?php echo $nome_botao ?>" class="btn btn-success"> <?php echo $nome_botao ?></button>

                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!--CÓDIGO DO BOTÃO NOVO -->
<?php
if (@$_GET['funcao'] == 'novo') {
?>
    <script>
        $('#btn-novo').click();
    </script>
<?php } ?>


<!--CÓDIGO DO BOTÃO SALVAR -->
<?php
if (isset($_POST['Salvar'])) {
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    //VERIFICAR SE O USUARIO JA ESTÁ CADASTRADO

    $res_c = $pdo->query("select * from usuarios where usuario = '$usuario'");
    $dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
    $linhas = count($dados_c);

    if ($linhas == 0) {
        $res = $pdo->prepare("INSERT into usuarios (nome, usuario, senha, nivel) values (:nome, :usuario, :senha, :nivel) ");

        $res->bindValue(":nome", $nome);
        $res->bindValue(":usuario", $usuario);
        $res->bindValue(":senha", $senha);
        $res->bindValue(":nivel", 'admin');
        $res->execute();

        echo "<script language='javascript'>window.alert('Registro Inserido com Sucesso!');</script>";
        echo "<script language='javascript'>window.location='index.php?acao=$item2';</script>";
    } else {
        echo "<script language='javascript'>window.alert('Este Usuário já está cadastro, utilize outras informações!');</script>";
    }
}

?>


<!--CÓDIGO DO BOTÃO EDITAR -->
<?php
if (@$_GET['funcao'] == 'editar') {



?>

    <script>
        $('#btn-novo').click();
    </script>

    <?php
    if (isset($_POST['Editar'])) {
        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        //VERIFICAR SE O USUARIO JA ESTÁ CADASTRADO
        if ($email_usuario_rec != $usuario) {
            $res_c = $pdo->query("select * from usuarios where usuario = '$usuario'");
            $dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
            $linhas = count($dados_c);
        }


        if ($linhas != 0) {
            echo "<script language='javascript'>window.alert('Este Usuário já está cadastro, utilize outras informações!');</script>";

            exit();
        }
        $res = $pdo->prepare("UPDATE usuarios set nome = :nome, usuario = :usuario , senha = :senha where id = :id");

        $res->bindValue(":nome", $nome);
        $res->bindValue(":usuario", $usuario);
        $res->bindValue(":senha", $senha);
        $res->bindValue(":id", $id_usuario);
        $res->execute();

        echo "<script language='javascript'>window.alert('Registro Atualizado com Sucesso!');</script>";
        echo "<script language='javascript'>window.location='index.php?acao=$item2';</script>";
    }

    ?>


<?php  } ?>



<!--CÓDIGO DO BOTÃO EXCLUIR -->
<?php
if (@$_GET['funcao'] == 'excluir') {
    $id_usuario = $_GET['id'];

    $res = $pdo->query("DELETE FROM usuarios where id = '$id_usuario'");

    echo "<script language='javascript'>window.alert('Registro Excluido com Sucesso!');</script>";
    echo "<script language='javascript'>window.location='index.php?acao=$item2';</script>";
}

?>







<!--Script com MASCARAS na pasta JS chamada do mesmo -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="../js/mascaras.js"> </script>