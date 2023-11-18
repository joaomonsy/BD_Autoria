<?php

include_once '../autoria.php';
$p = new Autoria();
$pro_bd=$p->listar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Listar</title>
    <style>
        body {
            background: #06631f;
        }
        .table{
            width: 100%;
            
          
        }
        th,td {
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        
    </style>
</head>
<body>
<div class = "m-5">
    <table class="table">
        <thead>
            <tr class = "table-primary">
                <th scope="col">Código da Autoria</th>
                <th scope="col">Código do Autor</th>
                <th scope="col">Código do Livro</th>
                <th scope="col">Data de lançamento</th>
                <th scope="col">Editora</th>
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
    <br><br><a href="../../menu.html"><button>Voltar</button></a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>