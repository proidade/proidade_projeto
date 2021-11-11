<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="admin/css/style.min.css" />
  <script src="https://kit.fontawesome.com/1cc1860790.js"></script>
  <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon.png">
  <title>Login - Pró-id@de</title>
</head>

<body>
  <img class="ilus ilus1" src="./img/ilus.svg" alt="Ilustração" draggable="false">
  <img class="ilus ilus2" src="./img/ilus.svg" alt="Ilustração" draggable="false">
  <div class="wrapper">
    <div class="wrapper-form">
      <?php
      session_start();
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
      <img src="./img/logopro.png" alt="ícone pró-id@de" class="img-logo">
      <form action="auth/login.php" class="form" method="post">
        <div class="wrapper-label">
          <div class="wrapper-input">
            <span class="i">
              <i class="fa fa-user"></i>
            </span>
            <input type="text" name="username" id="username" placeholder="Nome de usuário" autocomplete="off" required />
          </div>
        </div>
        <div class="wrapper-label">
          <div class="wrapper-input">
            <span class="i">
              <i class="fa fa-lock"></i>
            </span>
            <input type="password" name="password" id="password" placeholder="Senha" required />
          </div>
        </div>
        <button type="submit" class="btn-submit">Login</button>
      </form>
    </div>
  </div>
</body>

</html>