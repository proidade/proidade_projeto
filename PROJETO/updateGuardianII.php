<?php
    include 'connectionMysqlProage.php';

    $identificadorPeopleGuardian  = $_POST['idPeopleGuardian'];
    
    $nameGuardian         = $_POST['idosoName'];
    $birth_dateGuardian   = $_POST['idosoNascimento'];
    $cpfGuardian          = $_POST['cpf'];
    
    /*informações de endereço */
    $typeGuardian        = $_POST['type'];
    $zipcodeGuardian     = $_POST['cep'];
    $streetGuardian      = $_POST['rua'];
    $numberGuardian      = $_POST['numberAddress'];
    $cityGuardian        = $_POST['cidade'];
    $complementGuardian  = $_POST['complement'];
    $areaGuardian        = $_POST['bairroAddress'];
    $countryGuardian     = $_POST['pais'];
    $stateGuardian       = $_POST['uf'];

    /*informações de contato */
    $celularGuardian     = $_POST['celular'];
    $telefoneGuardian    = $_POST['telefone'];
    $emailGuardian       = $_POST['email'];
    $whatsappGuardian    = $_POST['whatsapp'];
    $telegramGuardian    = $_POST['telegram'];

    $editarPeople = "UPDATE people SET name = '$nameGuardian', birth_date = '$birth_dateGuardian', cpf = '$cpfGuardian'  WHERE id = '$identificadorPeopleGuardian'";
	$queryPeople = mysqli_query($connectionMysqlProage, $editarPeople);
	
    $editarAddress = "UPDATE address SET type = '$typeGuardian', zipcode = '$zipcodeGuardian', street = '$streetGuardian', number = '$numberGuardian', city = '$cityGuardian', complement = '$complementGuardian', area = '$areaGuardian', country = '$countryGuardian', state = '$stateGuardian'  WHERE people_id = '$identificadorPeopleGuardian'";
	$queryAddress = mysqli_query($connectionMysqlProage, $editarAddress);

    $editarContact = "UPDATE contact SET whatsapp = '$whatsappGuardian', celular = '$celularGuardian', email = '$emailGuardian', telegram = '$telegramGuardian', telefone = '$telefoneGuardian'  WHERE people_id = '$identificadorPeopleGuardian'";
	$query = mysqli_query($connectionMysqlProage, $editarContact);

    if (!$queryPeople || !$queryAddress || !$query) {
		echo "<script>
				alert('Não foi possível alterar!');
			  </script>";

	} else {

        echo "<script>
        alert('Alteração realizada com sucesso.');
        window.location.replace('listarGuardian.php');
    </script>"; 
    
	}
?>