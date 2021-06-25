<?php

  if(isset($_POST['logout'])){

    $lastLogin = "Seu último login foi: ".date("d/m/Y")." às ".date("H:i:s");

    Database::update("UPDATE `tb_admin.usuarios` SET lastlogin=? WHERE email=? AND password=?",array($lastLogin,$_SESSION['email'],$_SESSION['password']));

    Painel::logout();
  }
 
  if(isset($_POST['subscribe'])){
    $nome = $_POST['name'];
    $descricao = $_POST['description'];

    Database::insert("INSERT INTO `tb_admin.funcionarios` VALUES (?,?,?)",array("null",$nome,$descricao));
  }

  if(isset($_POST['delete'])){
    $id = $_POST['id'];

    Database::delete("DELETE FROM `tb_admin.funcionarios` WHERE id = $id");
  }
  
  $content = Database::select("SELECT * FROM `tb_admin.funcionarios`");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Painel de Controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top shadow-sm">
    <div class="container ">
      <a id="logo" class="navbar-brand" href="home">Nat.Code</a>

      <div id="button-logout">
        <form method="post" class="m-0">
          <input type="submit" class="btn btn-primary me-2" name="logout" value="Logout">
        </form>
      </div>
      

      <button id="button-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ">
          <li class="nav-item">
            <a class="nav-link" target="#card-sobre" href="">Editar sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" target="#card-cadastro" href="">Cadastrar Equipe</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" target="#card-lista" href="">Listar Equipe</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<!-- Painel de Controle -->

  <section id="section-nav" class="bg-grey-light text-white">
    <div class="container">
      <div id="div-painel" class="d-flex justify-content-between">
        <div class="d-flex align-items-center">
          <i class="bi-gear-fill fs-4 me-3"></i><span class="fs-5">Painel de Controle</span>
        </div>
        <div class="d-flex align-items-center">
          <i class="bi-calendar-check fs-5 me-2"></i>
          <p class="m-0"><?php echo $_SESSION['lastlogin'];?> </p>
        </div>
      </div> 
    </div>
  </section>

<!-- Painel -->
  <section id="section-painel" class="bg-light pt-4">
    <div class="container">

      <div class="row">

     <!-- Localização no site -->

        <div id="card-info" class="col-lg-3 mb-3">
          <div class="card">
            
            <div class="card-body p-0">
              <div class="border-bottom">
                <a class="div-link p-2 div-active" target="#card-sobre"><i id="active-gear" class="bi bi-gear-fill me-2"></i>Sobre</a>
              </div>
              <div class="border-bottom">
                <a class="div-link text-secondary p-2" target="#card-cadastro">Cadastrar Equipe</a>
              </div>
              <div class="border-bottom">
                <a class="div-link text-secondary p-2" target="#card-lista">Listar Equipe</a>
              </div>
            </div>
          </div>
        </div>

     <!-- Cards -->

        <div class="col-lg-9">

          <div id="card-sobre" class="card mb-4">
            <div class="card-header bg-secondary text-light fs-6">Sobre</div>
            <div class="card-body">
              <form >
                <label class="form-label mb-2"> <i class="bi-file-earmark-code fs-5 me-1"></i>Código HTML:</label>
                <textarea class="form-control mb-3" rows="4" name="htmlCode"></textarea>
                <button class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>

          <div id="card-cadastro" class="card mb-4">
            <div class="card-header bg-secondary text-light fs-6">Cadastrar Equipe</div>
            <div class="card-body">
              <form method="post">
                <div class="mb-3">
                  <label class="form-label"><i class="bi-person fs-5 me-1"></i>Nome do Membro:</label>
                  <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                  <label class="form-label"><i class="bi-file-earmark-text fs-5 me-1"></i>Descrição do Membro:</label>
                  <textarea class="form-control" name="description" rows="4"></textarea>
                </div>
                <input type="Submit" class="btn btn-primary" name="subscribe" value="Submit">
              </form>
            </div>
          </div>

          <div id="card-lista" class="card mb-4">
            <div class="card-header bg-secondary text-light fs-6">Listar Equipe</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-sm align-middle">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nome</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($content as $key => $value) { ?>
                    <tr>
                      <th scope="row"><?php echo $key+1?></th>
                      <td><?php echo $value['nome']?></td>
                      <td class="d-flex justify-content-center align-items-center">
                        <form method="post" class="m-0">
                          <input type="Submit" class="btn btn-danger" name="delete" value="Delete">
                          <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                        </form>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>


    </div>
    
    
  </section>



	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>