<?php

include 'connectionMysqlProage.php';

if (isset($_POST['cadastrar'])) {
     $nomeGuardian         = $_POST['guardiaoNome'];
     $data_nascGuardian    = $_POST['guardiaoNascimento'];
     $cpfGuardian          = $_POST['cpfGuardian'];
     $relative_degree = $_POST['relative_degree'];
     $selectNomeIdoso = $_POST['selectNomeIdoso'];
     $cpfGuardiaoIdoso = $_POST['cpfGuardiaoIdoso'];
    
     /*informações de endereço */
     $typeGuardian        = $_POST['typeGuardian'];
     $zipcodeGuardian     = $_POST['cepGuardian'];
     $streetGuardian      = $_POST['ruaGuardian'];
     $numberGuardian      = $_POST['numberAddressGuardian'];
     $cityGuardian        = $_POST['cidadeGuardian'];
     $complementGuardian  = $_POST['complementGuardian'];
     $areaGuardian        = $_POST['bairroAddressGuardian'];
     $countryGuardian     = $_POST['paisGuardian'];
     $stateGuardian       = $_POST['ufGuardian'];

     /*informações de contato*/ 
     $celularGuardian     = $_POST['celularGuardian'];
     $telefoneGuardian    = $_POST['telefoneGuardian'];
     $emailGuardian       = $_POST['emailGuardian'];
     $whatsappGuardian    = $_POST['wppGuardian'];
     $telegramGuardian    = $_POST['tllGuardian'];
         
     $sqlPeopleGuardian = "INSERT INTO people VALUES (NULL, '$nomeGuardian', '$data_nascGuardian', '$cpfGuardian');";
     $resultadoPeopleGuardian = mysqli_query($connectionMysqlProage , $sqlPeopleGuardian);

     /*Pegando o idPessoa da tabela pessoa*/
     $sqlPeople2Guardian = "SELECT id FROM people WHERE cpf = '$cpfGuardian';";
     $idPessoaGuardian = mysqli_query($connectionMysqlProage ,  $sqlPeople2Guardian);
     $registroGuardian = mysqli_fetch_array($idPessoaGuardian);
     $resultIdPessoaGuardian = $registroGuardian['id'];

     /*Inserindo os dados na tabela elderly*/
     $sqlGuardian = "INSERT INTO guardian VALUES (NULL, '$relative_degree', $resultIdPessoaGuardian);";
     $resultadoGuardian = mysqli_query($connectionMysqlProage , $sqlGuardian);


    /*id	type	zipcode	street	number	city	complement	area	country	people_id	state*/ 
    /*inserindo os dados na tabela Address*/
     $sqlAddressGuardian = "INSERT INTO address VALUES (NULL, '$typeGuardian', '$zipcodeGuardian', '$streetGuardian', $numberGuardian, '$cityGuardian', '$complementGuardian', '$areaGuardian', '$countryGuardian', $resultIdPessoaGuardian, '$stateGuardian');";
     $resultadoAddressGuardian = mysqli_query($connectionMysqlProage, $sqlAddressGuardian);


    $sqlContatoTypeGuardian = "INSERT INTO contact_type VALUES (NULL, '$nomeGuardian');";
    $resultadoContatoTypeGuardian = mysqli_query($connectionMysqlProage , $sqlContatoTypeGuardian);

    /*Pegando o contacttype_id da tabela contact_type*/
    $sqlContatoTypeGuardian2 = "SELECT id FROM contact_type WHERE name = '$nomeGuardian';";
    $contacttype_idGuardian = mysqli_query($connectionMysqlProage ,  $sqlContatoTypeGuardian2);
    $registroContatoTypeGuardian = mysqli_fetch_array($contacttype_idGuardian);
    $resultcontacttype_idGuardian = $registroContatoTypeGuardian['id'];

    /*id	contacttype_id	value	people_id    whatsapp     celular      email	telegram*/
    $sqlContatoGuardian = "INSERT INTO contact VALUES (NULL, $resultcontacttype_idGuardian, NULL, $resultIdPessoaGuardian, '$whatsappGuardian', '$celularGuardian', '$emailGuardian', '$telegramGuardian');";
    $resultadoContatoGuardian = mysqli_query($connectionMysqlProage , $sqlContatoGuardian);

    /*Pegando o idGuardian da tabela guardian*/
    $guardian = "SELECT id FROM guardian WHERE people_id = '$resultIdPessoaGuardian';";
    $idGuardian = mysqli_query($connectionMysqlProage ,  $guardian);
    $registroGuardian = mysqli_fetch_array($idGuardian);
    $resultIdGuardian = $registroGuardian['id'];

    /*Pegando o idElderly da tabela elderly*/
    $elderly = "SELECT elderly.id AS 'ID' FROM elderly INNER JOIN people ON people.id=elderly.people_id WHERE people.cpf = '$cpfGuardiaoIdoso';";
    $idElderly = mysqli_query($connectionMysqlProage ,  $elderly);
    $registroElderly = mysqli_fetch_array($idElderly);
    $resultIdElderly = $registroElderly['ID'];

    $guardian_has_elderly = "INSERT INTO guardian_has_elderly VALUES ($resultIdElderly, $resultIdGuardian);";
    $resultado_guardian_has_elderly = mysqli_query($connectionMysqlProage , $guardian_has_elderly);    

    echo "<script>alert('Cadastro realizado com sucesso!');</script>";
    }
           
            header("Location:guardianRegistration.php");

 $connectionMysqlProage->close();

?>

