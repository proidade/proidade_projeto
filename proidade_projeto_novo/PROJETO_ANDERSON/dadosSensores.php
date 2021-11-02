<?php
 
 include 'connectionMysqlProage.php';

  if (isset($_POST['cadastrar'])){//se o botão estiver pressionado
   
    echo "AAAAAAAAAAAAAAAAAAAAAAAAAAA";

      
$nomeDispositivo = $_POST['nomeDispositivo'];
$tipoLeitura = $_POST['tipoLeitura'];
  
$consult_id_device = "SELECT id FROM device where name = '$nomeDispositivo'"; 
              $consult_id_device = mysqli_query($connectionMysqlProage,$consult_id_device); 
             $id_recebido = mysqli_fetch_array($consult_id_device);
             
              $device_id = $id_recebido['id'];
             
              echo "<br> O device_id: ". $device_id;

             

           $nameIdoso = $_POST['nameIdoso'];
               $elderly = "SELECT elderly.id AS 'ID' FROM elderly INNER JOIN people ON people.id=elderly.people_id WHERE people.name = '$nameIdoso';";
                $idElderly = mysqli_query($connectionMysqlProage ,  $elderly);
                $registroElderly = mysqli_fetch_array($idElderly);
                $patient_id = $registroElderly['ID'];

                echo  " este é seu resultado ". $patient_id;
 

              $valor = $_POST['valor'];
              echo "<br> O VALOR LIDO". $valor;

             $tipoSensor = $_POST['tipoSensor'];//seleciona o sensor, se é de temperatura, umidade, etc...

              $consult_id_sensor = "SELECT id FROM sensor where name = '$tipoSensor'"; 
              $consult_id_sensor = mysqli_query($connectionMysqlProage,$consult_id_sensor); 
              $id_sensor_recebido = mysqli_fetch_array($consult_id_sensor);
              $id_sensor = $id_sensor_recebido['id'];
             
              echo "<br> O id do sensor: ".$id_sensor."<br>";




     

      $date_time = date('Y-m-d H:i:s');
       echo $date_time."<br>";
    
       $ip = $_SERVER['REMOTE_ADDR'];
       echo "Seu IP é: ".$ip;

       if($tipoSensor=="Temperatura" AND $valor>38){
        
         $descricao = "Anormal";
        
        
       }
        
       
       elseif($tipoSensor=="Oximetro" AND $valor>100){
        
        $descricao = "Anormal"; 
      }
      elseif($tipoSensor=="Pressao" AND $valor>14){ 
        $descricao = "Anormal";   
      }
      elseif($tipoSensor=="Sensor de gás" AND $valor>10){
        $descricao = "Anormal";
      } else{$descricao = "Normal";}
       
  
       
  

       
       echo $descricao;
     
    $sql = "INSERT INTO recorder VALUES (NULL, '$date_time', $patient_id, '$ip', $device_id, $id_sensor, '$tipoLeitura', '$valor' , '$descricao');";
    echo $sql;
     $resultado = mysqli_query($connectionMysqlProage,$sql);


     echo "<br>". "O seu resultado: ";
     $resposta = var_dump($resultado);

     
     
 
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
    <h5 class="pb-4">Pro-id@de</h5>
   <div class="card mx-3 mt-n5 shadow-lg" style="border-radius:0px; border:none">
    <div class="card-body p-5">
      <h4 class="card-title mb-3 text-dark text-uppercase" style="font-weight:700"> <center> Dados de sensores - CADASTRO </center> </h4>

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="row">
          <div class="col">
              
            <h5>Tipo de sensor:</h5>
            
        

            
                    <input class="form-control" list="datalistOptions" id="divSensor" name="tipoSensor" placeholder="Nome do sensor">
                    <datalist id="datalistOptions">
                    <?php  $sql = "SELECT name FROM sensor"; 
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
                </div>
                <h5> Nome do dispositivo: </h5>                
                    <input class="form-control" list="datalistOptions2" id="divDispositivo"  name="nomeDispositivo" placeholder="Nome do dispositivo">
                   <datalist id="datalistOptions2">
                   <?php
                      $sql = "SELECT name FROM device"; 
                        $sql = mysqli_query($connectionMysqlProage,$sql);
                      
                    while($row = mysqli_fetch_array($sql)){
                      $name = $row['name']; 

                      

                    echo ("<option> <tr>
                      <td style='border:1px black solid';>". $name. "</td>
                      </tr></option>");
                              
                    }
                   ?>
                   </datalist>   

                    
                  <h5>Valor lido: </h5>
                 <input type="text" id="inputValor" name="valor" class="form-control">

                 <h5>Tipo de leitura: </h5>
                 <input type="text" id="inputTipo" name="tipoLeitura" class="form-control">

                 <h5> Idoso referente: </h5><br>
                 <input type="text" id="inputIdoso" name="nameIdoso" class="form-control">

                           
                
        <div class="form-check form-switch mb-3">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
          <label class="form-check-label" for="flexSwitchCheckChecked">I agree to the Terms and Conditions of this Website.</label>
        </div>
        
        <div class="text-center">
        <button type="submit" class="btn btn-primary" name="cadastrar" style="border-radius:0px">Submit</button>
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