
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Consultar</title>
</head>
<body>
    
<form name="cliente" method = "POST" action = "">
    <div class="main-prod">
        <div class="left-prod">
            <h1>Consultar Autoria</h1>
            <?php
                    extract ($_POST, EXTR_OVERWRITE);
                    if (isset($btnenviar))
                    {
                    include_once '../autoria.php';
                    $p= new Autoria();
                    $p->setCod_Autoria($txtNome . '%');
                    $pro_bd=$p->consultar();
                    
                        foreach ($pro_bd as $pro_mostrar) 
                        {
                            ?> <br>
                            <?php echo '<div class="tabela">' ?>
                            <b> <?php echo "Código: &emsp;" . $pro_mostrar[0] ."<br> "?></b><br>
                            <b> <?php echo "Título: &emsp;" . $pro_mostrar[1] ."<br> "?></b><br>
                            <b> <?php echo "Categoria: &emsp;" . $pro_mostrar[2] ."<br> "?></b><br>
                            <b> <?php echo "ISBN: &emsp;" . $pro_mostrar[3]. "<br> "?></b><br>
                            <b> <?php echo "Idioma: &emsp;" . $pro_mostrar[4] ."<br> "?></b><br>
                            <?php echo '</div>' ?>
                            <?php
                        }
                    }
                ?>
        </div>
        <div class="right-prod">
            <div class="card-prod">
                <div class="textfield">
                    <label for="produto">Código Autoria</label>
                    <input type="number" name="txtNome" placeholder="Digite o Código da autoria que será consultado">
                </div>
                <input class="btnenviar" name="btnenviar" type="submit" value="Consultar">
                <input class="btnenviar" name="btnLimpar" type="reset" value="Limpar">       
                <a href="../../menu.html" class="btn-voltar">Voltar</a>    
                
            </div>
        </div>
    </div>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>