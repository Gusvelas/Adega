<?php
include_once('conexao.php');

if(isset($_POST['update']))
{
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $estoque = $_POST['estoque'];
    $codigoProduto = $_POST['codigoproduto'];


    $sqlUpdate = "UPDATE produto SET valor ='$valor', estoque ='$estoque', descricao='$descricao' WHERE codigoproduto = '$codigoProduto'";

    $result = $conexao->query($sqlUpdate);


}

header('Location: produto.php');

?>