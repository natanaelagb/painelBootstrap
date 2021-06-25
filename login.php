<?php

  if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = Database::connect()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE email=? AND password=?");
    $sql->execute(array($email,$password));

    if($sql->rowCount() == 1){
      
      $infoUser = $sql->fetch();
      $_SESSION['login']      = true;
      $_SESSION['email']      = $infoUser['email'];
      $_SESSION['password']   = $infoUser['password'];
      $_SESSION['nome']       = $infoUser['nome'];
      $_SESSION['lastlogin']  = $infoUser['lastlogin'];
      
    }

    header('Location: '.INCLUDE_PATH_PAINEL);
    die();
  }

?>


<!DOCTYPE html>
<html>
<head>
  <title>Página de Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body class="text-center">
  <div id="form-login">
    <form method="post">

      <h3 class="fw-normal mb-4">Por favor, faça login.</h3>

      <div>
        <input id="emailInput" class="form-control inputlogin text-secondary" type="email" name="email" placeholder="name@example.com">

        <input id="passInput" class="form-control inputlogin text-secondary" type="password" name="password" placeholder="password">
      </div>

      <div class="mt-2 mb-2">
        <input id="rememberInput" type="checkbox" name="remember">
        <label for="rememberInput">Lembre-me</label>
      </div>
      <div class="d-grid gap-2">
        <input class="btn btn-primary" type="submit" name="login" value="Login">
      </div>
      

    </form>
  </div>
</body>
</html>