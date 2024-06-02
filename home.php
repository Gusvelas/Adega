<?php
if(isset($_POST['submit']))
{
    include_once ('conexao.php');
    //usuarios
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];

    //usuarios
    $result = mysqli_query($conexao,"INSERT INTO usuarios (email, senha, nome) VALUES ('$email','$senha','$nome')");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Faça seu cadastro</h2>
    <div class="box">
        <form action="home.php" method="POST">
            <div class="inputBox">
                <label for="nome" class="labelInput"> Nome completo</label>
                <input type="text" name="nome" id="nome" class="inputUser" required>
            </div>
            <br>
            <div class="inputBox">
                <label for="email" class="labelInput"> Email</label>
                <input type="text" name="email" id="email" class="inputUser" required>
            </div>
            <br>
            <div class="inputBox">
                <label for="senha" class="labelInput"> Senha</label>
                <input type="password" name="senha" id="senha" class="inputUser" required>
            </div>
            <br>
            
            <a href="login.php">Fazer Login</a>
            <input type="submit" name="submit" id="submit"> <br>
        </form>

    </div>
   
</div>


</body>
</form>