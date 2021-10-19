<?php
    include 'connectionMysqlProage.php';
	$identificadorPeople = $_GET['idIdosoPeople'];

	$elderly = "SELECT elderly.id AS 'ID' FROM elderly INNER JOIN people ON people.id=elderly.people_id WHERE people.id = '$identificadorPeople';";
	$idElderly = mysqli_query($connectionMysqlProage ,  $elderly);
	$registroElderly = mysqli_fetch_array($idElderly);
	$resultIdElderly = $registroElderly['ID'];

	$guardian = "SELECT guardian_id AS 'ID' FROM guardian_has_elderly WHERE elderly_id = '".$resultIdElderly."';";
	$idGuardian = mysqli_query($connectionMysqlProage, $guardian);
	$registroGuardian = mysqli_fetch_array($idGuardian);
	$resultIdGuardian = $registroGuardian['ID'];

	$guardianPeople = "SELECT people_id AS 'ID' FROM guardian WHERE id = '".$resultIdGuardian."';";
	$idGuardianPeople = mysqli_query($connectionMysqlProage, $guardianPeople);
	$registroGuardianPeople = mysqli_fetch_array($idGuardianPeople);
	$resultIdGuardianPeople = $registroGuardianPeople['ID'];


	echo $resultIdGuardian."<br>";
	echo $resultIdElderly."<br>";
	echo $resultIdGuardianPeople."<br>";

    $sql = "SELECT people.id AS 'ID_PEOPLE', people.name AS 'NOME', guardian_has_elderly.guardian_id AS 'ID' FROM people INNER  JOIN guardian ON guardian.people_id=people.id  INNER JOIN guardian_has_elderly ON guardian_has_elderly.elderly_id = '$resultIdElderly' AND guardian.people_id='$resultIdGuardianPeople';";
	$resultado = mysqli_query($connectionMysqlProage, $sql);
	echo $sql;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listar Guardiões</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="container mt-3">
		<table border="1" class="table">
			<thead>
				<tr><th colspan="6">LISTA DOS GUARDIÕES</th></tr>
				<tr>
					<th>ID</th>
					<th>Nome do guardião</th>
					<th>Editar os dados</th>
					<th>Excluir</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while ($registro = mysqli_fetch_array($resultado)) {
						echo "<tr>
								<td>" . $registro['ID']   . "</td>
								<td>" . $registro['NOME'] . "</td>
								<td><a href=updateGuardian.php?idGuardianPeople=".$registro['ID_PEOPLE'].">
								<img src='imagens/WRITE3.ICO' width='20px' height='20px' align='center'></a></td>
								
								<td><a href=deleteGuardian.php?idGuardianPeople=".$registro['ID_PEOPLE'].">
								<img src='imagens/009.ICO' width='20px' height='20px'  onclick='return confirm('Tem certeza que deseja deletar este registro?')'></a></td>
	 
							</tr>";

						}
				?>
			</tbody>
		</table>
		<a href='listarIdoso.php' style='color: #000000;'>
		<img src='imagens/voltar.png'  width='20px' height='20px'> 
		Voltar
		</a>
	
		<a href='guardianRegistration.html' style='color: #000000;'>
		<img src='imagens/add1600.png'  width='20px' height='20px' > 
		Adicionar
		</a>

	</div>
</body>

</html>
