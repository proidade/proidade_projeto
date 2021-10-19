<?php
    include 'connectionMysqlProage.php';
    $sql = "SELECT people.name AS 'NOME', elderly.id AS 'ID_ELDERLY', people.id AS 'ID_PEOPLE' FROM people INNER  JOIN elderly ON elderly.people_id=people.id;";
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
				<th>Nome do idoso</th>
				<th>Editar os dados</th>
				<th>Excluir</th>
				<th>Guardiões</th>
			</tr>
		</thead>
		<tbody>
			<?php
				while ($registro = mysqli_fetch_array($resultado)) {
					echo "<tr>
							<td>" . $registro['ID_ELDERLY']   . "</td>
							<td>" . $registro['NOME'] . "</td>
							
							<td><a href=updateElderly.php?idIdosoPeople=".$registro['ID_PEOPLE'].">
							<img src='imagens/WRITE3.ICO' width='20px' height='20px' align='center'></a></td>
							
							<td><a href=deleteElderly.php?idIdosoPeople=".$registro['ID_PEOPLE'].">
							<img src='imagens/009.ICO' width='20px' height='20px'  onclick='return confirm('Tem certeza que deseja deletar este registro?')'></a></td>

							<td>
								<div class='row'>
									<div class='col-md-12'>            
										<div class='dropdown'>
										<!-- Imagem como botão -->
										<img src='imagens/guardian.png' width='20px' height='20px' align='center'
											data-toggle='dropdown' 
											aria-haspopup='true' 
											aria-expanded='true'> 
											<ul class='dropdown-menu' aria-labelledby='dropdownMenu1'>
												<li><a href=listarGuardian.php?idIdosoPeople=" . $registro['ID_PEOPLE'] . " type='submit'>Listar os guardiões</a></li>
												<li><a href=supplierRegistration.php?idIdosoPeople=" . $registro['ID_PEOPLE'] . " type='submit'>Adicionar mais guardiões</a></li>
											</ul>
										</div>
									</div> <!-- end col -->
								</div>  <!-- end row -->
							</td>	  
						</tr>";
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