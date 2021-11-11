<?php
    include 'connectionMysqlProage.php';
    $sql = "SELECT people.name AS 'NOME', 
    guardian.id AS 'ID_GUARDIAN', 
	people.id AS 'ID_PEOPLE' 
	FROM people 
	INNER JOIN guardian 
	ON guardian.people_id=people.id;";
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
    <style type='text/css'>
            img#dropdownMenu1 {
                /* na verdade essa largura varia de acordo com o maiio link.
                   Defini isso apenas por estética. :
                */
                width: 172px;
            }
         </style>

</head>
<body>
	<div class='container mt-3'>
	<table border='1' class='table'>

		<thead>
			<tr><th colspan='6'>LISTA DOS IDOSOS</th></tr>
			<tr align='center'>
				<th >ID</th>
				<th>Nome do guardião</th>
				<th>Editar os dados</th>
				<th>Excluir</th>
				<th>Idosos vinculados</th>
			</tr>
		</thead>
		<tbody>
			<?php
				while ($registro = mysqli_fetch_array($resultado)) {
					$idGuardian = $registro['ID_GUARDIAN'];

					$sqlElderlyId = "SELECT elderly_id AS 'ID_IDOSO' FROM guardian_has_elderly WHERE guardian_id= '$idGuardian';";
					$queryElderlyId = mysqli_query($connectionMysqlProage, $sqlElderlyId);
					//$registroElderlyId = mysqli_fetch_array($queryElderlyId);
					

					if(!$registroElderlyId = mysqli_fetch_array($queryElderlyId)){
						$mensagem = "Sem idosos!";

					}else{
						$resultadoElderlyId = $registroElderlyId['ID_IDOSO'];
						$sqlElderlyIdPeople = "SELECT people_id AS 'ID_IDOSO_PEOPLE' FROM elderly WHERE id='$resultadoElderlyId';";
						$queryElderlyIdPeople = mysqli_query($connectionMysqlProage, $sqlElderlyIdPeople);
						$registroElderlyIdPeople = mysqli_fetch_array($queryElderlyIdPeople);
						$resultadoElderlyIdPeople = $registroElderlyIdPeople['ID_IDOSO_PEOPLE'];
						

						$sqlBond = "SELECT people.name AS 'NOME_IDOSO' FROM people
						INNER JOIN elderly ON  elderly.people_id=people.id WHERE elderly.people_id='$resultadoElderlyIdPeople';";
						$resultadoBond = mysqli_query($connectionMysqlProage, $sqlBond);
					}

					echo "<tr>
							<td>" . $registro['ID_GUARDIAN']. "</td>
							<td>" . $registro['NOME'] . "</td>
							
							<td><a href=updateGuardian.php?idGuardianPeople=".$registro['ID_PEOPLE'].">
							<img src='imagens/WRITE3.ICO' width='20px' height='20px' align='center'></a></td>
							
							<td><a href=deleteElderly.php?idGuardianPeople=".$registro['ID_PEOPLE'].">
							<img src='imagens/009.ICO' width='20px' height='20px'  onclick='return confirm('Tem certeza que deseja deletar esse registro?')'></a></td>	  
						";
						
							while($registroBond = mysqli_fetch_array($resultadoBond)){
								echo "
									<td>".$registroBond['NOME_IDOSO']."<br></td> 
									</tr>
									";
							}
	            }
			?>
		</tbody>
	</table>
	<a href='index.php' style='color: #000000;'>
		<img src='imagens/voltar.png'  width='20px' height='20px'> 
		Voltar
	</a>
	
		<a href='idosoRegistrationForm.php' style='color: #000000;'>
		<img src='imagens/add1600.png'  width='20px' height='20px' > 
		Adicionar
	</a>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>        
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</div>
</body>
</html>