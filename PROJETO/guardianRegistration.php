<?php  
    include 'connectionMysqlProage.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <title>CADASTRO DE GUARDIÃO</title>
     <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
                    <h4 class="card-title mb-3 text-dark text-uppercase" style="font-weight:700">Dados do Idoso</h4>
                    
                    <form action="inserirGuardian.php" method="POST" >
                       
                    <?php 
                     $identificadorPeople = $_GET['idIdosoPeople'];
                     $sql = "SELECT * FROM people WHERE id = '$identificadorPeople'";
                     $resultado = mysqli_query($connectionMysqlProage, $sql);
                     $linha = mysqli_fetch_array($resultado);

                        if(isset($linha['name'])){
                            $name    = $linha['name'];
                        }else{
                            $name = "Não informado.";
                        }
                
                        if(isset($linha['cpf'])){
                            $cpf    = $linha['cpf'];
                        }else{
                            $cpf = "Não informado.";
                        }

                    echo ("
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
                                    <input type='text' name ='idosoName' class='form-control'  value='". $name . "' >
                                    <label for='idosoName'>Nome completo do Idoso</label>
                                </div>
                            </div>
                        ");
                        ?>

                                <h4  class="card-title mb-3 text-dark text-uppercase" style="font-weight:500; font-size:16;">Insira os dados do novo guardião</h4>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="guardiaoNome" id="guardiaoNameID" class="form-control" placeholder="Nome do guardião" required>
                                        <label for="guardiaoName">Nome Completo</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="number" name="cpfGuardian" id="cpfID" class="form-control" placeholder="CPF do guardião" required>
                                        <label for="cpf" >CPF</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="date" name="guardiaoNascimento" id="guardiaoNascimentoID" class="form-control" placeholder="" required>
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
                                        <input type="text" name="typeGuardian" id="typeId"  placeholder="Casa, Apartamento, etc" class="form-control" required>
                                        <label for="typeGuardian">Tipo </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="ruaGuardian" id="ruaGuardian" class="form-control" placeholder="Rua, Avenida, etc" required>
                                        <label for="ruaGuardian">Rua</label>
                                    </div>
                                </div>
                                
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="number" name="numberAddressGuardian" id="numberAddressIDGuardian" class="form-control" placeholder="Número" required>
                                        <label for="numberAddressGuardian">Numero</label>
                                    </div>
                                </div>

                                <div></div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="bairroAddressGuardian" id="bairroGuardian" class="form-control" placeholder="Bairro" required>
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
                                        <input type="number" name="cepGuardian" id="cepGuardian" class="form-control" placeholder="CEP"  onblur="pesquisacepGuardian(this.value);" required>
                                        <label for="cepGuardian">CEP</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="cidadeGuardian" id="cidadeGuardian" class="form-control" placeholder="Cidade" required>
                                        <label for="cidadeGuardian">Cidade</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="ufGuardian" id="ufGuardian" class="form-control" placeholder="Estado" required>
                                        <label for="ufGuardian">Estado</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="paisGuardian" id="paisGuardian" class="form-control" placeholder="País" required>
                                        <label for="paisGuardian">País</label>
                                    </div>
                                </div>
                                
                                <h4  class="card-title mb-3 text-dark text-uppercase" style="font-weight:500; font-size:16;">Contatos</h4>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="number" name="celularGuardian" id="celularID" class="form-control" placeholder="Celular" required>
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
                                    <input type="email" name="emailGuardian" id="emailID" class="form-control" placeholder="E-mail" required>
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
                            
                            <a href="listarIdoso.php" style="color: #000000;">
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

    //CEP GUARDIÃO
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