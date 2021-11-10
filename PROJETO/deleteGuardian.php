<?php
    include 'connectionMysqlProage.php';
    $identificadorPeople = $_GET['idGuardianPeople'];
    
    $sqlAddress = "DELETE FROM address WHERE people_id = '" . $identificadorPeople."';";
    $sqlContact = "DELETE FROM contact WHERE people_id = '" . $identificadorPeople."';";
   
    $resultadoAddress = mysqli_query($connectionMysqlProage, $sqlAddress);
	$resultadoContact = mysqli_query($connectionMysqlProage, $sqlContact);
	
    if(!$resultadoAddress || !$resultadoContact){
        echo "<script>
        alert('Não foi possível excluir.');
        window.location.replace('listarGuardian.php');
    </script>"; 

    }else{
        /*Pegando o guardian_id da tabela guardian*/
        $IdGuardian = "SELECT guardian.id AS 'ID' FROM guardian INNER JOIN people ON people.id=guardian.people_id WHERE people.id = '".$identificadorPeople."';";
        $queryIdGuardian = mysqli_query($connectionMysqlProage, $IdGuardian);
        $registroGuardian_id = mysqli_fetch_array($queryIdGuardian);
        $resultIdGuardian = $registroGuardian_id['ID'];
        echo  $resultIdGuardian."<br>";
   

        /*Pegando o elderly_id da tabela guardian_has_elderly*/
        $IdElderly = "SELECT elderly_id AS 'ID' FROM guardian_has_elderly WHERE guardian_id = '".$resultIdGuardian."';";
        $queryIdElderly = mysqli_query($connectionMysqlProage, $IdElderly);
        $registroElderly_id = mysqli_fetch_array($queryIdElderly);
       
       
             if( isset($registroElderly['ID']) ){
                $resultIdElderly = $registroElderly_id['ID'];
                echo $resultIdElderly."<br>";

                

                /*Pegando o idElderly da tabela people*/
                $idPeopleElderly = "SELECT people_id AS 'ID' FROM elderly WHERE id = $resultIdElderly;";
                $queryIdPeopleElderly = mysqli_query($connectionMysqlProage, $idPeopleElderly);
                $registroElderlyPeople = mysqli_fetch_array($queryIdPeopleElderly);
                $resultIdElderlyPeople = $registroElderlyPeople['ID'];
                echo  $resultIdElderlyPeople."<br>";
                die();
    
                if( isset($registroGuardian_id['ID']) && isset( $registroElderly_id['ID']) ){
                        //exclusão do vinculo do guardião com o idoso
                        $sqlGuardian_has_elderly = "DELETE FROM guardian_has_elderly WHERE elderly_id =  '".$resultIdElderly."' AND guardian_id ='".$resultIdGuardian."';";
                        $sqlElderly = "DELETE FROM elderly WHERE people_id = '".$identificadorPeople."';"; 
                        $sqlPeopleElderly = "DELETE FROM people WHERE id = '".$identificadorPeople."';";
                        
                        $resultado_guardian_has_elderly = mysqli_query($connectionMysqlProage , $sqlGuardian_has_elderly); 
                        $resultadoElderly = mysqli_query($connectionMysqlProage, $sqlElderly);
                        $resultadoPeopleElderly = mysqli_query($connectionMysqlProage, $sqlPeopleElderly);
                        
                        echo "<script>
                                alert('Exclusão feita com sucesso.');
                                window.location.replace('listarGuardian.php');
                            </script>"; 
                        $connectionMysqlProage->close();
                    }else{
                        echo "<script>
                                alert('Não foi possível excluir.');
                                window.location.replace('listarGuardian.php');
                             </script>"; 
                            $connectionMysqlProage->close();
                    }

                 }else{

                    echo "<script>
                            alert('Não foi possível excluir.');
                            window.location.replace('listarGuardian.php');
                        </script>"; 
                         $connectionMysqlProage->close();
                 }

       

        
    }