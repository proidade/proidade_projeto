<?php
   include 'connectionMysqlProage.php';
    
    $identificadorPeople = $_GET['idIdosoPeople'];
    $sql = "SELECT * FROM people WHERE id = '$identificadorPeople'";
    $resultado = mysqli_query($connectionMysqlProage, $sql);

    $sqlAddress = "SELECT * FROM address WHERE people_id = '$identificadorPeople'";
    $resultadoAddress = mysqli_query($connectionMysqlProage, $sqlAddress);

    $sqlContact = "SELECT * FROM contact WHERE people_id = '$identificadorPeople'";
    $resultadoContact = mysqli_query($connectionMysqlProage, $sqlContact);

    echo $sql."<br>";
    echo $sqlContact."<br>";
    echo $sqlAddress."<br>";


    while( ($linha = mysqli_fetch_array($resultado)) && ($linha2 = mysqli_fetch_array($resultadoAddress)) && ($linha3 = mysqli_fetch_array($resultadoContact)) ){
       
        $linha = mysqli_fetch_array($resultado);
        $name       = $linha['name'];
        $cpf        = $linha['cpf'];
        $birth_date = $linha['birth_date'];

        $type       = $linha2['type'];
        $street     = $linha2['street'];
        $zipcode    = $linha2['zipcode'];
        $number     = $linha2['number'];
        $city       = $linha2['city'];
        $state      = $linha2['state'];
        $complement = $linha2['complement'];
        $area       = $linha2['area'];
        $country    = $linha2['country'];

        $celular    = $linha3['celular'];
        $telefone   = $linha3['telefone'];
        $whatsapp   = $linha3['whatsapp'];  
        $telegram   = $linha3['telegram'];
        $email      = $linha3['email'];



        echo ("
            <head>
            <title>Cadastro de idoso</title>
                <!-- Required meta tags -->
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>

            <!-- Bootstrap CSS -->
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1' crossorigin='anonymous'>
            <link rel='stylesheet' type='text/css' href='css/idoso.css'>

            <style>
            .banner {
                background:linear-gradient(to left, #007bff, #9198e5);
            }
            .form-control{
                background:#F2F2F2;
                border-radius:0px;
                border:none;
            }
            </style

            </head>
            <body>
            <div class='banner'>
                <div class='container p-5'>
                    <div class='card mx-3 mt-n5 shadow-lg' style='border-radius:0px; border:none'>
                        <div class='card-body p-5'>
                            <h4 class='card-title mb-3 text-dark text-uppercase' style='font-weight:700'>Cadastro do idoso</h4>
                            <form action='updateElderlyII.php' method='POST' >
                                <div class='row'>
                                    <div class='col'>
                                        <div class='form-floating mb-3'>
                                            <input type='hidden' name='idPeople' class='form-control'  value='". $identificadorPeople . "' >
                                            <input type='text' class='form-control'  value='". $identificadorPeople . "' disabled >
                                            <label for='identificadorPeople'>ID</label>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='form-floating mb-3'>
                                            <input type='text' name ='idosoName' class='form-control'  value='". $namhe . "' >
                                            <label for='idosoName'>Nome completo</label>
                                        </div>
                                    </div>

                                    <div class='col'>
                                        <div class='form-floating mb-3'>
                                            <input type='number' name='cpf' id='cpfID' class='form-control'  value='". $cpf . "'> 
                                            <label for='cpf' >CPF</label>
                                        </div>
                                    </div>

                                    <div class='col'>
                                        <div class='form-floating mb-3'>
                                            <input type='date' name='idosoNascimento' id='idosoNascimentoID' class='form-control' value='". $birth_date . "'>
                                            <label for='idosoNascimento'>Data de nascimento</label>
                                        </div>
                                    </div>

                                    <h4  class='card-title mb-3 text-dark text-uppercase' style='font-weight:500; font-size:16;'>Endereço</h4>
                                    
                                    <div class='col'>
                                        <div class='form-floating mb-3'>
                                            <input type='text' name='type' id='typeId'  placeholder='Casa, Apartamento, etc' class='form-control' value='". $type . "'>
                                            <label for='type'>Tipo </label>
                                        </div>
                                    </div>

                                    <div class='col'>
                                        <div class='form-floating mb-3'>
                                            <input type='text' name='rua' id='rua' class='form-control' value='". $street . "'>
                                            <label for='rua'>Rua</label>
                                        </div>
                                    </div>

                                    <div class='col'>
                                        <div class='form-floating mb-3'>
                                            <input type='number' name='numberAddress' id='numberAddressID' class='form-control' value='". $number . "'>
                                            <label for='numberAddress'>Número</label>
                                        </div>
                                    </div>

                                    <div></div>
                                    
                                    <div class='col'>
                                        <div class='form-floating mb-3'>
                                            <input type='text' name='bairroAddress' id='bairro' class='form-control' value='". $area . "'>
                                            <label for='bairro'>Bairro</label>
                                        </div>    
                                    </div>
                                    
                                    
                                    <div class='col'>
                                        <div class='form-floating mb-3'>
                                            <input type='text' name='complement' id='complementID' value='". $complement . "' class='form-control'>
                                            <label for='complement'>Complemento</label>
                                        </div> 
                                    </div>
                                        
                                        <div></div>
                                    <div class='col'>
                                        <div class='form-floating mb-3'>
                                            <input type='number' name='cep' id='cep' class='form-control' value='". $zipcode . "' onblur='pesquisacep(this.value);'>
                                            <label for='cep'>CEP</label>
                                        </div>
                                    </div>

                                    <div class='col'>
                                        <div class='form-floating mb-3'>
                                            <input type='text' name='cidade' id='cidade' class='form-control' value='". $city . "'>
                                            <label for='cidade'>Cidade</label>
                                        </div>
                                    </div>

                                    <div class='col'>
                                        <div class='form-floating mb-3'>
                                            <input type='text' name='uf' id='uf' class='form-control' value='". $state . "'>
                                            <label for='uf'>Estado</label>
                                        </div>
                                    </div>

                                    <div class='col'>
                                        <div class='form-floating mb-3'>
                                            <input type='text' name='pais' id='paisID' class='form-control' value='". $country . "'>
                                            <label for='pais'>País</label>
                                        </div>
                                    </div>
                                            
                                    
                                    <h4  class='card-title mb-3 text-dark text-uppercase' style='font-weight:500; font-size:16;'>Contatos</h4>
                                    
                                    <div class='col'>
                                        <div class='form-floating mb-3'>
                                            <input type='text' name='celular' id='celularID' class='form-control' value='". $celular . "'>
                                            <label for='celular'> Celular</label>
                                        </div>
                                    </div>

                                    <div class='col'>
                                        <div class='form-floating mb-3'>
                                            <input type='number' name='telefone' id='telefoneID' class='form-control'  value='". $telefone . "'>
                                            <label for='telefone'> Telefone Residencial</label>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class='form-floating mb-3'>
                                        <input type='email' name='email' id='emailID' class='form-control'  value='". $email . "'>
                                        <label for='email'> E-mail</label>
                                    </div>
                                    
                                    <div class='col'>
                                        <div class='form-floating mb-3'>
                                            <input type='number' name='whatsapp' id='whatsappID' class='form-control'  value='". $whatsapp . "'>
                                            <label for='whatsapp'> WhatsApp</label>
                                        </div>
                                    </div>

                                    <div class='col'>
                                        <div class='form-floating mb-3'>
                                            <input type='text' name='telegram' id='telegramID' class='form-control'  value='". $telegram . "'>
                                            <label for='telegram'> Telegram</label>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class='text-center'>
                                        <input type='submit' name='salvaAltera' class='btn btn-primary' style='border-radius:0px' value='Salvar e alterar'  id='cadastroButtonID'>
                                    </div>
                                    <a href='index.php' style='color: #000000;'>Voltar</a><br><br>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js' integrity='sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW' crossorigin='anonymous'></script>
                
            </body>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>

            <script>

            function verSim(elemento){
            if (elemento.checked){
                document.getElementById('opcao').style.display = ';
            }else{
                document.getElementById('opcao').style.display = 'none ';
                }
            };

            function ver(elemento){
            if (elemento.checked){
                document.getElementById('opcao2').style.display = ';
            }else{
                document.getElementById('opcao2').style.display = 'none ';
                }
            };


                $(function(){
                $('input.checkgroup').click(function(){
                    if($(this).is(':checked')){
                        $('input.checkgroup').attr('disabled',true);
                        $(this).removeAttr('disabled');
                    }else{
                        $('input.checkgroup').removeAttr('disabled');
                    }
                })
            });


            function limpa_formulário_cep() {
                    //Limpa valores do formulário de cep.
                    document.getElementById('cidade').value=(');
                    document.getElementById('uf').value=(');
                    
            }

            function meu_callback(conteudo) {
                if (!('erro' in conteudo)) {
                    //Atualiza os campos com os valores.
                    document.getElementById('cidade').value=(conteudo.localidade);
                    document.getElementById('uf').value=(conteudo.uf);
                    
                } //end if.
                else {
                    //CEP não Encontrado.
                    limpa_formulário_cep();
                    alert('CEP não encontrado.');
                }
            }
                
            function pesquisacep(valor) {

                //Nova variável 'cep' somente com dígitos.
                var cep = valor.replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != ') {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com '...' enquanto consulta webservice.
                        document.getElementById('cidade').value='...';
                        document.getElementById('uf').value='...';
                        

                        //Cria um elemento javascript.
                        var script = document.createElement('script');

                        //Sincroniza com o callback.
                        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                        //Insere script no documento e carrega o conteúdo.
                        document.body.appendChild(script);

                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert('Formato de CEP inválido.');
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            };

            </script>
        ");
    } //fim while
?>
