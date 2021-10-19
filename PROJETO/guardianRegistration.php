<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <title>CADASTRO DE GUARDIÃO</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

    <div id=divMainID class="divMainClass" >
        <h1>CADASTRAR GUARDIÃO</h1> 

            <form action="inserirGuardiao.php" method="POST" >
                <label for="guardiaoName">Nome:</label><br>
                <input type="text" name="guardiaoNome" id="guardiaoNameID" size="30" placeholder="Nome"><br><br>
            
                <label for="guardiaoNascimento">Data de nascimento:</label><br>
                <input type="date" name="guardiaoNascimento" id="guardiaoNascimentoID" size="30" placeholder=""><br><br>

                <label for="cpf" >CPF:</label><br>
                <input type="number" name="cpfGuardian" id="cpfID" ><br><br>

                <label for="guardiaoIdoso">Insira o nome de qual idoso é responsável?</label><br>
                <select name="selectNomeIdoso">
                    <option>Selecione...</option>
                    <?php
                        include 'connectionMysqlProage.php';

                        $result_nome_idoso = "SELECT people.name AS 'NOME', people.id AS 'ID' FROM people INNER JOIN elderly ON elderly.people_id=people.id";
                        $query = mysqli_query($connectionMysqlProage, $result_nome_idoso);
                        while($row = mysqli_fetch_assoc($query)){?> 
                            <option value="<?php echo $row['ID'];?>"> <?php echo $row['NOME'];?> </option> 
                    
                        <?php  }?>    
                </select><br><br>

                <label for="cpfGuardiaoIdoso" >CPF do idoso:</label><br>
                <input type="number" name="cpfGuardiaoIdoso" id="cpfGuardiaoIdosoID" ><br><br>

                <label for="relative_degree">Qual seu grau de parentesco com o idoso?</label>
                <select name="relative_degree" id="relative_degreeID">
                    <option>1 - Filho/a</option>
                    <option>2 - Neto/a</option>
                    <option>3 - Pai/Mãe</option>
                    <option>4 - Sobrinho/a</option>
                    <option>5 - Tio/a</option>
                    <option>6 - Primo/a</option>
                    <option>7 - Outro</option>
                </select> <br>
                <label for="relative_degree_outro">Se for outro, qual?</label>
                <input type="text" name="relative_degree_outro" id="relative_degree_outroID"><br><br>
                
                <fieldset><legend>Endereço:</legend>
                    <label for="typeGuardian">Tipo: </label><br>
                    <input type="text" name="typeGuardian" id="typeId"  placeholder="Casa, Apartamento, etc"><br><br>

                    <label for="ruaGuardian">Rua:</label><br>
                    <input type="text" name="ruaGuardian" id="ruaGuardian" size="30" placeholder="Rua, Avenida, etc"><br><br>

                    <label for="numberAddressGuardian">Numero:</label><br>
                    <input type="number" name="numberAddressGuardian" id="numberAddressIDGuardian" size="30" placeholder="Número"><br><br>

                    <label for="bairroGuardian">Bairro:</label><br>
                    <input type="text" name="bairroAddressGuardian" id="bairroGuardian" size="30" placeholder="Bairro"><br><br>

                    <label for="complementGuardian">Complemento:</label><br>
                    <input type="text" name="complementGuardian" id="complementID" size="30"><br><br>
                    
                    <label for="cepGuardian">CEP:</label><br>
                    <input type="number" name="cepGuardian" id="cepGuardian" size="30" placeholder="CEP"  onblur="pesquisacepGuardian(this.value);"><br><br>

                    <label for="cidadeGuardian">Cidade:</label><br>
                    <input type="text" name="cidadeGuardian" id="cidadeGuardian" size="30" placeholder="Cidade"><br><br>
                    
                    <label for="ufGuardian">Estado:</label><br>
                    <input type="text" name="ufGuardian" id="ufGuardian" size="30" placeholder="Estado"><br><br>

                    <label for="paisGuardian">País:</label><br>
                    <input type="text" name="paisGuardian" id="paisGuardian" size="30"><br><br>
                    </fieldset>
                <fieldset><legend>Contados</legend>
                
                    <label for="celularGuardian"> Celular:</label><br>
                    <input type="number" name="celularGuardian" id="celularID"><br><br>

                    <label for="telefoneGuardian"> Telefone Residencial:</label><br>
                    <input type="number" name="telefoneGuardian" id="telefoneID"><br><br>
                    
                    <label for="emailGuardian"> Email:</label><br>
                    <input type="email" name="emailGuardian" id="emailID"><br><br>
                    
                    <label for="wppGuardian"> WhatsApp:</label><br>
                    <input type="number" name="wppGuardian" id="wppID"><br><br>

                    <label for="tllGuardian"> Telegram:</label><br>
                    <input type="text" name="tllGuardian" id="tllID"><br><br>
                </fieldset>
                
                <input type="submit" name="cadastrar" value="Cadastrar" class="cadastroButtonClass" id="cadastroButtonID">
                <a href="index.php" style="color: #000000;">Voltar</a><br><br>
            </form>
   
    </div>
    <style>
        
    </style>
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
</body>
</html>