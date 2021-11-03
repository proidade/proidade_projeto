<?php
  
  include 'connectionMysqlProage.php';

   
    $name = $_POST['name'];
    $id = $_POST['id'];

    $part_number = $_POST['Nserie'];
    $description = $_POST['descricao'];
    $capability = $_POST['capacidade'];
    $supplier_id = 1;

    $sqlUpdate = "UPDATE sensor SET name = '$name', description = '$description', capability = '$capability', supplier_id = $supplier_id, part_number = $part_number WHERE id = '$id'";
    $resultado = mysqli_query($connectionMysqlProage, $sqlUpdate);
    $notifica = var_dump($resultado);
    print_r($resultado);
    echo $sqlUpdate;
    echo "teste <BR>";
    echo "SEU ID:" . $id; 

    if($resultado==1){
        header('Location: listarSensores.php?confirmacao=1');
    }

        ?>
         
  
 