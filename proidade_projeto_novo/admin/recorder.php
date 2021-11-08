<?php
include_once "includes/connectionMysqlProage.php";
$resultado = mysqli_query($connectionMysqlProage, "SELECT * FROM recorder");
if (isset($_POST['form_cadastro'])) {
    $tipoLeitura = $_POST['tipoLeitura'];
    $people_id = $_POST['people_id'];
    $sensor_id = $_POST['sensor_id'];
    $device_id = $_POST['device_id'];
    $valor = $_POST['valor'];
    $date_time = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'];
    if ($tipoLeitura == "Temperatura" and $valor > 38) {
        $descricao = "Anormal";
    } elseif ($tipoLeitura == "Oximetro" and $valor > 100) {
        $descricao = "Anormal";
    } elseif ($tipoLeitura == "Pressao" and $valor > 14) {
        $descricao = "Anormal";
    } elseif ($tipoLeitura == "Sensor de gás" and $valor > 10) {
        $descricao = "Anormal";
    } else {
        $descricao = "Normal";
    }
    $insert = mysqli_query($connectionMysqlProage, "INSERT INTO recorder VALUES (NULL, '$date_time', $people_id, '$ip', $device_id, $sensor_id, '$tipoLeitura', '$valor' , '$descricao');");
    if ($insert) {
        $_SESSION['type'] = "success";
        $_SESSION['msg'] = "Cadastro de dado do recorder realizado com sucesso.";
    } else {
        $_SESSION['type'] = "danger";
        $_SESSION['msg'] = "Falha ao cadastrar dado do recorder.";
    }
    unset($_POST['form_cadastro']);
    $resultado = mysqli_query($connectionMysqlProage, "SELECT * FROM recorder");
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
                                <li><a class="fw-normal">Dados do recorder cadastrados</a></li>
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
                                            <th class="border-top-0">Data e hora do registro</th>
                                            <th class="border-top-0">IP</th>
                                            <th class="border-top-0">Valor</th>
                                            <th class="border-top-0">Tipo</th>
                                            <th class="border-top-0">Observação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($resultado)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['date_time']; ?></td>
                                                <td><?php echo $row['origin']; ?></td>
                                                <td><?php echo $row['value']; ?></td>
                                                <td><?php echo $row['type']; ?></td>
                                                <td><?php echo $row['observation']; ?></td>
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
                                                <label class="p-0" for="valor">Valor da leitura</label>
                                                <input type="text" placeholder="Exemplo: 30" class="form-control p-0 border-0" id="valor" name="valor" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <div class="border-bottom p-0">
                                                <label for="tipoLeitura" class="p-0">Tipo da leitura</label>
                                                <input type="text" placeholder="Exemplo: Temperatura" class="form-control p-0 border-0" id="tipoLeitura" name="tipoLeitura" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Selecionar idoso</label>
                                        <div class="col-sm-12 border-bottom">
                                            <select class="form-select shadow-none p-0 border-0 form-control-line" name="people_id">
                                                <?php
                                                $buscaIdoso = mysqli_query($connectionMysqlProage, "SELECT elderly.id AS 'id', people.name as 'name' FROM elderly INNER JOIN people ON people.id=elderly.people_id");
                                                while ($rowIdoso = mysqli_fetch_array($buscaIdoso)) {
                                                    echo "<option value='$rowIdoso[id]'>$rowIdoso[name]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Selecionar dispositivo</label>
                                        <div class="col-sm-12 border-bottom">
                                            <select class="form-select shadow-none p-0 border-0 form-control-line" name="device_id">
                                                <?php
                                                $buscaDevice = mysqli_query($connectionMysqlProage, "SELECT * FROM device");
                                                while ($rowDevice = mysqli_fetch_array($buscaDevice)) {
                                                    echo "<option value='$rowDevice[id]'>$rowDevice[name];</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Selecionar sensor</label>
                                        <div class="col-sm-12 border-bottom">
                                            <select class="form-select shadow-none p-0 border-0 form-control-line" name="sensor_id">
                                                <?php
                                                $buscaSensor = mysqli_query($connectionMysqlProage, "SELECT * FROM sensor");
                                                while ($rowSensor = mysqli_fetch_array($buscaSensor)) {
                                                    echo "<option value='$rowSensor[id]'>$rowSensor[name];</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <input class="btn btn-success" type="submit" name="form_cadastro" value="Adicionar registro">
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
    <script>
        document.title = "Recorder - Pró-id@de";
    </script>
</body>

</html>