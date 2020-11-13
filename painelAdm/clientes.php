<div class="row ml-2">
    <button data-toggle="modal" data-target="#modal" type="button" class="btn btn-secondary">Novo Cliente</button>
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
                <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Nome ou CPF" aria-label="Search" name="txtbuscar">
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
            <th scope="col">CPF</th>
            <th scope="col">Telefone</th>
            <th scope="col">Nivel</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>


        <?php

        $res = $pdo->query("SELECT * FROM usuarios order by nome asc");

        $res->execute();

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
                    <a href="#"><i class="fas fa-user-edit text-info mr-2"></i></a>
                    <a href="#"><i class="fas fa-trash-alt text-danger"></i></a>
                </td>
            </tr>

        <?php } ?>
    </tbody>
</table>




<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Usuários</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form>

                    <!-- Bloco 1-->
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nome</label>
                                <input type="text" class="form-control" placeholder="Maria da Silva" name="nome">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">CPF</label>
                                <input type="text" class="form-control" id="cpf" placeholder="Insira seu CPF" name="cpf">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">RG</label>
                                <input type="text" class="form-control" id="rg" placeholder="Insira seu RG" name="rg">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Telefone</label>
                                <input type="text" class="form-control" id="telefone" placeholder="(00) 9 9999-9999" name="telefone">
                            </div>
                        </div>
                    </div>




                    <div class="form-group">
                        <label for="exampleFormControlInput1">Endereço</label>
                        <input type="text" class="form-control" id="endereco" placeholder="Insira seu Endereço" name="endereco">
                    </div>
                    <!-- Bloco 2 -->
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Complemento</label>
                                <input type="text" class="form-control" id="complemento" placeholder="Casa Apto etc." name="complemento">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Bairro</label>
                                <input type="text" class="form-control" id="bairro" placeholder="Insira seu bairro" name="bairro">
                            </div>
                        </div>

                    </div>

                    <!--Bloco 3 -->
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">CEP</label>
                                <input type="text" class="form-control" id="cep" placeholder="00000-000" name="cep">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Cidade</label>
                                <select class="form-control" id="" name="cidade">
                                    <option>São Paulo</option>
                                    <option>Santo Antônio da Platina</option>
                                </select>
                            </div>
                        </div>

                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlInput1">Endereço de e-mail</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="seuemail@exemplo.com" name="email">
                    </div>
                </form>

            </div>
            <div class="modal-footer">


                <form method="POST">
                    <button type="submit" name="btn-salvar" class="btn btn-success">Salvar</button>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!--Script com MASCARAS na pasta JS chamada do mesmo -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="../js/mascaras.js">
</script>