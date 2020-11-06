<DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meu Pet 1.0</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!--REFERENCIA FLAVICON-->
    <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon/favicon.ico" type="image/x-icon">
    
    <link rel="stylesheet" href="css/login.css">

  
</head>
<body>
    <div class="login-form">
        <form action="autenticar.php" method="post">
            <div class="logo">
                <img src="images/logo.png" alt ="Meu pet">
            </div>
            <h2 class="text-center">
                Bem vindo
            </h2>
            <!--Bloco de Formulário!-->
            <div class="form-group">
                <input class="form-control" type="email" name="usuario" placeholder="Insira seu e-mail" required autofocus>
            </div>

            <div class="form-group">
                <input class="form-control" type="password" name="senha" placeholder="Senha" required >
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="btn-login" color="red">
                LOGIN </button>
            </div>
            <div class="clearfix">
                <label class="float-left checkbox-inline">
                    <input type="checkbox">
                    Lembrar login?
                </label>
                <a href="#" class="float-right" >Recuperar Senha</a>


        </form>





    </div>
    
</body>
</html>
    
