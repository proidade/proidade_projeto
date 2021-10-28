<?php
     include 'connectionMysqlProage.php';
    $sql = "SELECT * FROM sensor";
    $resultado = mysqli_query($connectionMysqlProage, $sql);


?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset = "utf-8">
            <style>
            body {
      background:linear-gradient(to left, #007bff, #9198e5);
    }
                           
            </style>

        </head>   <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css' rel='stylesheet'>
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js'></script>
  <meta name='viewport' content='width=device-width, initial-scale=1'>    
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
   


        <body>

        <div class="banner">

  <center>
   
  <div class='container mt-3'>
	<table border='1' class='table'>

		<thead>
			<tr><th colspan='6'>LISTA RECORDER</th></tr>
          <tr>
                <td><b>Id</b></td>
                <td><b>Nome</b></td>
                <td><b>Descrição</b></td>
                <td><b>Capacibilidade</b></td>
                <td><b>Part_Numer</b></td>
                
                <td colspan="2"><b><center>Ação</center></b></td> 
                
          </tr>
        <?php
          $query = "SELECT * FROM 'device'";
          $sql = mysqli_query($connectionMysqlProage,$sql); //cuidar variaveis iguais

          while($row = mysqli_fetch_array($sql)){

            $id = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $capability = $row['capability'];
            $part_number = $row['part_number'];
            
             
            echo ("
              <tr>
                <td style='border:1px black solid';>" . $id . " </td>
                <td>" . $name . " </td>
                <td>" . $description . " </td>
                <td>" . $capability . " </td>
                <td>" . $part_number . " </td>
                
                <td><a href='editarDispositivos.php?idPizza=" . $id . "'>Editar</td>
                <td><a href='excluirDispositivos.php?idPizza=" . $id . "'>Excluir</t>
              </tr>"
            );
            
          }

        



            ?>
            	</thead>
		<tbody>

          
        </div>
        </body>
    
</html>