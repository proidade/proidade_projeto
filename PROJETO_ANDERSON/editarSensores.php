
<?php
 
 include 'connectionMysqlProage.php';


 //if (!empty($_GET['id'])){//se o botão estiver pressionado
  
     $id = $_GET['id'];

  
     
         
          $sql = "SELECT * FROM sensor WHERE id=$id";
          $resultado = mysqli_query($connectionMysqlProage, $sql);
           
          while($user_data = mysqli_fetch_assoc($resultado)){
            $name = $user_data['name'];
            $id = $user_data['id'];

            $part_number = $user_data['part_number'];
            $description = $user_data['description'];
            $capability = $user_data['capability'];  
            $supplier_id = $user_data['supplier_id']; 
          }




          echo "seu nome: " . $name;
          echo "<br> Seu id é ".$id;


 
?>



<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <title> PRO-ID@ADE - Cadastro de sensores</title>
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
   <h5 class="pb-4">PRO-ID@DE</h5>
   <div class="card mx-3 mt-n5 shadow-lg" >
    <div class="card-body">
      <h4 class="card-title mb-3 text-primary text-uppercase">Cadastro de Sensores</h4>

      <form action="SalvaEditSensor.php" method="POST">
        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingTextInput1" value=" <?php echo $name;?>" name="name" placeholder="John">
              <label for="floatingTextInput1">Nome:</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingTextInput2" value="<?php echo $description ?>" name="descricao" placeholder="Smith">
              <label for="floatingTextInput2">Descrição:</label>
            </div>
          </div>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="floatingEmailInput" value="<?php echo $capability ?>" name="capacidade" placeholder="name@example.com">
          <label for="floatingEmailInput">Capacidade:</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="floatingEmailInput" value="<?php echo $part_number ?>" name="Nserie" placeholder="name@example.com">
          <label for="floatingEmailInput">Número de Série:</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="floatingEmailInput" name="dado" value="<?php echo "Está no banco?"; ?>" placeholder="name@example.com">
          <label for="floatingEmailInput">Dado:</label>
        </div>
        

        <input class="form-control" list="datalistOptions" id="divSensor" name="fornecedor"  placeholder="Fornecedor:">
                    <datalist id="datalistOptions">
                    <?php  $sql = "SELECT name FROM supplier"; 
                  $sql = mysqli_query($connectionMysqlProage,$sql);
                 $resultado = mysqli_query($connectionMysqlProage, $sql); echo $resultado;
                     while($row = mysqli_fetch_array($sql)){
                     $name = $row['name']; 


                    echo ("<option> <tr>
                      <td style='border:1px black solid';> ".  $name. "</td>
                      </tr></option>");
                    }
                    ?>
                    </datalist>

                    <div class="col">
    
            <div class="form-floating mb-3">
                
          <input type="text" name="id" value = "<?php echo $id ?>" class="form-control" id="floatingTextInput1" placeholder="John" readonly>
              <label for="floatingTextInput1">Id</label>

              
</div>
</DIV>
                  
                  <br>  <a href=''>Fornecedor não cadastrado? CADASTRE AQUI</t> 
                </div>

                
            



        <div class="form-check form-switch mb-3">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
          <label class="form-check-label" for="flexSwitchCheckChecked">Eu aceito os termos do site</label>
        </div>
        <div class="text-center">
        <button type="submit" name="update" class="btn btn-primary" style="border-radius:0px">Editar</button>
  
      </div>
      
    </div>
  </div>
</div>
</div>

</form>


</body>
</html>
