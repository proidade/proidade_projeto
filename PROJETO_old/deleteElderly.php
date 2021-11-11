<?php
    include 'connectionMysqlProage.php';
    $identificadorPeople = $_GET['idIdosoPeople'];
    
    $sqlAddress = "DELETE FROM address WHERE people_id = '" . $identificadorPeople."';";
    $sqlContact = "DELETE FROM contact WHERE people_id = '" . $identificadorPeople."';";
   
    $resultadoAddress = mysqli_query($connectionMysqlProage, $sqlAddress);
	$resultadoContact = mysqli_query($connectionMysqlProage, $sqlContact);
	
    if(!$resultadoAddress || !$resultadoContact){
        echo "<script>
        alert('Não foi possível excluir.');
        window.location.replace('listarIdoso.php');
    </script>"; 

    }else{
        /*Pegando o idElderly da tabela elderly*/
        $elderly = "SELECT elderly.id AS 'ID' FROM elderly INNER JOIN people ON people.id=elderly.people_id WHERE people.id = '".$identificadorPeople."';";
        $idElderly = mysqli_query($connectionMysqlProage, $elderly);
        $registroElderly = mysqli_fetch_array($idElderly);
        $resultIdElderly = $registroElderly['ID'];
   

        /*Pegando o idGuardian da tabela guardian*/
        $guardian = "SELECT guardian_id AS 'ID' FROM guardian_has_elderly WHERE elderly_id = '".$resultIdElderly."';";
        $idGuardian = mysqli_query($connectionMysqlProage, $guardian);
        $registroGuardian = mysqli_fetch_array($idGuardian);
       
        if(!$registroGuardian){
             if( isset($registroElderly['ID']) ){
                     //exclusão do vinculo do idoso com o guardião
                     $sqlRecorder = "DELETE FROM recorder WHERE patient_id ='".$resultIdElderly."';";
                     $sqlElderly = "DELETE FROM elderly WHERE people_id = '".$identificadorPeople."';"; 
                     $sqlPeopleElderly = "DELETE FROM people WHERE id = '".$identificadorPeople."';";
                     
                     $resultadoElderly = mysqli_query($connectionMysqlProage, $sqlElderly);
                     $resultadoPeopleElderly = mysqli_query($connectionMysqlProage, $sqlPeopleElderly);
                     
                     echo "<script>
                        alert('Exclusão feita com sucesso.');
                        window.location.replace('listarIdoso.php');
                    </script>"; 
                            
                     $connectionMysqlProage->close();

                 }else{

                    echo "<script>
                        alert('Não foi possível excluir.');
                        window.location.replace('listarIdoso.php');
                    </script>"; 
                         $connectionMysqlProage->close();
                 }

        }else{
            $resultIdGuardian = $registroGuardian['ID'];

            /*Pegando o idGuardian da tabela people*/
            $guardianPeople = "SELECT people_id AS 'ID' FROM guardian WHERE id = $resultIdGuardian;";
            $idGuardianPeople = mysqli_query($connectionMysqlProage, $guardianPeople);
            $registroGuardianPeople = mysqli_fetch_array($idGuardianPeople);
            $resultIdGuardianPeople = $registroGuardianPeople['ID'];

            if( isset($registroElderly['ID']) && isset($registroGuardian['ID']) ){
                    //exclusão do vinculo do idoso com o guardião
                    $sqlRecorder = "DELETE FROM recorder WHERE patient_id ='".$resultIdElderly."';";
                    $sqlGuardian_has_elderly = "DELETE FROM guardian_has_elderly WHERE elderly_id =  '".$resultIdElderly."' AND guardian_id ='".$resultIdGuardian."';";
                    $sqlElderly = "DELETE FROM elderly WHERE people_id = '".$identificadorPeople."';"; 
                    $sqlPeopleElderly = "DELETE FROM people WHERE id = '".$identificadorPeople."';";
                    
                    $resultado_guardian_has_elderly = mysqli_query($connectionMysqlProage , $sqlGuardian_has_elderly); 
                    $resultadoElderly = mysqli_query($connectionMysqlProage, $sqlElderly);
                    $resultadoPeopleElderly = mysqli_query($connectionMysqlProage, $sqlPeopleElderly);
                    
                    echo "<script>
                    alert('Exclusão feita com sucesso.');
                    window.location.replace('listarIdoso.php');
                </script>"; 
                    $connectionMysqlProage->close();
                }else{
                    echo "<script>
                        alert('Não foi possível excluir.');
                        window.location.replace('listarIdoso.php');
                    </script>"; 
                        $connectionMysqlProage->close();
                }
        }

        
    }
    
?>