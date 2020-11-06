<?php
try {
$pdo = new PDO("mysql:dbname=meupet;host=localhost","root","");

}catch(Exception $e){
    echo "Erro ao conectar ao banco de dados! ".$e;    
}




?>