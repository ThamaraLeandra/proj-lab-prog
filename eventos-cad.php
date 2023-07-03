<?php
    include "connect.inc.php";
    include "classes.php";

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <title>cadastrar eventos</title>

  <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- Conteúdo -->
<section class="container2">
    <div class="formulario">
        <div class = "itens">
            <p>Title:</p>
            <p>Description:</p>
            <p>Date:</p>
            <p>Time:</p>
            <p>Location:</p>
            <p>Category:</p>
            <p>Price:</p>
            <p>Images:</p>
        </div>
        <form action="formAction.php" method="post">
            <div id = "inputs">
                <input type="hidden" name="ID" value="<?php echo $edt[0]['ID']; ?>">
                <input type="hidden" name="action" value="cadastro-event">
                <input type="text" name="title" id="title" placeholder="ex. Nome Evento"><br>
                <input type="text" name="description" id="description" placeholder="ex. Descrição"><br>
                <input type="date" name="date" id="date" placeholder="ex. 1999/12/25"><br>
                <input type="text" name="time" id="time" placeholder="ex. 12:45"><br>
                <input type="text" name="location" id="location" placeholder="ex. endereço"><br>
                <input type="text" name="category" id="category" placeholder="ex. categoria"><br>
                <input type="text" name="price" id="price" placeholder="ex. 50.00"><br>
                <input type="text" name="images" id="images" placeholder="ex. imagens"><br>
                <input type="submit" value="CADASTRAR EVENTO">
            </div>
            
        </form>     
    </div>
</section>

<br>
<a href="index.php"><button class = "butao">VOLTAR PÁGINA</button></a>

<script src="scripts.js"></script>
</body>
</html>