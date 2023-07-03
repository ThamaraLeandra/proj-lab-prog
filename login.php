<?php 

include "connect.inc.php";
include "classes.php";

$id = 0;


$usuario = new User($conn);

if (empty($_GET['page'])) {
    $page = 0;
} else {
    $page = $_GET['page'];
}
if (empty($edt)) {
    $edt[0]['ID'] = '';
    $edt[0]['nome'] = '';
    $edt[0]['email'] = '';
    $edt[0]['senha'] = '';
}

?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Formulário de Login e Registro com HTML5 e CSS3</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="style-cad.css" />
</head>
<body>
  <div class="container" >
    <a class="links" id="paracadastro"></a>
    <a class="links" id="paralogin"></a>
     
    <div class="content">      
      <!--FORMULÁRIO DE LOGIN-->
      <div id="login">
        <form method="post" action="formAction.php" method="post" id = "Formulario"> 
          <h1>Login</h1> 
          <p> 
            <input type="hidden" id="action" name="action" value="login">
            <label for="email_login">Seu email</label>
            <input id="email_login" name="email_login" required="required" type="text" placeholder="ex. contato@ext.com"/>
          </p>
           
          <p> 
            <label for="senha_login">Sua Senha</label>
            <input id="senha_login" name="senha_login" required="required" type="password" placeholder="ex. senha" /> 
          </p>
           
          <p> 
            <input type="checkbox" name="manterlogado" id="manterlogado" value="" /> 
            <label for="manterlogado">Manter-me logado</label>
          </p>
           
          <p> 
            <input type="submit" value="LOGIN">
          </p>
           
          <p class="link">
            Ainda não tem conta?
            <a href="#paracadastro">Cadastre-se</a>
          </p>
        </form>
      </div>
 
      <!--FORMULÁRIO DE CADASTRO-->
      <div id="cadastro">
        <form method="post" action="formAction.php" method="post" id = "Formulario1"> 
          <h1>Cadastro</h1> 
           
          <p> 
            <input type="hidden" id="action" name="action" value="insert">
            <label for="nome_cad">Seu nome</label>
            <input id="nome_cad" name="nome_cad" required="required" type="text" placeholder="nome" />
          </p>
           
          <p> 
            <label for="email_cad">Seu e-mail</label>
            <input id="email_cad" name="email_cad" required="required" type="email" placeholder="contato@ext.com"/> 
          </p>
           
          <p> 
            <label for="senha_cad">Sua senha</label>
            <input id="senha_cad" name="senha_cad" required="required" type="password" placeholder="ex. 1234"/>
          </p>
           
          <p> 
            <input type="submit" value="CADASTRAR" /> 
          </p>
           
          <p class="link">  
            Já tem conta?
            <a href="#paralogin"> Ir para Login </a>
          </p>
        </form>
      </div>
    </div>
  </div>  

  <script src="scripts.js"></script>
</body>

</html>