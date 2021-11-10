<?php
 
  include('connectionMysqlProage.php');

  if (isset($_POST['logar'])){//se o botão estiver pressionado
   
    $name = $_POST['nome'];
    $description = $_POST['descricao'];
    $capability = $_POST['capacidade'];
    $part_number = $_POST['Nserie'];
    $data_id = $_POST['dado'];
    $supplier_id = $_POST['fornecedor'];


     /*Pegando o idSupplier da tabela supplier*/
        $sql2 = "SELECT id FROM supplier WHERE name = '$supplier_id';";
        $idSupplier = mysqli_query($connectionMysqlProage ,  $sql2);
        $registro = mysqli_fetch_array($idSupplier);
        $resultIdSupplier = $registro['id'];  
        
    $sql = "INSERT INTO sensor VALUES (NULL, '$name', '$description', '$capability', $part_number, $resultIdSupplier, NULL);";
    //insere no banco de dados
    echo $sql;
    $resultado = mysqli_query($connectionMysqlProage, $sql);
    echo "Resultado -> " . $resultado;

 
  }
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
    <!-- CSS (manual)-->
    <style type="text/css">
        body{
            background-image: url('imagens/fundoArduino2.jpg');
            background-repeat: no-repeat;
            background-size:100%;
            background-attachment: fixed;
        }
        
        h1{
        font-family:Jazz LET, fantasy;
        color: white;
        }
        
        h2{
        font-size: 30px;
        }
        
        #div1{
        opacity: 0.6;
        padding-bottom: 20%;
        width: 200px;
        }
        
        body{
            background: #aae2e9; 
        }
    </style>

  </head>
  <body>
    <br>
    <center></center>
    <center><br><div id="div1" class="card" style="width: 18rem; ">
      
      <div class="card-body">
        <div class="box-parent-login">
          <div class="well bg-white box-login">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <fieldset >
                    <label ><b> INSIRA OS DADOS DO SEU SENSOR: <b></label>
                    <div class="form-group ls-login-user">
                    <br><label > Nome: </label></br>
                    <input class="form-control ls-login-bg-user input-lg" name="nome" type="text" aria-label="Usuário" placeholder="Nome:">
                    </div>

                    <div class="form-group ls-login-user">
                    <br><label > Descrição: </label></br>
                    <input class="form-control ls-login-bg-user input-lg" name="descricao" type="text" aria-label="Usuário" placeholder="Descrição">
                    </div>

                    <div class="form-group ls-login-user">
                    <br><label > Capacidade: </label></br>
                    <input class="form-control ls-login-bg-user input-lg" name="capacidade" type="text" aria-label="Usuário" placeholder="Capacidade">
                    </div>


            

                    <div class="form-group ls-login-user">
                        <br><label >Nº de série:</label></br><!-- AQUI O USUARIO INSERE O NOME !-->
                    <input class="form-control ls-login-bg-user input-lg" name="Nserie" type="text" aria-label="Usuário" placeholder="Número de série">
                    </div>

                    <div class="form-group ls-login-user">
                        <label ></label> <!-- AQUI O USUARIO INSERE O NOME !-->
                        <br><label > Dado: </label></br>
                    <input class="form-control ls-login-bg-user input-lg" name="dado" type="text" aria-label="Usuário" placeholder="Dado">
                    </div>

                    <label for="guardiaoIdoso">Qual o Fornecedor?</label><br>
                    <select class="form-control ls-login-bg-user input-lg" name="fornecedor" type="text" aria-label="Usuário" >
                    <option>Selecione...</option>
                    <?php
                        include 'connectionMysqlProage.php';

                        $result_nome_idoso = "SELECT * FROM supplier";
                        $query = mysqli_query($connectionMysqlProage, $result_nome_idoso);
                        while($row = mysqli_fetch_assoc($query)){?> 
                            <option value="<?php echo $row['id'];?>"> <?php echo $row['name'];?> </option> 
                    
                        <?php  }?>    
                </select><br><br>

                    <button type="submit" value="Entrar" class="btn btn-primary btn-lg btn-block" name="logar">Concluir cadastro</button> <br>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    -->
  </body>
</html>