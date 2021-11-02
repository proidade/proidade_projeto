<?php 
   //cria a conexao mysqli_connect('localizacao BD', 'usuario de acesso', 'senha', 'banco de dados')
		$connectionMysqlProage = mysqli_connect('b26lseq4krzcvzzrah9q-mysql.services.clever-cloud.com', 'uoigdcctppco1yo5', '04Ca16RGTmMyd48PDVCT', 'b26lseq4krzcvzzrah9q');

		//ajusta o charset de comunicação entre a aplicação e o banco de dados
		mysqli_set_charset($connectionMysqlProage, 'utf8');

		//verifica a conexão
		if ($connectionMysqlProage->connect_error) {
		    die("Falha ao realizar a conexão: " . $connectionMysqlProage->connect_error);
} 
    
    /*MYSQL_ADDON_HOST= b26lseq4krzcvzzrah9q-mysql.services.clever-cloud.com
    MYSQL_ADDON_DB = b26lseq4krzcvzzrah9q
    MYSQL_ADDON_USER = uoigdcctppco1yo5
    MYSQL_ADDON_PORT = 3306
    MYSQL_ADDON_PASSWORD = '04Ca16RGTmMyd48PDVCT'; 
    MYSQL_ADDON_URI = mysql://uoigdcctppco1yo5:04Ca16RGTmMyd48PDVCT@b26lseq4krzcvzzrah9q-mysql.services.clever-cloud.com:3306/b26lseq4krzcvzzrah9q
*/
?>
