  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="https://kit.fontawesome.com/cf6fa412bd.js" crossorigin="anonymous" language=javascript>
</script>
  </head>
  <body>
  <script language=javascript>
          function blokletras(keypress)
          {

          // campo senha - bloqueia letras
            if (keypress>=48 && keypress<=57)
              {
                return true;
              }
              else
              {
                return false; 
              }
          }
          
          function Mascara (keypress)
                {
                // telefone 1 - bloqueia letras e insere na máscara automaticamente if (keypress>=48 && keypress<=57)
                if (keypress>=48 && keypress<=57)
                  {
                separadorl = '(';
                separador2 = ')';
                separador3 = '-';
                separador4 = ' ';
                conjuntol = 0;
                conjunto2 = 3;
                conjunto3 = 10;
                conjunto4 = 4;
                if (eval(document.signup.tel.value.length) == conjuntol)
                {
                document.signup.tel.value = document.signup.tel.value + separadorl;
                }
                if (eval(document.signup.tel.value.length) == conjunto2)
                {
                document.signup.tel.value = document.signup.tel.value + separador2;
                }
                if (eval(document.signup.tel.value.length) == conjunto3) 
                {
                document.signup.tel.value = document.signup.tel.value + separador3; 
                }
                if (eval(document.signup.tel.value.length) == conjunto4) 
                {
                document.signup.tel.value = document.signup.tel.value + separador4; 
                }
                return true;
              }
            else
              {
                return false;
              }
              }
    </script>

    <div class="container">
      <div class="buttonsForm">
        <div class="btnColor"></div>
        <button id="btnSignin">Entrar</button>
        <button id="btnSignup">cadastrar</button>
      </div>

      <form id="signin" method="post">
        <input type="text" placeholder="Usuario" required name="txtnome" />
        <i class='fas fa-user-alt iEmail'></i>        

        <input type="password" id="password" placeholder="Senha" required maxlength="3" name="txtsenha" onkeypress="return blokletras(window.event.keyCode)"/>
        <i class="fas fa-lock iPassword"></i>
        <i class="bi bi-eye-slash" id="togglePassword"></i>

        <button type="submit" name="btnconsultar3">Entrar</button>
      </form>

      <form id="signup" method="post" name="signup">
        <input type="text" placeholder="Usuario" required name="txtnome2" />
        <i class='fas fa-user-alt iEmail'></i>

        <input type="text" placeholder="(99) 99999-9999" required maxlength="15" minlength="15" name="tel" onkeypress="return Mascara(window.event.keyCode)" />
        <i class="bi bi-telephone-fill iTel"></i>

        <input type="password" id="password2" placeholder="Senha" required maxlength="3" name="txtsenha2" onkeypress="return blokletras(window.event.keyCode)"/>
        <i class="fas fa-lock iPassword2"></i>
        <i class="bi bi-eye-slash" id="togglePassword2"></i>

        <input type="password" id="password3" placeholder="Senha" required maxlength="3" name="txtsenha3" onkeypress="return blokletras(window.event.keyCode)"/>
        <i class="fas fa-lock iPassword3"></i>
        <i class="bi bi-eye-slash" id="togglePassword3"></i>

        <button type="submit" name="btnconsultar2" >Cadastrar</button>
      </form>
      <div class="msg"></div>
      <div class="message">
        <?php
        include_once 'usuario.php';
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnconsultar3))
        {
          $u = new Usuario();
          $u->setUsu($txtnome);
          $u->setSenha($txtsenha);
          $pro_bd = $u->logar();
    
          $existe = false;
          foreach($pro_bd as $pro_mostrar)
          {
            $existe = true;
            if (count($pro_bd) > 0) {
              echo "Bem vindo! Usuário: " . $pro_mostrar[0];
              ?>
              <br><br><a href="../menu.html" class="btn-voltar">Entrar<br></a>
              <br><br><br><br>
              <?php
          }
        }
          if ($existe == false) {
            echo "Login inválido";
          }
          }
        

        extract($_POST, EXTR_OVERWRITE);
        if(isset($btnconsultar2))
        {
          if ($txtsenha2 == $txtsenha3) {
            $pro= new Usuario();
            $pro->setUsu($txtnome2);
            $pro->setSenha($txtsenha3);
            echo "<h3 class = 'mensagem'>" . $pro->salvar() . "<br><br></h3>";
          }
          else {
            echo "<h3 class = 'mensagem'> Senha incorreta </h3>";
          }
        }
        ?>

        <script>
        const togglePassword = document.querySelector("#togglePassword");
        const togglePassword2 = document.querySelector("#togglePassword2");
        const togglePassword3 = document.querySelector("#togglePassword3");
        const password = document.querySelector("#password");
        const password2 = document.querySelector("#password2");
        const password3 = document.querySelector("#password3");

        togglePassword.addEventListener("click", function () {

            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            this.classList.toggle("bi-eye");
        });

        togglePassword2.addEventListener("click", function () {

            const type2 = password2.getAttribute("type") === "password" ? "text" : "password";
            password2.setAttribute("type", type2);
            this.classList.toggle("bi-eye");
        });

        togglePassword3.addEventListener("click", function () {

            const type3 = password3.getAttribute("type") === "password" ? "text" : "password";
            password3.setAttribute("type", type3);
            this.classList.toggle("bi-eye");
        });
        </script>
      
    </div>
      </div>
    <script src="index.js"></script>
  </body>
  </html>