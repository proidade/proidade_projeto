<?php
 
  include('connectionMysqlProage.php');

  if (isset($_POST['cadastrar'])){//se o botão estiver pressionado
   
      $name = $_POST['nome'];

      $part_number = $_POST['Nserie'];    
      
        
           $sql = "INSERT INTO device VALUES (NULL, '$name', $part_number);";//insere no banco de dados
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
    </style>

  </head>
  <body>
  
    <br>
    <center>
      
    </center>
    <center><br><div id="div1" class="card" style="width: 18rem; ">
      
      <div class="card-body">
        <div class="box-parent-login">
          <div class="well bg-white box-login">
           
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <fieldset >
              <label ><b> INSIRA OS DADOS DO SEU DISPOSITIVO: <b></label>
              <div class="form-group ls-login-user">
                <br><label > Nome: </label></br>
                <input class="form-control ls-login-bg-user input-lg" name="nome" type="text" aria-label="Usuário" placeholder="Nome:">
             </div>


             <div class="form-group ls-login-user">
                 <br><label >Nº de série:</label></br><!-- AQUI O USUARIO INSERE O NOME !-->
                <input class="form-control ls-login-bg-user input-lg" name="Nserie" type="text" aria-label="Usuário" placeholder="Número de série">
             </div><br>

            

             <button type="submit" value="Cadastrar" class="btn btn-primary btn-lg btn-block" name="cadastrar">Concluir cadastro</button> <br>
            

         
         
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </center>
  <form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    -->
  </body>
</html>