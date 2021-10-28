<?php
    
    include 'connectionMysqlProage.php';
  $sql = "SELECT * FROM recorder";
  $resultado = mysqli_query($connectionMysqlProage, $sql);
    

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listar Idosos</title>
	<meta charset='utf-8'>
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
			<tr><th colspan='6'>LISTA RECORDER</th></tr>
			<tr align='center'>
				<th >ID</th>
				<th>Data e hora</th>
				<th>Patient ID</th>
				<th>IP</th>
				<th>Device ID</th>
        <th>Sensor ID</th>
        <th>Type</th>
       
        <th>Valor</th>
        <th>Observação</th>
			
			</tr>

      <?php
           $query = "SELECT * FROM recorder";
           $sql = mysqli_query($connectionMysqlProage,$sql); //cuidar variaveis iguais
 
           while($row = mysqli_fetch_array($sql)){

            $id = $row['id'];
            $date_time = $row['date_time'];
            $patient_id = $row['patient_id'];
            
            $ip = $row['origin'];
            $device_id = $row['device_id'];
            $sensor_id = $row['sensor_id'];
            $type = $row['type'];
            $value = $row['value'];
            $observation = $row['observation'];
            
            echo ("
              <tr>
                <td style='border:1px black solid';>" . $id . " </td>
                <td>" . $date_time . " </td>
                <td>" . $patient_id . " </td>
                <td>" . $ip . " </td>
                <td>" . $device_id . " </td>
                <td>" . $sensor_id . " </td>
                <td>" . $type . " </td>
                <td>" . $value . " </td>
                <td>" . $observation . " </td>
                
            "
            );
            
          }
            ?>


		</thead>
		<tbody>
			<?php ?>
			
		</tbody>
	</table>
		
	
	
	</a>

	</div>
</body>
</html>