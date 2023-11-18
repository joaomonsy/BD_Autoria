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
            <h1>Cadastrar Autor</h1>
            <img src="img-autor.svg" class="img" alt="img">
        </div>
        <div class="right-prod">
            <div class="card-prod">
                <div class="textfield">
                    <label for="produto">Nome</label>
                    <input type="text" name="Nome_Autor" placeholder="Digite o nome do autor">
                </div>
                <div class="textfield">
                    <label for="estoque">Sobrenome</label>
                    <input type="text" name="sobr" placeholder="Digite o sobrenome do autor">
                </div>
                <div class="textfield">
                    <label for="estoque">Email</label>
                    <input type="email" name="email" placeholder="Digite o Email do Autor">
                </div>
                <div class="textfield">
                    <label for="estoque">Data de Nascimento</label>
                    <input type="date" name="dt_nasc">
                </div>
                <input class="btnenviar" name="btnenviar" type="submit" value="Cadastrar">
                <input class="btnenviar" name="btnenviar" type="reset" value="Limpar">       
                <a href="../../menu.html" class="btn-voltar">Voltar</a>
                <?php
                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnenviar))
                {
                    include_once '../autor.php';
                    $pro= new Autor();
                    $pro->setNome_A($Nome_Autor);
                    $pro->setSobr($sobr);
                    $pro->setEmail($email);
                    $pro->setdt_nasc($dt_nasc);
                    echo "<h3 class = 'mensagem'>" . $pro->salvar() . "</h3>";
                }
                ?>    
                
            </div>
        </div>
    </div>

</form>


</body>
</html>

