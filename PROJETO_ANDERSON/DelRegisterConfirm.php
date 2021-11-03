<?php
         include 'connectionMysqlProage.php';


        
             


    $deletar = "DELETE FROM recorder WHERE id = '" . $_GET['id']."'";
    echo $deletar;
    
    $apagar = mysqli_query($connectionMysqlProage, $deletar);
    $confirmacao = print_r($apagar);

    if($confirmacao==1){
    echo '<script> confirm("Excluido com sucesso!")</script>';

    echo '<script> window.location.href="listarRecorder.php"; </script>';
    }else{
        echo "Houve algum erro, tente novamente...";
    }
?>