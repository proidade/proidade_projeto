<?php
if ($_POST) {
    include_once "../admin/includes/connectionMysqlProage.php";
    $username = $_POST['username'];
    $user = mysqli_fetch_array(mysqli_query($connectionMysqlProage, "SELECT * FROM users WHERE username = '$username'"));
    if (!$user) {
        session_start();
        $_SESSION['type'] = 'danger';
        $_SESSION['msg'] = 'Credenciais inválidas, por favor verifique-as';
        header("location: ../index.php");
        exit;
    }
    if (!password_verify($_POST['password'], $user['password'])){
        session_start();
        $_SESSION['type'] = 'danger';
        $_SESSION['msg'] = 'Credenciais inválidas, por favor verifique-as';
        header("location: ../index.php");
        exit;
    }
    if ($user['access_level'] == 9) {
        session_start();
        $_SESSION['admin'] = [
                'name' => $user['name'],
                'access_level' => $user['access_level']
        ];;
        header("location: ../admin/index.php");
    } else {
        session_start();
        $_SESSION['user'] = [
            'name' => $user['name'],
            'access_level' => $user['access_level']
        ];
        header("location: ../index.php");
        exit;
    }
}