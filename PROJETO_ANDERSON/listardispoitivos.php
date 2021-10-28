<?php
    include 'connectionMysqlProage.php';
    $sql = "SELECT * FROM device";
    $resultado = mysqli_query($connectionMysqlProage, $sql);
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset = "utf-8">
          <meta name='viewport' content='width=device-width, initial-scale=1'>
          <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css' rel='stylesheet'>
          <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js'></script>
          <meta name='viewport' content='width=device-width, initial-scale=1'>    
          <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

        </head>

        <body>
        <div class='container mt-3'>
	<table border='1' class='table'>


   
  <thead>
			<tr><th colspan='6'>LISTA DISPOSITIVOS</th></tr>
      
          <tr>
                <td><b>Id</b></td>
                <td><b>Nome</b></td>
                <td><b>Part_number</b></td>
                <td colspan="2"><b><center>Ação</center></b></td> 
                
          </tr>
        <?php
          $query = "SELECT * FROM 'device'";
          $sql = mysqli_query($connectionMysqlProage,$sql); //cuidar variaveis iguais

          while($row = mysqli_fetch_array($sql)){

            $id = $row['id'];
            $name = $row['name'];
            $part_number = $row['part_number'];

            echo ("
              <tr>
                <td style='border:1px black solid';>" . $id . " </td>
                <td>" . $name . " </td>
                <td>" . $part_number . " </td>
                <td><a href='editarDevices.php?id=" . $id . "'>Editar</td>
                <td><a href='excluirDispositivos.php?id=" . $id . "'>Excluir</t>

            "
            );
            
          }
            ?>

</thead>
		<tbody>
        </table>

        <a href="cadastroDispositivos.php" >Cadastrar novo dispositivo</a>

        




	
</body>
</html>

        </body>
    
</html>
