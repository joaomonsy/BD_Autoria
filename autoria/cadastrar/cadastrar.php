<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastrar</title>
</head>
<body>
    
<form name="cliente" method = "POST" action = "">
    <div class="main-prod">
        <div class="left-prod">
            <h1>Cadastrar Autoria</h1>
            <img src="img-autoria.svg" class="img" alt="img">
        </div>
        <div class="right-prod">
            <div class="card-prod">
                <div class="textfield">
                    <label for="produto">Código do Autor</label>
                    <input type="number" name="cod_aut" placeholder="Digite o código do autor">
                </div>
                <div class="textfield">
                    <label for="estoque">Código do Livro</label>
                    <input type="number" name="cod_liv" placeholder="Digite código do livro">
                </div>
                <div class="textfield">
                    <label for="estoque">Data de Lançamento</label>
                    <input type="date" name="date">
                </div>
                <div class="textfield">
                    <label for="estoque">Editora</label>
                    <input type="text" name="edit" placeholder="Digite o nome da editora do livro">
                </div>
                <input class="btnenviar" name="btnenviar" type="submit" value="Cadastrar">
                <input class="btnenviar" name="btnenviar" type="reset" value="Limpar">       
                <a href="../../menu.html" class="btn-voltar">Voltar</a>
                <?php
                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnenviar))
                {
                    include_once '../Autoria.php';
                    $pro= new Autoria();
                    $pro->setCod_A($cod_aut);
                    $pro->setCod_L($cod_liv);
                    $pro->setDt_lanc($date);
                    $pro->setEdit($edit);

                    echo "<h3 class = 'mensagem'>" . $pro->salvar() . "</h3>";
                }
                ?>    
                
            </div>
        </div>
    </div>

</form>


</body>
</html>

