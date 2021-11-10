<?php
 
 include 'connectionMysqlProage.php';

  if (isset($_POST['cadastrar'])){//se o botão estiver pressionado     
            $device = $_POST['device'];
            $date_service_start = $_POST['date_service_start'];
            $date_service_end = $_POST['date_service_end'];
            $status = $_POST['status'];
            $sensor = $_POST['sensor'];//seleciona o sensor, se é de temperatura, umidade, etc...
            $nameIdoso = $_POST['nameIdoso'];
            
            
            $sql_device = "SELECT id FROM device where name = '$device'"; 
            $consult_id_device = mysqli_query($connectionMysqlProage, $sql_device); 
            $id_recebido = mysqli_fetch_array($consult_id_device);
            $device_id = $id_recebido['id'];
            
            echo "<br> O device_id: ". $device_id. "</br>";

            
            $elderly = "SELECT elderly.id AS 'ID' FROM elderly INNER JOIN people ON people.id=elderly.people_id WHERE people.name = '$nameIdoso';";
            $idElderly = mysqli_query($connectionMysqlProage ,  $elderly);
            $registroElderly = mysqli_fetch_array($idElderly);
            $patient_id = $registroElderly['ID'];

            echo $nameIdoso. "</br>";
            echo  " este é seu resultado ". $patient_id. "</br>";

            echo $sensor. "</br>";

            $sql_sensor = "SELECT id AS 'ID' FROM sensor WHERE name='$sensor';"; 
            $consult_id_sensor = mysqli_query($connectionMysqlProage, $sql_sensor); 
            $id_sensor_recebido = mysqli_fetch_array($consult_id_sensor);
            $id_sensor = $id_sensor_recebido['ID'];
            
            echo "<br> O id do sensor: ".$id_sensor."<br>";
     
    $sql = "INSERT INTO installation VALUES (NULL, '$date_service_start', '$date_service_end', '$ip', $device_id, $id_sensor, '$tipoLeitura', '$valor' , '$descricao');";
    //echo $sql. "</br>";
     //$resultado = mysqli_query($connectionMysqlProage,$sql);


    // echo "<br>". "O seu resultado: ";
    // $resposta = var_dump($resultado);
 
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
  <title>INSTALAÇÃO</title>
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
  <script>
      // Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
});
  </script>
</head>
<body>
  <div class="banner">
    <div class="container p-5">
        <div class="card mx-3 mt-n5 shadow-lg" style="border-radius:0px; border:none">
            <div class="card-body p-5">
                <h4 class="card-title mb-3 text-dark text-uppercase" style="font-weight:700"> <center> INSTALAÇÃO </center> </h4>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="row">
                        <div class="col">
                            <h5>Idoso </h5>
                            <input class="form-control" list="datalistOptions3" id="divIdosoReferente"  name="nameIdoso" placeholder="Idoso Referente">
                            <datalist id="datalistOptions3">
                            <?php
                                $sql = "SELECT people.name AS 'NOME' FROM people INNER JOIN elderly ON elderly.people_id=people.id;"; 
                                    $sql = mysqli_query($connectionMysqlProage,$sql);
                                
                                while($row = mysqli_fetch_array($sql)){
                                $name = $row['NOME'];

                                    echo ("<option> 
                                            <tr>
                                                <td style='border:1px black solid';>". $name. "</td>
                                            </tr>
                                        </option>");  
                                }
                            ?>
                            </datalist> 

                        
                            <h5>Sensores</h5>

                            <div class="row">
                              <div class="col-md-12">

                                <select class="mdb-select colorful-select dropdown-primary md-form" multiple searchable="Search here..">
                                  <option value="" disabled selected>escolha o sensor</option>
                                  <?php  $sql = "SELECT name FROM sensor"; 
                                        $sql = mysqli_query($connectionMysqlProage,$sql);
                                        $resultado = mysqli_query($connectionMysqlProage, $sql); echo $resultado;
                                        while($row = mysqli_fetch_array($sql)){
                                        $name = $row['name']; 


                                        echo ("<option> 
                                                <tr>
                                                    <td style='border:1px black solid';> ".  $name. "</td>
                                                </tr>
                                            </option>");
                                        }
                                        ?>
                                </select>                  
                              </div>
                            </div>

                            <h5> Dispositivo </h5>                
                                <input class="form-control" list="datalistOptions2" id="divDispositivo"  name="device" placeholder="Nome do dispositivo">
                            <datalist id="datalistOptions2">
                            <?php
                                $sql = "SELECT name FROM device"; 
                                    $sql = mysqli_query($connectionMysqlProage,$sql);
                                
                                while($row = mysqli_fetch_array($sql)){
                                $name = $row['name']; 

                                echo ("<option> 
                                        <tr>
                                            <td style='border:1px black solid';>". $name. "</td>
                                        </tr>
                                    </option>");
                                        
                                }
                            ?>
                            </datalist>   

                            
                            <h5>Status: </h5>
                            <input type="text" id="status_ID" name="status" class="form-control">

                            <h5>Início da operação: </h5>
                            <input type="date" id="date_service_start_ID" name="date_service_start" class="form-control">

                            <h5>Fim da operação: </h5>
                            <input type="date" id="date_service_end_ID" name="date_service_end" class="form-control">

                    
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="cadastrar" style="border-radius:0px">Submit</button>
                            </div>
                </form>
            </div>
        </div>
    </div>
 </div>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    // Material Select Initialization
        $(document).ready(function() {
        $('.mdb-select').materialSelect();
        });
</script>

<script type="text/javascript" src="js/mdb.min.js"></script>


</body>
</html>