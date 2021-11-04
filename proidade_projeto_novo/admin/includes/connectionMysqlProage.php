<?php
$connectionMysqlProage = mysqli_connect('b26lseq4krzcvzzrah9q-mysql.services.clever-cloud.com', 'uoigdcctppco1yo5', '04Ca16RGTmMyd48PDVCT', 'b26lseq4krzcvzzrah9q');
mysqli_set_charset($connectionMysqlProage, 'utf8');
if ($connectionMysqlProage->connect_error) {
    die("Falha ao realizar a conexão: " . $connectionMysqlProage->connect_error);
}