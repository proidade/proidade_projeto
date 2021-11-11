<!DOCTYPE html>
    <head>
        <title>PLATAFORMA PRO-ID@DE</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/index.css">
    </head>

    <body>
		<div class="fundo" style="background-color: #aae2e9;">
		
			<font id="fonteT">PLATAFORMA</font>
			<nav>
				<ul class="menu">
					<li><a href="#">Início</a></li>
					<li><a href="#">Dispositivos</a>
						<ul>
							<li><a href="listarDevices.php" type="submit">Listar</a></li>
							<li><a href="#" type="submit">Inserir</a></li>
							
						</ul>
					</li>
							
					<li><a href="#">Sensores</a>
						<ul>
							<li><a href="#" type="submit">Listar</a></li>
							<li><a href="#" type="submit">Inserir</a></li>
							
						</ul>
					
					</li>
					<li><a href="#">Fornecedores</a>
						<ul>
							<li><a href="listarSupplier.php" type="submit">Listar</a></li>
							<li><a href="supplierRegistration.php" type="submit">Inserir</a></li>
						
						</ul>
					</li>
					<li><a href="#">Idoso</a>
						<ul>
							<li><a href="listarIdoso.php" type="submit">Listar</a></li>
							<li><a href="#" type="submit">Inserir</a></li>
							
						</ul>
					</li>
					<li><a href="#">Guardião</a>
						<ul>
							<li><a href="listarGuardian.php">Listar</a></li>
							<li><a href="guardianRegistration.php">Inserir</a></li>
							
						</ul>
					</li>

				</ul>
			</nav>

			<img src="imagens/Pro-idade_1.png" width="242px" height="133px" style="padding-left: 15px; margin-top: 8px;">
		</div>

		<div class="anos">
		<!--Caixas-->
	
		<legend>Escolha a opção desejada:</legend><br><br>
			<div class="registrationSystem">
				<div class="container">
		           <div class="rs_item"><center>
					<br><font size="4"<p class="tituloCadastro">Novo dispositivo </p></font>
					<img src="imagens/arduino_icon.png" width="100px"; height="100px" style="padding-left: 15px; margin-top: 8px;"><br>
		                <form action="devicesRegistration.php" method="POST">
		                    <input type="submit" name="cadastrar1" id="cadastarButtonID" class="ButtonClass" value="CADASTRAR"></center>
		                </form>
		           
			    </div>

			    <div class="rs_item"><center>
					<br><font size="4"<p class="tituloCadastro">Novo sensor</font>
					<form action="dadosSensores.php" method="POST">
						<img src="imagens/sensor.png" width="100px"; height="100px" style="padding-left: 15px; margin-top: 8px;"><br>
		            	<input type="submit" name="cadastrar2" id="cadastarButtonID" class="ButtonClass" value="CADASTRAR"><br>
					</form></center>
			    </div>

				
			    <div class="rs_item"><center>
				<br><font size="4" <p class="tituloCadastro">Cadastrar fornecedor </p></font>
					<form action="supplierRegistration.php" method="POST">
						<img src="imagens/supplier.png" width="120px"; height="100px" style="padding-left: 15px; margin-top: 8px;"><br>
		            	<input type="submit" name="cadastrar3" id="cadastarButtonID" class="ButtonClass" value="CADASTRAR">
					</form></center>

			    </div>

			</div><br>

		<!--Linha 2-->

			<!--Caixas-->
			
			<div class="registrationSystem">
				<div class="container">
			    <div class="rs_item"><center>

			    	<br><font size="4" <p class="tituloCadastro">Cadastrar idoso </p></font>
					<form action="idosoRegistrationForm.php" method="POST">
						<img src="imagens/idoso.png" width="100px"; height="100px" style="padding-left: 15px; margin-top: 8px;"><br>
		            	<input type="submit" name="cadastrar4" id="cadastarButtonID" class="ButtonClass" value="CADASTRAR">
					</form></center>
			    </div>																																										
			</div>    	 
			
			<div class="registrationSystem">
				<div class="container">
			    <div class="rs_item"><center>

			    	<br><font size="4" <p class="tituloCadastro">Fazer uma instalação </p></font>
					<form action="installation.php" method="POST">
						<img src="" width="100px"; height="100px" style="padding-left: 15px; margin-top: 8px;"><br>
		            	<input type="submit" name="cadastrar4" id="cadastarButtonID" class="ButtonClass" value="CADASTRAR">
					</form></center>
			    </div>																																										
			</div>    
		</div>

</body>
</html>