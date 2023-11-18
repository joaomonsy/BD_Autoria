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
    
<form name="Autor" method = "POST" action = "">
    <div class="main-prod">
        <div class="left-prod">
            <h1>Cadastrar Livro</h1>
            <img src="img-livro.svg" class="img" alt="img">
        </div>
        <div class="right-prod">
            <div class="card-prod">
                <div class="textfield">
                    <label for="produto">Título</label>
                    <input type="text" name="titulo" placeholder="Digite o Título do livro">
                </div>
                <div class="textfield">
                    <label for="estoque">Categoria</label>
                    <input type="text" name="cat" placeholder="Digite a categoria do livro">
                </div>
                <div class="textfield">
                    <label for="estoque">ISBN</label>
                    <input type="number" name="isbn" placeholder="Digite o ISBN do livro">
                </div>
                <div class="textfield">
                    <label for="estoque">Idioma</label>
                    <input type="text" name="idioma" placeholder="Digite o idioma do livro">
                </div>
                <div class="textfield">
                    <label for="estoque">Quantidade de páginas</label>
                    <input type="number" name="qtde_pag" placeholder="Digite a quantidade de páginas do livro">
                </div>
                <input class="btnenviar" name="btnenviar" type="submit" value="Cadastrar">
                <input class="btnenviar" name="btnenviar" type="reset" value="Limpar">       
                <a href="../../menu.html" class="btn-voltar">Voltar</a>
                <?php
                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnenviar))
                {
                    include_once '../livro.php';
                    $pro= new Livro();
                    $pro->setTitulo($titulo);
                    $pro->setCat($cat);
                    $pro->setISBN($isbn);
                    $pro->setIdioma($idioma);
                    $pro->setQtdePag($qtde_pag);
                    echo "<h3 class = 'mensagem'>" . $pro->salvar() . "</h3>";
                }
                ?>    
                
            </div>
        </div>
    </div>

</form>


</body>
</html>

