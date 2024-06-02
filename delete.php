<?php

if(!empty($_GET['codigoproduto']))
{
  include_once ('conexao.php');
  
  $consulta = $_GET['codigoproduto'];
  


  $sqlSelect = "SELECT * FROM produto WHERE codigoproduto = $consulta";
   

  $result = $conexao->query($sqlSelect);
  
  if($result->num_rows > 0)
  {
    $sqlDelete = "DELETE FROM produto WHERE codigoproduto=$consulta";

    $resultDelete = $conexao->query($sqlDelete);
    
  }

  
}

header('Locarion: edit.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <div>
        <h1>Lixeira</h1>

    </div>
    <?php echo"Poduto $consulta :Excluido com sucesso"?>

    <br><br>

    <a href="produto.php">Voltar a formulario de produtos</a>
</body>
</html>