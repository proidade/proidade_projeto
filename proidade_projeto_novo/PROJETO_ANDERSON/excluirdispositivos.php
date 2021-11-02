<?php
     include('conexaoPro.php');
    $deletar = "DELETE FROM device WHERE id = '" . $_GET['id']."'";
    echo $deletar;
    $apagar = mysqli_query($connectionMysqlProage, $deletar);

    echo '<script> window.location.href="listatDispositivos.php"; </script>';
    
?>