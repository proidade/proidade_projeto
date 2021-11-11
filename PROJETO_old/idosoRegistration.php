<<<<<<< HEAD:PROJETO_old/idosoRegistration.php
<?php
    include 'connectionMysqlProage.php';

    if (isset($_POST['cadastrar'])) {
        $nome         = $_POST['idosoName'];
        $data_nasc    = $_POST['idosoNascimento'];
        $cpf          = $_POST['cpf'];
       
        /*informações de endereço */
        $type        = $_POST['type'];
        $zipcode     = $_POST['cep'];
        $street      = $_POST['rua'];
        $number      = $_POST['numberAddress'];
        $city        = $_POST['cidade'];
        $area        = $_POST['bairroAddress'];
        $country     = $_POST['pais'];
        $state       = $_POST['uf'];
       
        if(isset($_POST['complement'])){
            $complement    = $_POST['complement'];
        }else{
            $complement = " ";
        }
        

        /*informações de contato */
        $celular     = $_POST['celular'];
        $email       = $_POST['email'];

        if(isset($_POST['telegram'])){
            $telegram    = $_POST['telegram'];
        }else{
            $telegram = " ";
        }

        if(isset($_POST['whatsapp'])){
            $whatsapp    = $_POST['whatsapp'];
        }else{
            $whatsapp = " ";
        }

        if(isset($_POST['telefone'])){
            $telefone    = $_POST['telefone'];
        }else{
            $telefone = " ";
        }
            
        $sql = "INSERT INTO people VALUES (NULL, '$nome', '$data_nasc', '$cpf');";
        $resultado = mysqli_query($connectionMysqlProage , $sql);

        /*Pegando o idPessoa da tabela pessoa*/
        $sql2 = "SELECT id FROM people WHERE cpf = '$cpf';";
        $idPessoa = mysqli_query($connectionMysqlProage ,  $sql2);
        $registro = mysqli_fetch_array($idPessoa);
        $resultIdPessoa = $registro['id'];

        /*Inserindo os dados na tabela elderly*/
        $sql3 = "INSERT INTO elderly VALUES (NULL, $resultIdPessoa);";
        $resultado2 = mysqli_query($connectionMysqlProage , $sql3);


        /*id	type	zipcode	street	number	city	complement	area	country	people_id	state*/ 
        /*inserindo os dados na tabela Address*/
        $sql4 = "INSERT INTO address VALUES (NULL, '$type', $zipcode, '$street', $number, '$city', '$complement', '$area', '$country', $resultIdPessoa, '$state', '$telefone');";
        $resultado3 = mysqli_query($connectionMysqlProage, $sql4);

        $sql8 = "INSERT INTO contact VALUES (NULL, $resultIdPessoa, $whatsapp,  $celular, '$email', $telegram);";
        $resultado6 = mysqli_query($connectionMysqlProage, $sql8);

            if(isset($_POST['sim'])){
                //DADOS GURDIÃO
                $nomeGuardian        = $_POST['guardiaoNome'];
                $data_nascGuardian   = $_POST['guardiaoNascimento'];
                $cpfGuardian         = $_POST['cpfGuardian'];
               
                if($_POST['relative_degree']=='7 - Outro'){
                    $relative_degree     = $_POST['relative_degree_outro'];
                }else{
                    $relative_degree     = $_POST['relative_degree'];
                }
                
                
                /*informações de endereço */
                $typeGuardian        = $_POST['typeGuardian'];
                $zipcodeGuardian     = $_POST['cepGuardian'];
                $streetGuardian      = $_POST['ruaGuardian'];
                $numberGuardian      = $_POST['numberAddressGuardian'];
                $cityGuardian        = $_POST['cidadeGuardian'];
                $areaGuardian        = $_POST['bairroAddressGuardian'];
                $countryGuardian     = $_POST['paisGuardian'];
                $stateGuardian       = $_POST['ufGuardian'];

                if(isset($_POST['complementGuardian'])){
                    $complementGuardian    = $_POST['complementGuardian'];
                }else{
                    $complementGuardian = " ";
                }

                /*informações de contato*/ 
                $celularGuardian     = $_POST['celularGuardian'];
                $emailGuardian       = $_POST['emailGuardian'];

                if(isset($_POST['tllGuardian'])){
                    $telegramGuardian    = $_POST['tllGuardian'];
                }else{
                    $telegramGuardian = " ";
                }
        
                if(isset($_POST['wppGuardian'])){
                    $whatsappGuardian    = $_POST['wppGuardian'];
                }else{
                    $whatsappGuardian = " ";
                }
        
                if(isset($_POST['telefoneGuardian'])){
                    $telefoneGuardian    = $_POST['telefoneGuardian'];
                }else{
                    $telefoneGuardian = " ";
                }
                    
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

                /*Pegando o idGuardian da tabela guardian*/
                $guardian = "SELECT id FROM guardian WHERE people_id = '$resultIdPessoaGuardian';";
                $idGuardian = mysqli_query($connectionMysqlProage ,  $guardian);
                $registroGuardian = mysqli_fetch_array($idGuardian);
                $resultIdGuardian = $registroGuardian['id'];

                /*Pegando o idElderly da tabela elderly*/
                $elderly = "SELECT elderly.id AS 'ID' FROM elderly INNER JOIN people ON people.id=elderly.people_id WHERE people.cpf = '$cpf';";
                $idElderly = mysqli_query($connectionMysqlProage ,  $elderly);
                $registroElderly = mysqli_fetch_array($idElderly);
                $resultIdElderly = $registroElderly['ID'];

                $guardian_has_elderly = "INSERT INTO guardian_has_elderly VALUES ($resultIdElderly, $resultIdGuardian);";
                $resultado_guardian_has_elderly = mysqli_query($connectionMysqlProage , $guardian_has_elderly);   
            }

            if(isset($_POST['simMas'])){
                $nomeGuardian        = $_POST['guardiaoNome'];
                $cpfGuardian         = $_POST['cpfGuardian'];

                /*Pegando o idGuardian da tabela guardian*/
                $guardian = "SELECT guardian.id AS 'ID_GUARDIAN' FROM guardian INNER JOIN people ON people.id=guardian.people_id WHERE people.cpf = '$cpfGuardian';";
                $idGuardian = mysqli_query($connectionMysqlProage ,  $guardian);
                $registroGuardian = mysqli_fetch_array($idGuardian);
                $resultIdGuardian = $registroGuardian['ID_GUARDIAN'];

                /*Pegando o idElderly da tabela elderly*/
                $elderly = "SELECT elderly.id AS 'ID_ELDERLY' FROM elderly INNER JOIN people ON people.id=elderly.people_id WHERE people.cpf = '$cpf';";
                $idElderly = mysqli_query($connectionMysqlProage ,  $elderly);
                $registroElderly = mysqli_fetch_array($idElderly);
                $resultIdElderly = $registroElderly['ID_ELDERLY'];

                $guardian_has_elderly = "INSERT INTO guardian_has_elderly VALUES ($resultIdElderly, $resultIdGuardian);";
                $resultado_guardian_has_elderly = mysqli_query($connectionMysqlProage , $guardian_has_elderly);   
            }
             
        }
        
        echo "<script>
        alert('Cadastro realizado com sucesso.');
        window.location.replace('idosoRegistrationForm.php');
    </script>"; 
    

    $connectionMysqlProage->close();
=======
<?php
    include 'connectionMysqlProage.php';

    if (isset($_POST['cadastrar'])) {
        $nome         = $_POST['idosoName'];
        $data_nasc    = $_POST['idosoNascimento'];
        $cpf          = $_POST['cpf'];
       
        /*informações de endereço */
        $type        = $_POST['type'];
        $zipcode     = $_POST['cep'];
        $street      = $_POST['rua'];
        $number      = $_POST['numberAddress'];
        $city        = $_POST['cidade'];
        $area        = $_POST['bairroAddress'];
        $country     = $_POST['pais'];
        $state       = $_POST['uf'];
       
        if(isset($_POST['complement'])){
            $complement    = $_POST['complement'];
        }else{
            $complement = " ";
        }
        

        /*informações de contato */
        $celular     = $_POST['celular'];
        $email       = $_POST['email'];

        if(isset($_POST['telegram'])){
            $telegram    = $_POST['telegram'];
        }else{
            $telegram = " ";
        }

        if(isset($_POST['whatsapp'])){
            $whatsapp    = $_POST['whatsapp'];
        }else{
            $whatsapp = " ";
        }

        if(isset($_POST['telefone'])){
            $telefone    = $_POST['telefone'];
        }else{
            $telefone = " ";
        }
            
        $sql = "INSERT INTO people VALUES (NULL, '$nome', '$data_nasc', '$cpf');";
        $resultado = mysqli_query($connectionMysqlProage , $sql);

        /*Pegando o idPessoa da tabela pessoa*/
        $sql2 = "SELECT id FROM people WHERE cpf = '$cpf';";
        $idPessoa = mysqli_query($connectionMysqlProage ,  $sql2);
        $registro = mysqli_fetch_array($idPessoa);
        $resultIdPessoa = $registro['id'];

        /*Inserindo os dados na tabela elderly*/
        $sql3 = "INSERT INTO elderly VALUES (NULL, $resultIdPessoa);";
        $resultado2 = mysqli_query($connectionMysqlProage , $sql3);


        /*id	type	zipcode	street	number	city	complement	area	country	people_id	state*/ 
        /*inserindo os dados na tabela Address*/
        $sql4 = "INSERT INTO address VALUES (NULL, '$type', $zipcode, '$street', $number, '$city', '$complement', '$area', '$country', $resultIdPessoa, '$state');";
        $resultado3 = mysqli_query($connectionMysqlProage, $sql4);

        $sql8 = "INSERT INTO contact VALUES (NULL, $resultIdPessoa, $whatsapp,  $celular, '$email', $telegram, $telefone);";
        $resultado6 = mysqli_query($connectionMysqlProage, $sql8);

       
            if(isset($_POST['sim'])){
                //DADOS GURDIÃO
                $nomeGuardian        = $_POST['guardiaoNome'];
                $data_nascGuardian   = $_POST['guardiaoNascimento'];
                $cpfGuardian         = $_POST['cpfGuardian'];
               
                if($_POST['relative_degree']=='7 - Outro'){
                    $relative_degree     = $_POST['relative_degree_outro'];
                }else{
                    $relative_degree     = $_POST['relative_degree'];
                }
                
                
                /*informações de endereço */
                $typeGuardian        = $_POST['typeGuardian'];
                $zipcodeGuardian     = $_POST['cepGuardian'];
                $streetGuardian      = $_POST['ruaGuardian'];
                $numberGuardian      = $_POST['numberAddressGuardian'];
                $cityGuardian        = $_POST['cidadeGuardian'];
                $areaGuardian        = $_POST['bairroAddressGuardian'];
                $countryGuardian     = $_POST['paisGuardian'];
                $stateGuardian       = $_POST['ufGuardian'];

                if(isset($_POST['complementGuardian'])){
                    $complementGuardian    = $_POST['complementGuardian'];
                }else{
                    $complementGuardian = " ";
                }

                /*informações de contato*/ 
                $celularGuardian     = $_POST['celularGuardian'];
                $emailGuardian       = $_POST['emailGuardian'];

                if(isset($_POST['tllGuardian'])){
                    $telegramGuardian    = $_POST['tllGuardian'];
                }else{
                    $telegramGuardian = " ";
                }
        
                if(isset($_POST['wppGuardian'])){
                    $whatsappGuardian    = $_POST['wppGuardian'];
                }else{
                    $whatsappGuardian = " ";
                }
        
                if(isset($_POST['telefoneGuardian'])){
                    $telefoneGuardian    = $_POST['telefoneGuardian'];
                }else{
                    $telefoneGuardian = " ";
                }
                    
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

                $sqlContatoGuardian = "INSERT INTO contact VALUES (NULL, $resultIdPessoaGuardian, '$whatsappGuardian', '$celularGuardian', '$emailGuardian', '$telegramGuardian', $telefoneGuardian);";
                $resultadoContatoGuardian = mysqli_query($connectionMysqlProage , $sqlContatoGuardian);


                /*Pegando o idGuardian da tabela guardian*/
                $guardian = "SELECT id FROM guardian WHERE people_id = '$resultIdPessoaGuardian';";
                $idGuardian = mysqli_query($connectionMysqlProage ,  $guardian);
                $registroGuardian = mysqli_fetch_array($idGuardian);
                $resultIdGuardian = $registroGuardian['id'];

                /*Pegando o idElderly da tabela elderly*/
                $elderly = "SELECT elderly.id AS 'ID' FROM elderly INNER JOIN people ON people.id=elderly.people_id WHERE people.cpf = '$cpf';";
                $idElderly = mysqli_query($connectionMysqlProage ,  $elderly);
                $registroElderly = mysqli_fetch_array($idElderly);
                $resultIdElderly = $registroElderly['ID'];

                $guardian_has_elderly = "INSERT INTO guardian_has_elderly VALUES ($resultIdElderly, $resultIdGuardian);";
                $resultado_guardian_has_elderly = mysqli_query($connectionMysqlProage , $guardian_has_elderly);   
            }

            if(isset($_POST['simMas'])){
                $nomeGuardian        = $_POST['guardiaoNome'];
                $cpfGuardian         = $_POST['cpfGuardian'];

                /*Pegando o idGuardian da tabela guardian*/
                $guardian = "SELECT guardian.id AS 'ID_GUARDIAN' FROM guardian INNER JOIN people ON people.id=guardian.people_id WHERE people.cpf = '$cpfGuardian';";
                $idGuardian = mysqli_query($connectionMysqlProage ,  $guardian);
                $registroGuardian = mysqli_fetch_array($idGuardian);
                $resultIdGuardian = $registroGuardian['ID_GUARDIAN'];

                /*Pegando o idElderly da tabela elderly*/
                $elderly = "SELECT elderly.id AS 'ID_ELDERLY' FROM elderly INNER JOIN people ON people.id=elderly.people_id WHERE people.cpf = '$cpf';";
                $idElderly = mysqli_query($connectionMysqlProage ,  $elderly);
                $registroElderly = mysqli_fetch_array($idElderly);
                $resultIdElderly = $registroElderly['ID_ELDERLY'];

                $guardian_has_elderly = "INSERT INTO guardian_has_elderly VALUES ($resultIdElderly, $resultIdGuardian);";
                $resultado_guardian_has_elderly = mysqli_query($connectionMysqlProage , $guardian_has_elderly);   
            }
             
        }
        
        echo "<script>
        alert('Cadastro realizado com sucesso.');
        window.location.replace('idosoRegistrationForm.php');
    </script>"; 
    

    $connectionMysqlProage->close();
>>>>>>> 1d962777e2a6c8ba3d0aea19fd5948ff5f8f349c:PROJETO/idosoRegistration.php
?>