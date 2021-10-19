<?php
    include 'connectionMysqlProage.php';

    $identificadorPeople = $_POST['idPeople'];
    $name         = $_POST['idosoName'];
    $birth_date   = $_POST['idosoNascimento'];
    $cpf          = $_POST['cpf'];
    
    /*informações de endereço */
    $type        = $_POST['type'];
    $zipcode     = $_POST['cep'];
    $street      = $_POST['rua'];
    $number      = $_POST['numberAddress'];
    $city        = $_POST['cidade'];
    $complement  = $_POST['complement'];
    $area        = $_POST['bairroAddress'];
    $country     = $_POST['pais'];
    $state       = $_POST['uf'];

    /*informações de contato */
    $celular     = $_POST['celular'];
    $telefone    = $_POST['telefone'];
    $email       = $_POST['email'];
    $whatsapp    = $_POST['whatsapp'];
    $telegram    = $_POST['telegram'];

    $editarPeople = "UPDATE people SET name = '$name', birth_date = '$birth_date', cpf = '$cpf'  WHERE id = '$identificadorPeople'";
	$queryPeople = mysqli_query($connectionMysqlProage, $editarPeople);
	
    $editarAddress = "UPDATE address SET type = '$type', zipcode = '$zipcode', street = '$street', number = '$number', city = '$city', complement = '$complement', area = '$area', country = '$country', state = '$state'  WHERE people_id = '$identificadorPeople'";
	$queryAddress = mysqli_query($connectionMysqlProage, $editarAddress);

    $editarContact = "UPDATE contact SET whatsapp = '$whatsapp', celular = '$celular', email = '$email', telegram = '$telegram', telefone = '$telefone'  WHERE people_id = '$identificadorPeople'";
	$query = mysqli_query($connectionMysqlProage, $editarContact);

    if (!$queryPeople || !$queryAddress || !$query) {
		echo "<script>
				alert('Não foi possível alterar!');
			  </script>";
	} else {

		header('Location:listarIdoso.php');
		echo "<script>
				alert('Alteração feita com sucesso!');
			  </script>";
	}
?>