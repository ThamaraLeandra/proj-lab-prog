<?php
  include "connect.inc.php";
  include "classes.php";

  $id = 0;

  $evento = new Event($conn);

  if (empty($_GET['page'])) {
      $page = 0;
  } else {
      $page = $_GET['page'];
  }
  $total = $evento->getNumRegistros();
  $totalRegistros = $total[0]['total'];

  $numPages = ceil($totalRegistros/5);

  $res = $evento->readPag($page);

  $edt = $evento->readOne($id);

  if (empty($edt)) {
      $edt[0]['title'] = '';
      $edt[0]['description'] = '';
      $edt[0]['date'] = '';
      $edt[0]['time'] = '';
      $edt[0]['location'] = '';
      $edt[0]['category'] = '';
      $edt[0]['price'] = '';
      $edt[0]['images'] = '';
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">

    <title>eventos</title>

    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>

  <body>

    <p class = "titulo"> Editar Eventos </p>
    <br>
    <section class="container3">
    <div class="formulario">
        <div class = "itens">
            <p>ID:</p>
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
            <div id = "input">
                <input type="text" name="ID" id="ID" placeholder="Digite o ID"><br>
                <input type="hidden" name="action" value="edit-event">
                <input type="text" name="title" id="title" placeholder="ex. Nome Evento"><br>
                <input type="text" name="description" id="description" placeholder="ex. Descrição"><br>
                <input type="date" name="date" id="date" placeholder="ex. 1999/12/25"><br>
                <input type="text" name="time" id="time" placeholder="ex. 12:45"><br>
                <input type="text" name="location" id="location" placeholder="ex. endereço"><br>
                <input type="text" name="category" id="category" placeholder="ex. categoria"><br>
                <input type="text" name="price" id="price" placeholder="ex. 50.00"><br>
                <input type="text" name="images" id="images" placeholder="ex. imagens"><br><br>
                <input type="submit" value="EDITAR EVENTO"><br><br>
            </div>
            
        </form>     
    </div>
</section>   

        <div id="bottom-cad">
            <a href="index.php"><button class="butao">Voltar</button></a>
         </div>
    <!-- Lista -->
            <!--<section class="container">-->
            <div class = "container">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Images</th>
                        
                    </tr>

                    <?php 
                    foreach ($res as $a) {
                        echo("
                            <tr>
                            <td>{$a['ID']}</td>
                            <td>{$a['title']}</td>
                            <td>{$a['description']}</td>
                            <td>{$a['date']}</td>
                            <td>{$a['time']}</td>
                            <td>{$a['location']}</td>
                            <td>{$a['category']}</td>
                            <td>{$a['price']}</td>
                            <td>{$a['images']}</td>
                            </tr>   
                        ");
                    }
                    ?>        
                </table>

                <br>
                <?php 
                for ($i=0; $i<$numPages; $i++) {
                    echo("<a href='eventos-edit.php?page=$i'>" . $i+1 . "</a>&nbsp;&nbsp;");
                }
                ?> 
            </div>
            <!--</section>-->
  </body>
      
  <script src="scripts.js"></script>
</html>