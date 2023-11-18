<?php

include_once '../autor.php';
$p = new Autor();
$pro_bd=$p->listar();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>excluir</title>
</head>
<body>
    
<form name="cliente" method = "POST" action = "">
    <div class="main-prod">
        <div class="left-prod">
            <h1>Excluir Autor</h1>
            <div class = "m-5">
            <table class="table">
        <thead>
            <tr class = "table-primary">
                <th scope="col">Código do Autor</th>
                <th scope="col">Nome</th>
                <th scope="col">Sobrenome</th>
                <th scope="col">Email</th>
                <th scope="col">Data de Nascimento</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        if (is_array($pro_bd)) {
            foreach ($pro_bd as $pro_mostrar) {
                echo "<tr>";
                echo "<td>". $pro_mostrar[0]."</td>";
                echo "<td>". $pro_mostrar[1]."</td>";
                echo "<td>". $pro_mostrar[2]."</td>";
                echo "<td>". $pro_mostrar[3]."</td>";
                echo "<td>". $pro_mostrar[4]."</td>";
            }
        }
        ?>
        </tbody>
    </table>
</div>
        </div>
        <div class="right-prod">
            <div class="card-prod">
                <div class="textfield">
                    <label for="produto">Código:</label>
                    <input type="text" name="txtid" placeholder="Digite o código do autor que será excluida">
                </div>
                <input class="btnenviar" name="btnenviar" type="submit" value="Excluir">
                <input class="btnenviar" name="btnenviar" type="reset" value="Limpar">       
                <a href="../../menu.html" class="btn-voltar">Voltar</a>
                <?php
                    extract ($_POST, EXTR_OVERWRITE);
                    if (isset($btnenviar))
                    {
                    include_once '../Autor.php';
                    $p= new Autor();
                    $p->setCod_A($txtid);
                    echo "<h3 class= 'mensagem'>". $p->exclusao() . "<br> Recarregue a página ou aperte F5 para ver a tabela atualizada </h3>";//chamada de método - o $p é o parâmetro enviado
                    }
                ?>    
                
            </div>
        </div>
    </div>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
