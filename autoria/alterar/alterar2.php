<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>alterar</title>
</head>
<body>
    
<form name="cliente" method = "POST" action = "">
    <div class="main-prod">
    <div class="right-prod">
            <div class="card-prod">
            <?php
                $txtid = $_POST["txtid"];
                include_once '../autoria.php';
                $p = new Autoria();
                $p->setCod_Autoria($txtid);
                $pro_bd=$p->alterar();//chamada de método com retorno - o $p é o parâmetro enviado
            ?>

            <form action="" name="cliente2" method="POST">
                <?php
                foreach ($pro_bd as $pro_mostrar)
                {
                    ?>
                    <input type="hidden" name="txtid" size="5" value='<?php echo $pro_mostrar[0]?>'>
                    <b><?php echo "Código da Autoria: " . $pro_mostrar[0];?> </b>
                    <br><b><?php echo "Código do Autor:  " ; ?></b>
                    <input class="alterar" name="txt1" type="text" size="25" value='<?php echo $pro_mostrar[1]?>'>
                    <br><b><?php echo "Código do Livro: " ; ?></b>
                    <input class="alterar" name="txt2" type="text" size="25" value='<?php echo $pro_mostrar[2]?>'>
                    <br><b><?php echo "Data de Lançamento: " ; ?></b>
                    <input class="alterar" name="txt3" type="date" size="25" value='<?php echo $pro_mostrar[3]?>'>
                    <br><b><?php echo "Editora: " ; ?></b>
                    <input class="alterar" name="txt4" type="text" size="25" value='<?php echo $pro_mostrar[4]?>'>
                    <br><br>
                    <input class="btnenviar" name="btnenviar2" type="submit" value="Alterar">
                    <?php
                }
                ?>                          
            </form>
            <?php
            extract ($_POST, EXTR_OVERWRITE);
            if(isset($btnenviar2))
            {
            include_once '../autoria.php';
            $pro = new Autoria();
            $pro->setCod_A($txt1);
            $pro->setCod_L($txt2);
            $pro->setDt_lanc($txt3);
            $pro->setEdit($txt4);
            $pro->setCod_Autoria($txtid);
            echo "<br><br><h3>". $pro->alterar2(). "</h3>";
            header("location:alterar.php");
            }
            ?>
            <br><br><br>
            <a href = "alterar.php" class="btn-voltar"> Voltar </a>
        </div>
        
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>