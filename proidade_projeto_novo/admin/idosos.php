<?php
include_once "includes/connectionMysqlProage.php";
$resultado = mysqli_query($connectionMysqlProage, "SELECT people.id as 'id', people.name as 'name' FROM people INNER JOIN elderly ON people.id=elderly.people_id");
if (isset($_POST['form_cadastro'])) {
    $success = true;
    $nome = $_POST['fullname'];
    $data_nasc = $_POST['date'];
    $cpf = $_POST['cpf'];
    /*informações de endereço */
    $type = $_POST['type'];
    $zipcode = $_POST['zipcode'];
    $street = $_POST['street'];
    $number = $_POST['number'];
    $city = $_POST['city'];
    $area = $_POST['bairroAddress'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    if (isset($_POST['complement'])) {
        $complement = $_POST['complement'];
    } else {
        $complement = "";
    }
    /*informações de contato */
    $celular = $_POST['cellphone'];
    $email = $_POST['email'];
    $guardian = $_POST['guardian_id'];
    if (isset($_POST['telegram'])) {
        $telegram    = $_POST['telegram'];
    } else {
        $telegram = "";
    }
    if (isset($_POST['whatsapp'])) {
        $whatsapp    = $_POST['whatsapp'];
    } else {
        $whatsapp = "";
    }
    if (isset($_POST['telephone'])) {
        $telefone    = $_POST['telephone'];
    } else {
        $telefone = "";
    }
    $insertPeople = mysqli_query($connectionMysqlProage, "INSERT INTO people VALUES (NULL, '$nome', '$data_nasc', '$cpf');");
    if (!$insertPeople) {
        $success = false;
    }

    $idPessoa = mysqli_query($connectionMysqlProage,  "SELECT id FROM people WHERE cpf = '$cpf';");
    $registro = mysqli_fetch_array($idPessoa);
    $resultIdPessoa = $registro['id'];

    $insertElderly = mysqli_query($connectionMysqlProage, "INSERT INTO elderly VALUES (NULL, $resultIdPessoa);");
    if (!$insertElderly) {
        $success = false;
    }

    $insertAddress = mysqli_query($connectionMysqlProage, "INSERT INTO address VALUES (NULL, '$type', $zipcode, '$street', $number, '$city', '$complement', '$area', '$country', $resultIdPessoa, '$state');");
    if (!$insertAddress) {
        $success = false;
    }

    $insertContact = mysqli_query($connectionMysqlProage, "INSERT INTO contact VALUES (NULL, $resultIdPessoa, $whatsapp,  $celular, '$email', $telegram, $telefone);");
    if (!$insertContact) {
        $success = false;
    }

    $idElderly = mysqli_query($connectionMysqlProage, "SELECT elderly.id AS 'ID_ELDERLY' FROM elderly INNER JOIN people ON people.id=elderly.people_id WHERE people.cpf = '$cpf';");
    $registroElderly = mysqli_fetch_array($idElderly);
    $resultIdElderly = $registroElderly['ID_ELDERLY'];

    $vinculoGuardianElderly = mysqli_query($connectionMysqlProage, "INSERT INTO guardian_has_elderly VALUES ($resultIdElderly, $guardian);");
    if (!$vinculoGuardianElderly) {
        $success = false;
    }

    if ($success) {
        session_start();
        $_SESSION['type'] = "success";
        $_SESSION['msg'] = "Cadastro de idoso realizado com sucesso.";
    } else {
        session_start();
        $_SESSION['type'] = "danger";
        $_SESSION['msg'] = "Falha ao cadastrar idoso.";
    }

    unset($_POST['form_cadastro']);
    $resultado = mysqli_query($connectionMysqlProage, "SELECT people.id as 'id', people.name as 'name' FROM people INNER JOIN elderly ON people.id=elderly.people_id");
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="pt-br">

<head>
    <?php
    include_once "./includes/head.php";
    ?>
    <style>
        .header-form {
            background-color: rgb(51, 129, 165);
            padding: 10px;
            color: white;
            margin-bottom: 20px;
        }
    </style>
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
                                <li><a class="fw-normal">Idosos cadastrados</a></li>
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
                                            <th class="border-top-0">Nome do idoso</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($resultado)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['id'];; ?></td>
                                                <td><?php echo $row['name'];; ?></td>
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
                                        <h4 class="header-form">Informações básicas</h4>
                                        <div class="form-group mb-4 col-md-4">
                                            <div class="border-bottom p-0">
                                                <label class="p-0" for="fullname">Nome completo (*)</label>
                                                <input type="text" placeholder="Exemplo: Fulano da Silva" class="form-control p-0 border-0" id="fullname" name="fullname" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <div class="border-bottom p-0">
                                                <label for="date" class="p-0">Data de nascimento (*)</label>
                                                <input type="date" placeholder="Exemplo: $##SENHA120$#$" class="form-control p-0 border-0" id="date" name="date" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <div class="border-bottom p-0">
                                                <label for="cpf" class="p-0">CPF (*)</label>
                                                <input type="text" placeholder="Exemplo: 000.000.000-00" class="form-control p-0 border-0" id="cpf" name="cpf" maxlength="11" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h4 class="header-form">Informações de localidade</h4>
                                        <div class="form-group mb-4 col-md-4 border-bottom">
                                            <label for="serial_number" class="p-0">Tipo do endereço (*)</label>
                                            <select class="form-select shadow-none p-0 border-0 form-control-line" name="type">
                                                <option value="Casa">Casa</option>
                                                <option value="Apartamento">Apartamento</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <div class="border-bottom p-0">
                                                <label for="street" class="p-0">Rua (*)</label>
                                                <input type="text" placeholder="Exemplo: Rua Brasil" class="form-control p-0 border-0" id="street" name="street" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <div class="border-bottom p-0">
                                                <label for="number" class="p-0">Número da residência (*)</label>
                                                <input type="text" placeholder="Exemplo: 0" class="form-control p-0 border-0" id="number" name="number" maxlength="5" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-4 col-md-4">
                                            <div class="border-bottom p-0">
                                                <label for="zipcode" class="p-0">CEP (*)</label>
                                                <input type="text" placeholder="Exemplo: 97670000" class="form-control p-0 border-0" id="zipcode" name="zipcode" required maxlength="8">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <div class="border-bottom p-0">
                                                <label for="city" class="p-0">Cidade (*)</label>
                                                <input type="text" placeholder="Exemplo: São Luiz" class="form-control p-0 border-0" id="city" name="city" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <div class="border-bottom p-0">
                                                <label for="bairroAddress" class="p-0">Bairro (*)</label>
                                                <input type="text" placeholder="Exemplo: Centro" class="form-control p-0 border-0" id="bairroAddress" name="bairroAddress" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-4 col-md-4">
                                            <div class="border-bottom p-0">
                                                <label for="country" class="p-0">País (*)</label>
                                                <input type="text" placeholder="Exemplo: Brasil" class="form-control p-0 border-0" id="country" name="country" required maxlength="8">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <div class="border-bottom p-0">
                                                <label for="state" class="p-0">Estado (*)</label>
                                                <input type="text" placeholder="Exemplo: São Luiz" class="form-control p-0 border-0" id="state" name="state" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <div class="border-bottom p-0">
                                                <label for="complement" class="p-0">Complemento</label>
                                                <input type="text" placeholder="Exemplo: Lote 1" class="form-control p-0 border-0" id="complement" name="complement" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h4 class="header-form">Informações de contato</h4>
                                        <div class="form-group mb-4 col-md-6">
                                            <div class="border-bottom p-0">
                                                <label for="cellphone" class="p-0">Celular (*)</label>
                                                <input type="text" placeholder="Exemplo: (00) 9 0000-0000" class="form-control p-0 border-0" id="cellphone" name="cellphone" required maxlength="15">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-6">
                                            <div class="border-bottom p-0">
                                                <label for="email" class="p-0">E-mail (*)</label>
                                                <input type="email" placeholder="Exemplo: idoso@email.com" class="form-control p-0 border-0" id="email" name="email" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-4 col-md-4">
                                            <div class="border-bottom p-0">
                                                <label for="telephone" class="p-0">Telefone</label>
                                                <input type="text" placeholder="Exemplo: (00) 0000-0000" class="form-control p-0 border-0" id="telephone" name="telephone" required maxlength="15">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <div class="border-bottom p-0">
                                                <label for="whatsapp" class="p-0">WhatsApp</label>
                                                <input type="text" placeholder="Exemplo: (00) 9 0000-0000" class="form-control p-0 border-0" id="whatsapp" name="whatsapp" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 col-md-4">
                                            <div class="border-bottom p-0">
                                                <label for="telegram" class="p-0">Telegram</label>
                                                <input type="text" placeholder="Exemplo: (00) 9 0000-0000" class="form-control p-0 border-0" id="telegram" name="telegram" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Selecionar guardião</label>
                                        <div class="col-sm-12 border-bottom">
                                            <select class="form-select shadow-none p-0 border-0 form-control-line" name="guardian_id">
                                                <?php
                                                $buscaGuardiao = mysqli_query($connectionMysqlProage, "SELECT guardian.id AS 'ID_GUARDIAN', people.name as 'NAME_GUARDIAN' FROM guardian INNER JOIN people ON people.id=guardian.people_id");
                                                while ($rowGuardian = mysqli_fetch_array($buscaGuardiao)) {
                                                    echo "<option value='$rowGuardian[ID_GUARDIAN]'>$rowGuardian[NAME_GUARDIAN]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <input class="btn btn-success" type="submit" name="form_cadastro" value="Adicionar idoso">
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
        document.title = "Idosos - Pró-id@de";
    </script>
</body>

</html>