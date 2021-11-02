<?php
    include 'connectionMysqlProage.php';
    $sql = "SELECT * FROM device;";
	$resultado = mysqli_query($connectionMysqlProage, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listar Dispositivos</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="container mt-3">
	<table border="1" class="table">

		<thead>
			<tr><th colspan="6">LISTA DOS DISPOSITIVOS</th></tr>
			<tr>
				<th>ID</th>
				<th>Nome do Dipositivo</th>
                <th>Porta</th>
			</tr>
		</thead>
		<tbody>
			<?php
				while ($registro = mysqli_fetch_array($resultado)) {
					echo "<tr>
							  <td>" . $registro['id']   . "</td>
							  <td>" . $registro['name'] . "</td>
                              <td>" . $registro['part_number'] . "</td>
						</tr>";

	                }
			?>
		</tbody>
	</table>
	<a href="index.php" style="color: #000000;">Voltar</a><br><br>
	
</div>
</body>
</style>
</html>
</html>