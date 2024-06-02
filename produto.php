<?php
include_once ('conexao.php');

    $sql= "SELECT * FROM produto ORDER BY codigoproduto DESC";
     $result = $conexao->query($sql);    

  if(isset($_POST['submit']))
  {

    

    
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $estoque = $_POST['estoque'];
    $codigoProduto = $_POST['codigoproduto'];
  
   
    $result = mysqli_query($conexao,"INSERT INTO produto (codigoproduto, descricao, valor, estoque) VALUES ('$codigoProduto','$descricao','$valor','$estoque')");
    $result = $conexao->query($sql);

    
  }

  //busca
  if(!empty($_GET['search']))
  {
    $data = $_GET['search'];
    $sql= "SELECT * FROM produto WHERE codigoproduto LIKE '%$data%' or descricao LIKE '%$data%' or valor LIKE '%$data%' or estoque LIKE '%$data%' ORDER BY codigoproduto DESC";

  }
  else
  {
    $sql= "SELECT * FROM produto ORDER BY codigoproduto DESC";

    

   
  }
  $result = $conexao->query($sql);
  ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJETO-PHP</title>

    <style> 
    .prod
    {
      display: flex;
      justify-content: center;
    }
    .m-5
    {
      display: flex;
      justify-content: center;
    }  
    .box-search{
      display: flex;
      justify-content: center;
    }



    </style>
</head>
<body>
  <div class="titulo">
  <h3 >CADASTRO DE PRODUTOS</h3>
  </div>

<a href="home.php">voltar</a>

   <div  class="box">
    <form action="produto.php" method="POST">
        <div class="inputbox">
        DESCRIÇÃO:<input type="text" name="descricao" id="descricao" placeholder="descricao"> <br>
        
        </div>
        <br>
        <div class="inputbox">
        Valor:<input type="text" name="valor" id="valor" placeholder="valor"> <br>
        
        </div>
        <br>
        <div class="inputbox">
        Codigo do produto:<input type="int" name="codigoproduto" id="codigoproduto" placeholder="codigoproduto"> <br>
        
        </div>
        <br>
        <div class="inputbox">
        Estoque total:<input type="int" name="estoque" id="estoque" placeholder="estoque"> <br>
        
        </div>
        <br>
        <input type="submit" name="submit" id="submit"> <br>
    </form>

    </div>

    <br><br>
    <br><br>
    

    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
        </svg>
        </button>

    </div>
    
    <div class="prod">
      <h2>Produtos Cadastrados</h2>
    </div>

    <div class="m-5">
    
      <table >
        
        <thead>
        <tr>
          <th scope="col">Codigo do produto:</th>
          <th scope="col">Valor</th>
          <th scope="col">Descrição</th>
          <th scope="col">Estoque</th>
          <th scope="col">Edit</th>
        </tr>
        </thead>
        
        <tbody>
          <?php
            while($dados = mysqli_fetch_assoc($result))
            {
              echo"<tr>";
              echo"<td>".$dados['codigoproduto']."</td>";
              echo"<td>".$dados['valor']."</td>";
              echo"<td>".$dados['descricao']."</td>";
              echo"<td>".$dados['estoque']."</td>";
              echo"<td>
              <a class='btn btn-sm btn-primary' href='edit.php?codigoproduto=$dados[codigoproduto]'>
              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
</svg>
              </a>
              <a class='btn btn-sm btn-primary' href='delete.php?codigoproduto=$dados[codigoproduto]'>
              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
  <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
</svg>
              </a>
              </td>";
            }
          ?>
        </tbody>
      </table>
    </div>

</body>
<script>
  var search = document.getElementById('pesquisar');

  search.addEventListener("keydown", function(event){
    if(event.key ==="Enter"){
      searchData();
    }

  });

  function searchData()
  {
    window.location = 'produto.php?search=' + search.value;
  }
</script>

</html>