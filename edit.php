<?php

  
if(!empty($_GET['codigoproduto']))
{
  include_once ('conexao.php');
  
  $consulta = $_GET['codigoproduto'];
  


  $sqlSelect = "SELECT * FROM produto WHERE codigoproduto = $consulta";
   

  $result = $conexao->query($sqlSelect);
  
  if($result->num_rows > 0)
  {
    while($dados = mysqli_fetch_assoc($result))
    {
      $descricao = $dados['descricao'];
      $valor = $dados['valor'];
      $estoque = $dados['estoque'];
      $codigoProduto = $dados['codigoproduto'];

    }
    
    print_r("Codigo Do Produto: " . $consulta . "<br> Descrição : " . $descricao . "<br> Valor : " . $valor . "<br> Estoque Total  : " . $estoque);
    
    print_r("<br><br>");

    print_r("Ateção: TODOS OS CAMPOS DEVEM ESTAR PREENCHIDOS PARA A EDIÇÃO");

  }
  else
  {
    header('Location: produto.php');
  }  
}
else
{
  header('Location: produto.php');
}  





  ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJETO-PHP</title>
</head>
<body>
<h3>EDIÇÃO</h3>
<a href="produto.php">Voltar a formulario de produtos</a>
<br>
<br>
    <form method="POST" action="saveEdit.php">
    
    <div>
      Codigo:<input type="text" name="codigoproduto" id="codigoproduto" value="<?php echo $consulta
      ?>"><br>
      </div>
      <br><br>
      <div>
      Valor:<input type="text" name="valor" id="valor" value="<?php echo "" ?>">
      <br>
      </div>
      <br><br>
      <div>
      Estoque:<input type="text" name="estoque" id="estoque" value="<?php echo "" ?>"><br>
      </div>
      <br><br>
      <div>
      Descrição:<input type="text" name="descricao" id="descricao" value="<?php echo "" ?>">

      <br><br><br>
      
      </div>
      
      <input type="submit" name="update" id="update"><br>

    
    </form>

    </div>
    <br>
    <br>
    <div>
      <table>
        <tbody>
          <?php
            while($dados = mysqli_fetch_assoc($result))
            {
              echo"<tr>";
              echo"<td>".$dados['codigoproduto']."</td>";
              echo"<td>".$dados['valor']."</td>";
              echo"<td>".$dados['descricao']."</td>";
              echo"<td>".$dados['estoque']."</td>";
              echo"<td>acoes
              <a class='btn btn-primary' href='edit.php?codigoproduto=$dados[codigoproduto]'>
              </a>
              </a>
              <a class='btn btn-sm btn-danger' href='edit.php?codigoproduto=$dados[codigoproduto]'>
              </td>";
              
            }
          ?>
        </tbody>
      </table>
    </div>

</body>
</html>