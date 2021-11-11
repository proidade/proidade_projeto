<?php
@session_start();
if (empty($_SESSION['admin'])) {
    $_SESSION['type'] = 'danger';
    $_SESSION['msg'] = 'Sem permissão para visualizar.';
    header("location: ../index.php");
    exit;
}
?>