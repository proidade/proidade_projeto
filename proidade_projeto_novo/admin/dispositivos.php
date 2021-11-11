<?php
include_once "includes/connectionMysqlProage.php";
$resultado = mysqli_query($connectionMysqlProage, "SELECT * FROM device");
if (isset($_POST['form_cadastro'])) {
    $name = $_POST['name'];
    $serial_number = $_POST['serial_number'];
    $insert = mysqli_query($connectionMysqlProage, "INSERT INTO device VALUES (NULL, '$name', $serial_number)");
    if ($insert) {
        session_start();
        $_SESSION['type'] = "success";
        $_SESSION['msg'] = "Cadastro de dispositivo realizado com sucesso.";
    } else {
        session_start();
        $_SESSION['type'] = "danger";
        $_SESSION['msg'] = "Falha ao cadastrar dispositivo.";
    }
    unset($_POST['form_cadastro']);
    $resultado = mysqli_query($connectionMysqlProage, "SELECT * FROM device");
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="pt-br">

<head>
    <?php
    include_once "./includes/head.php";
    ?>
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php
        include_once "includes/header_nav.php";
        ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb mr-auto">
                                <li><a class="fw-normal">Dispositivos cadastrados</a></li>
                            </ol>
                            <button class="btn-ml-auto btn-color-success" id="btn_hide_table"><i class="fa fa-plus"></i></button>
                            <button class="btn-ml-auto btn-color-default" id="btn_show_table" style="display: none;"><i class="fa fa-eye"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_SESSION['msg'])) {
            ?>
                <div class="col-12">
                    <div class="alert alert-<?php echo $_SESSION['type'] ?>">
                        <?php echo $_SESSION['msg']; ?>
                    </div>
                </div>
            <?php
                unset($_SESSION['msg']);
            }
            ?>
            <div class="container-fluid">
                <div class="row" id="table_data">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Nome</th>
                                            <th class="border-top-0">Número de Série</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($resultado)) {
                                            $id = $row['id'];
                                            $name = $row['name'];
                                            $part_number = $row['part_number'];
                                        ?>
                                            <tr>
                                                <td><?php echo $id; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $part_number; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="form_cadastro" style="display: none;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="" method="POST">
                                    <div class="row">
                                        <div class="form-group mb-4 col-md-6">
                                            <div class="border-bottom p-0">
                                                <label class="p-0" for="name">Nome do dispositivo</label>
                                                <input type="text" placeholder="Placa arduíno Uno" class="form-control p-0 border-0" id="name" name="name" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <div class="border-bottom p-0">
                                                <label for="serial_number" class="p-0">Número de série</label>
                                                <input type="number" placeholder="Exemplo: 1231279312" class="form-control p-0 border-0" id="serial_number" name="serial_number" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <input class="btn btn-success" type="submit" name="form_cadastro" value="Adicionar dispositivo">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include_once "./includes/footer.php";
            ?>
        </div>
    </div>
    <?php
    include_once "./includes/js.php";
    ?>
</body>

</html>