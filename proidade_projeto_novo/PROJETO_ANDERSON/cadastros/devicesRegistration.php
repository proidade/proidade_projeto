
<?php
 
 include 'connectionMysqlProage.php';

 if (isset($_POST['cadastrar'])){//se o botão estiver pressionado
  
     $name = $_POST['nome'];

     $part_number = $_POST['Nserie'];    
     
       
          $sql = "INSERT INTO device VALUES (NULL, '$name', $part_number);";//insere no banco de dados
           echo $sql;
           $resultado = mysqli_query($connectionMysqlProage, $sql);
           
           var_dump($resultado);


 }
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <title>Bootstrap 5.0 Forms Cheatsheet</title>
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
   <div class="card mx-3 mt-n5 shadow-lg" style="border-radius:0px; border:none">
    <div class="card-body p-5">
      <h4 class="card-title mb-3 text-dark text-uppercase" style="font-weight:700">Cadastro de dispositivos</h4>

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" name="nome" class="form-control" id="floatingTextInput1" placeholder="John">
              <label for="floatingTextInput1">Nome do dispositivo:</label>
            </div>
          </div>
          
        <div class="form-floating mb-3">
          <input type="text"  name="Nserie" class="form-control" id="floatingEmailInput" placeholder="name@example.com">
          <label for="floatingEmailInput">Nº de série:</label>
        </div>
        <div class="form-check form-switch mb-3">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
          <label class="form-check-label" for="flexSwitchCheckChecked">I agree to the Terms and Conditions of this Website.</label>
        </div>
        <div class="text-center">
        <button type="submit" name="cadastrar" class="btn btn-primary" style="border-radius:0px">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


</body>
</html>