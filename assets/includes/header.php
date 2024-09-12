<!doctype html>
<html lang="en">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Premature Desings</title>
    <link rel="premature" href="../assets/img/F.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/estilos.css?">
  </head>
  <header>
        <nav class="navbar navbar-expand-lg nav class="navbar bg-dark border-bottom border-body data-bs-theme="dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php">Premature desings</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Nosotros.php">Nosotros</a>
                  </li>
                  <li>
                   
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Productos
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="gorras.php">Gorras</a></li>
                      <li><a class="dropdown-item" href="camisetas.php">Camisetas</a></li>
                      <li><a class="dropdown-item" href="tenis.php">Tenis</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
               
                    <?php
                   
                    
                    if(!isset($_SESSION['user_id'])){
                     ?>
                  <a class="nav-link" aria-enabled="true" href="../login/login.php">Iniciar sesion</a>
                     
                  <?php 
                    }else{
                     ?>
                        <li class="nav-item dropdown">
                    <a class="btn btn-primary nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:auto;">
                      <?php echo $_SESSION['user_name']; ?>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../clases/salir.php">Salir</a></li>
        
                    </ul>
                  </li>
                    <?php 
                    }
                     ?>
                  </li>
           
                   
                  </li>
                  <a href="../transacciones/carrito.php" class="btn btn-primary"><i class="fa fa-cart-arrow-down" style="margin: 5px;"></i>Carrito<span id="num_cart" class="badge bg-secondary" style="margin: 5px;"><?php  echo $num_cart; ?></span></a>
                  </li>
                   
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </div>
  </header>