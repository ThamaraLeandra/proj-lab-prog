<?php
  include "connect.inc.php";
  include "classes.php";

  $id = 0;

  $evento = new Event($conn);

  
   $edt = $evento->readOne($_POST['pesq']);
  //$edt = $evento->readOne($id);

  if (empty($edt)) {
        $edt[0]['ID'] = '';
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

        <div id="bottom-cad">
            <a href="index.php"><button class="butao">Voltar</button></a>
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
                foreach ($edt as $a) {
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
        </div>
           
  </body>
      
  <script src="scripts.js"></script>
</html>