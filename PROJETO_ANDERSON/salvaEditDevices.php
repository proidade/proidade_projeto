<?php
  
  include 'connectionMysqlProage.php';

   if(isset($_POST['update'])){
    $name = $_POST['name'];

    $id = $_POST['id'];
    

    $part_number = $_POST['part_number']; 

    $sqlUpdate = "UPDATE device SET name = '$name', part_number = '$part_number' WHERE id = '$id'";
    $resultado = mysqli_query($connectionMysqlProage, $sqlUpdate);
    $notifica = var_dump($resultado);
    print_r($resultado);
    echo $sqlUpdate;
    echo "teste <BR>";
    echo "SEU ID:" . $id; 

    if($resultado==1){
        header('Location: listarDevices.php?confirmacao=1');
    }
}
        ?>
         
  
 

 