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

    <p class = "titulo"> Buscar Eventos </p>
    <br>
    <div class = "container1">
      
      <div id="divBusca">
        
        <form action="formAction.php" method="post">

          <input type="text" id="pesq" placeholder="Digite o nome..."/>
          <input type="hidden" name="action" value="pesquisar-event">
          <input type="submit" id = "pesquisar" value="Pesquisar">
          
        </form>
      </div>
      <div id="bottom-cad">
        <a href="eventos-cad.php"><button class="butao">Cadastrar Eventos</button></a>
        <a href="eventos-edit.php"><button class="butao">Editar Eventos</button></a>
      </div>
    </div>

    <!-- Lista -->
      <div class = "container">
          <table>
            <tr>
                
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
            echo("<a href='index.php?page=$i'>" . $i+1 . "</a>&nbsp;&nbsp;");
        }
        ?> 
      </div>
            
  </body>
      
  <script src="scripts.js"></script>
</html>