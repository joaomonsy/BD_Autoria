
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>alterar</title>
</head>
<body>
    <div class="main-prod">
        <div class="left-prod">
            <h1>Alterar Autor</h1>
            <form name="cliente" method="POST" action="alterar2.php">

                <fieldset>
                    <legend><b>Informe o Código do autor desejado: </b></legend>
                    Cód. Autor: <input class="id" type="text" name="txtid" size="20" maxlength="5" placeholder="Código do autor">
                    <br><br>
                    <input class="btnenviar" name="btnenviar" type="submit" value="Consultar">
                    <input class="btnenviar" name="btnresetar" type="reset" value="Limpar">
                    <a href = "../../menu.html" class="btn-voltar"> Voltar </a>
                </fieldset>
            </form>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>