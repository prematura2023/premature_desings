<?php
 require '../config/config.php';
 require '../config/Database.php';

 
 $db = new Database();
 $con = $db->conectar();
 
 $sql = $con->prepare("SELECT 
 productos.id,
 productos.nombre,
 productos.precio,
 productos.img,
 productos.descuento
 FROM productos 
 WHERE  activo = 1");
 $sql->execute();
 $resultado = $sql->fetchAll(PDO:: FETCH_ASSOC);




?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Premature Desings</title>
    <link rel="icon" href="../assets/img/f2.ico" type="image/x-icon">
  <link rel="shortcut icon" href="/assets/img/f2.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/estilos.css">
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
  <main>
  <section class="carrusel">
    <div class="section-carrusel">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../assets/img/ENTER-MID90S-MOVIE-REVIEW-ND-ps6lnt.jpg" alt="...">
            <div class="carousel-caption d-flex justify-content-center align-items-center">
              <h1>Encuentra tu estilo perfecto</h1>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../assets/img/9610484.jpg" class="d-block w-100 img-fluid" alt="...">
            <div class="carousel-caption d-flex justify-content-center align-items-center">
              <h1>Solo en</h1>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../assets/img/Mid90s.jpg" class="d-block w-100 img-fluid" alt="...">
            <div class="carousel-caption d-flex justify-content-center align-items-center">
              <h1>Premature Desings</h1>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    </main>
</section>


<main><br><br>
	
<div class="container">
    <?php if (empty($resultado)): ?>
        <p>No hay productos disponibles.</p>
    <?php else: ?>
        <?php foreach ($resultado as $row): 
            $image = $row["img"];
        ?>
            <main class="main-container">
                <section class="product-container">
                    <article class="article">
                        <div class="img-card">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" alt="<?php echo htmlspecialchars($row['nombre']); ?>" class="img-aside">
                        </div>
                        <h5 class="text-article"><?php echo htmlspecialchars($row["nombre"]); ?></h5>
                        <p class="text-article-paragraph"><?php echo number_format($row["precio"], 3, ',', '.'); ?></p>
                        <h5 class="text-article-paragraph">
                            <small class="text-success"><?php echo htmlspecialchars($row["descuento"]); ?>% descuento</small>
                        </h5> 

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="detalles.php?id=<?php echo $row["id"]; ?>&token=<?php echo hash_hmac("sha1", $row["id"], KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
                            </div>
                            <div class="btn-group">
                                <a onclick="agrega_producto(<?php echo $row['id']; ?>, '<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>')" class="btn btn-success">Agregar</a>
                            </div>
                        </div>
                    </article>
                </section>
            </main>
        <?php endforeach; ?>
    <?php endif; ?>
</div>


<script>  
  function agrega_producto(id , token){

    let url = '../clases/carrito.php'
    let formData = new FormData()
    formData.append('id',id)
    formData.append('token',token)

    fetch(url,{
      method:'POST',
      body:formData,
      mode:'cors' 
    }).then(response => response.json())
    .then(data =>{
      if (data.ok) {
        let elemnto = document.getElementById("num_cart")
        elemnto.innerHTML = data.numero
      }
    })

  }

</script>
  <script src="https://kit.fontawesome.com/86ad41ce0a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </main>

    <?php
    include("../assets/includes/footer.php");
    ?>

</body>
</html>

