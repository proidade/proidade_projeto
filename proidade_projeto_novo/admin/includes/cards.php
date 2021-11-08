<?php
include_once "includes/connectionMysqlProage.php";
$countUsers = mysqli_query($connectionMysqlProage, "SELECT count(id) as countUser FROM users");
$rowUsers = mysqli_fetch_assoc($countUsers);

$countDevices = mysqli_query($connectionMysqlProage, "SELECT count(id) as countDevices FROM device");
$rowDevices = mysqli_fetch_assoc($countDevices);

$countSensor = mysqli_query($connectionMysqlProage, "SELECT count(id) as countSensor FROM sensor");
$rowSensor = mysqli_fetch_assoc($countSensor);
?>
<div class="row justify-content-center">
    <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">Usuários cadastrados</h3>
            <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                    <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                    </div>
                </li>
                <li class="ms-auto"><span class="counter text-success"><?php echo $rowUsers['countUser']; ?></span></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">Dispositivos cadastrados</h3>
            <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                    <div id="sparklinedash2"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                    </div>
                </li>
                <li class="ms-auto"><span class="counter text-purple"><?php echo $rowDevices['countDevices']; ?></span></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">Idosos cadastrados</h3>
            <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                    <div id="sparklinedash3"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                    </div>
                </li>
                <li class="ms-auto"><span class="counter text-info"><?php echo $rowSensor['countSensor']; ?></span></li>
            </ul>
        </div>
    </div>
</div>