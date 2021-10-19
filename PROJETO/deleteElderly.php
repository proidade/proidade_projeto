<?php
    include 'connectionMysqlProage.php';
    $identificadorPeople = $_GET['idIdosoPeople'];
    
    $sqlAddress = "DELETE FROM address WHERE people_id = '" . $identificadorPeople."';";
    $sqlContact = "DELETE FROM contact WHERE people_id = '" . $identificadorPeople."';";
    $sqlContactType = "DELETE FROM contact_type INNER JOIN contact ON contact.contacttype_id=contact_type.id WHERE contact.people_id = '" . $identificadorPeople."';";
	
    $resultadoAddress = mysqli_query($connectionMysqlProage, $sqlAddress);
	$resultadoContact = mysqli_query($connectionMysqlProage, $sqlContact);
	$resultadoContactType = mysqli_query($connectionMysqlProage, $sqlContactType);

    if(!$sqlAddress || !$sqlContact || !$sqlContactType){
        echo "<script>
				alert('Não foi possível alterar!');
			  </script>";
        $connectionMysqlProage->close();

    }else{
        /*Pegando o idElderly da tabela elderly*/
        $elderly = "SELECT elderly.id AS 'ID' FROM elderly INNER JOIN people ON people.id=elderly.people_id WHERE people.id = '".$identificadorPeople."';";
        $idElderly = mysqli_query($connectionMysqlProage ,  $elderly);
        $registroElderly = mysqli_fetch_array($idElderly);
        $resultIdElderly = $registroElderly['ID'];

        /*Pegando o idGuardian da tabela guardian*/
        $guardian = "SELECT guardian_id AS 'ID' FROM guardian_has_elderly WHERE elderly_id = '".$resultIdElderly."';";
        $idGuardian = mysqli_query($connectionMysqlProage, $guardian);
        $registroGuardian = mysqli_fetch_array($idGuardian);
        $resultIdGuardian = $registroGuardian['ID'];

        /*Pegando o idGuardian da tabela people*/
        $guardianPeople = "SELECT people_id AS 'ID' FROM guardian WHERE id = $resultIdGuardian;";
        $idGuardianPeople = mysqli_query($connectionMysqlProage, $guardianPeople);
        $registroGuardianPeople = mysqli_fetch_array($idGuardianPeople);
        $resultIdGuardianPeople = $registroGuardianPeople['ID'];

        if(isset($registroElderly['ID']) && isset($registroGuardian['ID'])){
            $sqlAddressGuardian = "DELETE FROM address WHERE people_id = '" . $resultIdGuardianPeople."';";
            $sqlContactGuardian = "DELETE FROM contact WHERE people_id = '" . $resultIdGuardianPeople."';";
            $sqlContactTypeGuardian = "DELETE FROM contact_type INNER JOIN contact ON contact.contacttype_id=contact_type.id WHERE contact.people_id = '" . $resultIdGuardianPeople."';";
            
            $resultadoAddressGuardian = mysqli_query($connectionMysqlProage, $sqlAddressGuardian);
            $resultadoContactGuardian = mysqli_query($connectionMysqlProage, $sqlContactGuardian);
            $resultadoContactTypeGuardian = mysqli_query($connectionMysqlProage, $sqlContactTypeGuardian);

            if(!$sqlAddressGuardian || !$sqlContactGuardian || !$sqlContactTypeGuardian){
                echo "<script>
                        alert('Não foi possível alterar!');
                      </script>";
                $connectionMysqlProage->close();
        
            }else{
                $sqlGuardian_has_elderly = "DELETE FROM guardian_has_elderly WHERE elderly_id =  '".$resultIdElderly."' AND guardian_id ='".$resultIdGuardian."';";
                $sqlElderly = "DELETE FROM elderly WHERE people_id = '".$identificadorPeople."';"; 
                $sqlGuardian = "DELETE FROM guardian WHERE people_id = '".$resultIdGuardian."';"; 
                $sqlPeopleElderly = "DELETE FROM people WHERE id = '".$identificadorPeople."';";
                $sqlPeopleGuardian = "DELETE FROM people WHERE id = '".$resultIdGuardian."';";
    
                $resultado_guardian_has_elderly = mysqli_query($connectionMysqlProage , $sqlGuardian_has_elderly); 
                $resultadoElderly = mysqli_query($connectionMysqlProage, $sqlElderly);
                $resultadoGuardian = mysqli_query($connectionMysqlProage, $sqlGuardian);
                $resultadoPeopleElderly = mysqli_query($connectionMysqlProage, $sqlPeopleElderly);
                $resultadoPeopleGuardian = mysqli_query($connectionMysqlProage, $sqlPeopleGuardian);
    
               
                    echo "<script>
                            alert('Alteração feita com sucesso!');
                         </script>";
                         header('Location:listarIdoso.php');
                $connectionMysqlProage->close();
            }
        }else{
            echo "<script>
				alert('Não foi possível alterar!');
			  </script>";
              $connectionMysqlProage->close();
        }
    }

?>