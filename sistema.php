<?php
session_start();
include_once('conexao.php');

if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}
    $logado = $_SESSION['email'];

 
     header('Location: produto.php');
   





    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>acessou o sistema</h1>

    <div>
        <a href="" class="btn">Sair</a>
    </div>
</body>
</html>