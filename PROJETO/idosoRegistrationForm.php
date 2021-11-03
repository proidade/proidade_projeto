

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de idoso</title>
     <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/idoso.css">
  <style>
    .banner {
        background:linear-gradient(to left, #007bff, #9198e5);
    }
    .form-control{
        background:#F2F2F2;
        border-radius:0px;
        border:none;
    }
</style>

</head>
<body>
    <div class="banner">
        <div class="container p-5">
            <div class="card mx-3 mt-n5 shadow-lg" style="border-radius:0px; border:none">
                <div class="card-body p-5">
                    <h4 class="card-title mb-3 text-dark text-uppercase" style="font-weight:700">Cadastro do idoso</h4>
                    <form action="idosoRegistration.php" method="POST">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="idosoName" id="idosoNameID" placeholder="John" required >
                                    <label for="idosoName">Nome completo</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="number" name="cpf" id="cpfID" class="form-control" placeholder="CPF" required > 
                                    <label for="cpf" >CPF</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="date" name="idosoNascimento" id="idosoNascimentoID" class="form-control" required >
                                    <label for="idosoNascimento">Data de nascimento</label>
                                </div>
                            </div>

                            <h4  class="card-title mb-3 text-dark text-uppercase" style="font-weight:500; font-size:16;">Endereço</h4>
                            
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" name="type" id="typeId"  placeholder="Casa, Apartamento, etc" class="form-control" required >
                                    <label for="type">Tipo </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" name="rua" id="rua" class="form-control" placeholder="Rua, Avenida, etc" required >
                                    <label for="rua">Rua</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="number" name="numberAddress" id="numberAddressID" class="form-control" placeholder="Número" required >
                                    <label for="numberAddress">Número</label>
                                </div>
                            </div>

                            <div></div>
                            
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" name="bairroAddress" id="bairro" class="form-control" placeholder="Bairro" required >
                                    <label for="bairro">Bairro</label>
                                </div>    
                            </div>
                            
                            
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" name="complement" id="complementID" placeholder="Complemento" class="form-control">
                                    <label for="complement">Complemento</label>
                                </div> 
                            </div>
                                
                                <div></div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="number" name="cep" id="cep" class="form-control" placeholder="CEP" onblur="pesquisacep(this.value);" required >
                                    <label for="cep">CEP</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade" required >
                                    <label for="cidade">Cidade</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" name="uf" id="uf" class="form-control" placeholder="Estado" required >
                                    <label for="uf">Estado</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" name="pais" id="paisID" class="form-control" placeholder="País" required >
                                    <label for="pais">País</label>
                                </div>
                            </div>
                                    
                            
                            <h4  class="card-title mb-3 text-dark text-uppercase" style="font-weight:500; font-size:16;">Contatos</h4>
                            
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" name="celular" id="celularID" class="form-control" placeholder="Celular" required> 
                                    <label for="celular"> Celular</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="number" name="telefone" id="telefoneID" class="form-control" placeholder="Telefone Residencial">
                                    <label for="telefone"> Telefone Residencial</label>
                                </div>
                            </div>
                            
                            
                            <div class="form-floating mb-3">
                                <input type="email" name="email" id="emailID" class="form-control" placeholder="E-mail" required>
                                <label for="email"> E-mail</label>
                            </div>
                            
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="number" name="whatsapp" id="whatsappID" class="form-control" placeholder="WhatsApp">
                                    <label for="whatsapp"> WhatsApp</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" name="telegram" id="telegramID" class="form-control" placeholder="Telegram">
                                    <label for="telegram"> Telegram</label>
                                </div>
                            </div>
                        </div>
                        
                            <p>Possui guardião?</p>
                            
                            <input type="checkbox" name="sim" id="simID" class="checkgroup" onclick="verSim(this)">
                            <label for="sim">Sim e não possui cadastro</label><br>
                            
                           
                            <input type="checkbox" name="simMas" id="simMasID" class="checkgroup" onclick="ver(this)">
                            <label for="sim">Sim, mas já possui cadastro</label><br>
                            
                            
                            <input type="checkbox" name="nao" id="naoID" value="true" class="checkgroup">
                            <label for="nao">Não</label><br><br>
                            
                          
                            <div id="opcao2" style="display: none;" class="row">
                                <h4  class="card-title mb-3 text-dark text-uppercase" style="font-weight:500; font-size:16;">Insira os dados do guardião</h4>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select name="guardiaoNome" placeholder="Nome do guardião" class="form-select">
                                            <option>Selecione...</option>
                                            <?php
                                                include 'connectionMysqlProage.php';

                                                $result_nome_idoso = "SELECT people.name AS 'NOME', people.id AS 'ID' FROM people INNER JOIN guardian ON guardian.people_id=people.id";
                                                $query = mysqli_query($connectionMysqlProage, $result_nome_idoso);
                                                while($row = mysqli_fetch_assoc($query)){?> 
                                                    <option value="<?php echo $row['ID'];?>"> <?php echo $row['NOME'];?> </option> 
                                            
                                                <?php  }?>    
                                        </select>
                                        <label for="guardiaoName">Nome do guardião</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="number" name="cpfGuardian" id="cpfID" class="form-control" placeholder="CPF do guardião">
                                        <label for="cpf" >CPF do guardião</label>
                                    </div>
                                </div>
                            </div>
                            

                            <div id="opcao" style="display: none;" class="row">
                                <h4  class="card-title mb-3 text-dark text-uppercase" style="font-weight:500; font-size:16;">Insira os dados do guardião</h4>
                                
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="guardiaoNome" id="guardiaoNameID" class="form-control" placeholder="Nome do guardião" >
                                        <label for="guardiaoName">Nome Completo</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="number" name="cpfGuardian" id="cpfID" class="form-control" placeholder="CPF do guardião" >
                                        <label for="cpf" >CPF</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="date" name="guardiaoNascimento" id="guardiaoNascimentoID" class="form-control" placeholder="" >
                                        <label for="guardiaoNascimento">Data de nascimento</label>
                                    </div>
                                </div>

                            
                                <div class="form-floating mb-3">
                                    <select name="relative_degree" id="relative_degreeID" class="form-select">
                                        <option>1 - Filho/a</option>
                                        <option>2 - Neto/a</option>
                                        <option>3 - Pai/Mãe</option>
                                        <option>4 - Sobrinho/a</option>
                                        <option>5 - Tio/a</option>
                                        <option>6 - Primo/a</option>
                                        <option>7 - Outro</option>
                                    </select>
                                    <label for="relative_degree">Qual seu grau de parentesco com o idoso?</label>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="relative_degree_outro" id="relative_degree_outroID" class="form-control" placeholder="Se for outro, qual?">
                                        <label for="relative_degree_outro">Se for outro, qual?</label>
                                    </div>
                                </div>

                                <h4  class="card-title mb-3 text-dark text-uppercase" style="font-weight:500; font-size:16;">Endereço</h4>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="typeGuardian" id="typeId"  placeholder="Casa, Apartamento, etc" class="form-control" >
                                        <label for="typeGuardian">Tipo </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="ruaGuardian" id="ruaGuardian" class="form-control" placeholder="Rua, Avenida, etc" >
                                        <label for="ruaGuardian">Rua</label>
                                    </div>
                                </div>
                                
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="number" name="numberAddressGuardian" id="numberAddressIDGuardian" class="form-control" placeholder="Número" >
                                        <label for="numberAddressGuardian">Numero</label>
                                    </div>
                                </div>

                                <div></div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="bairroAddressGuardian" id="bairroGuardian" class="form-control" placeholder="Bairro" >
                                        <label for="bairroGuardian">Bairro</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="complementGuardian" id="complementID" class="form-control" placeholder="Complemento">
                                        <label for="complementGuardian">Complemento</label>
                                    </div>
                                </div>

                                <div></div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="number" name="cepGuardian" id="cepGuardian" class="form-control" placeholder="CEP"  onblur="pesquisacepGuardian(this.value);" >
                                        <label for="cepGuardian">CEP</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="cidadeGuardian" id="cidadeGuardian" class="form-control" placeholder="Cidade" >
                                        <label for="cidadeGuardian">Cidade</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="ufGuardian" id="ufGuardian" class="form-control" placeholder="Estado" >
                                        <label for="ufGuardian">Estado</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="paisGuardian" id="paisGuardian" class="form-control" placeholder="País" >
                                        <label for="paisGuardian">País</label>
                                    </div>
                                </div>
                                
                                <h4  class="card-title mb-3 text-dark text-uppercase" style="font-weight:500; font-size:16;">Contatos</h4>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="number" name="celularGuardian" id="celularID" class="form-control" placeholder="Celular" >
                                        <label for="celularGuardian"> Celular</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="number" name="telefoneGuardian" id="telefoneID" class="form-control" placeholder="Telefone Residencial">
                                        <label for="telefoneGuardian"> Telefone Residencial</label>
                                    </div>
                                </div>
                                
                                
                                <div class="form-floating mb-3">
                                    <input type="email" name="emailGuardian" id="emailID" class="form-control" placeholder="E-mail" >
                                    <label for="emailGuardian"> E-mail</label>
                                </div>
                                
                                
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="number" name="wppGuardian" id="wppID" class="form-control" placeholder="WhatsApp">
                                        <label for="wppGuardian"> WhatsApp</label>
                                    </div>
                                </div>
                                
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="tllGuardian" id="tllID" class="form-control" placeholder="Telegram">
                                        <label for="tllGuardian"> Telegram</label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <input type="submit" name="cadastrar" class="btn btn-primary" style="border-radius:0px" value="Cadastrar"  id="cadastroButtonID">
                            </div>
                            <a href="index.php" style="color: #000000;">
                                <img src='imagens/voltar.png'  width='20px' height='20px'>Voltar</a><br><br>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
     
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    
    function verSim(elemento){
    if (elemento.checked){
        document.getElementById("opcao").style.display = "";
    }else{
        document.getElementById("opcao").style.display = "none ";
        }
    };

    function ver(elemento){
    if (elemento.checked){
        document.getElementById("opcao2").style.display = "";
    }else{
        document.getElementById("opcao2").style.display = "none ";
        }
    };


     $(function(){
       $('input.checkgroup').click(function(){
          if($(this).is(":checked")){
             $('input.checkgroup').attr('disabled',true);
             $(this).removeAttr('disabled');
          }else{
             $('input.checkgroup').removeAttr('disabled');
          }
       })
    });


    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            
    }

    function meu_callbackk(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
           
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callbackk';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };



    //CEP GUARDIÃO
    function limpa_formulário_cepGuardian() {
            //Limpa valores do formulário de cep.
            document.getElementById('cidadeGuardian').value=("");
            document.getElementById('ufGuardian').value=("");
            
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('cidadeGuardian').value=(conteudo.localidade);
            document.getElementById('ufGuardian').value=(conteudo.uf);
           
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cepGuardian();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacepGuardian(valorGuardian) {

        //Nova variável "cep" somente com dígitos.
        var cepGuardian = valorGuardian.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cepGuardian != "") {

            //Expressão regular para validar o CEP.
            var validacepGuardian = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacepGuardian.test(cepGuardian)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('cidadeGuardian').value="...";
                document.getElementById('ufGuardian').value="...";
              

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cepGuardian + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cepGuardian();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cepGuardian();
        }
    };

    </script>
</html>