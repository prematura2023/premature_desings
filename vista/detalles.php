<?php
require '../config/config.php';
require '../config/Database.php';

$db = new Database();
$con = $db->conectar();


if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
}
    $sql = $con->prepare("SELECT 
        productos.id,
        productos.nombre,
        productos.descripcion,
        productos.precio,
        productos.img,
        productos.descuento
        FROM productos 
        WHERE id = :id AND activo = 1");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $producto = $sql->fetch(PDO::FETCH_ASSOC);

  
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Premature Desings</title>
    <meta id="twt-site" name="twitter:site" content="@fontawesome" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        if (!isset($_SESSION['user_id'])) {
                        ?>
                            <a class="nav-link" href="../login/login.php">Iniciar sesión</a>
                        <?php
                        } else {
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
                    <li class="nav-item">
                        <a href="../transacciones/carrito.php" class="btn btn-primary">
                            <i class="fa fa-cart-arrow-down" style="margin: 5px;"></i>Carrito
                            <span id="num_cart" class="badge bg-secondary" style="margin: 5px;"><?php echo $num_cart; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main class="flex-shrink-0">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-5">
                <img src="../<?php echo htmlspecialchars($producto["img"]); ?>" class="img-fluid" style="max-width: 100%; height: auto;" alt="<?php echo htmlspecialchars($producto["nombre"]); ?>">
            </div>
            <div class="col-md-7">
                <h1 class="my-3"><?php echo htmlspecialchars($producto["nombre"]); ?></h1>
                <p class="lead"><?php echo number_format($producto["precio"], 2, ',', '.'); ?> $</p>
                <p><small class="text-success"><?php echo htmlspecialchars($producto["descuento"]); ?>% de descuento</small></p>
                <div class="mb-3">
                    <input class="form-control" id="cantidad" name="cantidad" type="number" min="1" max="10" value="1">
                </div>
                <div class="col-md-8">
         <h6 class="my-4"><?php echo htmlspecialchars($producto["descripcion"]); ?></h56>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button" onClick="comprarAhora(<?php echo $producto['id']; ?>, cantidad.value)">Comprar ahora</button>
                    <button class="btn btn-outline-primary" type="button" onClick="addProducto(<?php echo $producto['id']; ?>, cantidad.value)">Agregar al carrito</button>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function addProducto(id, cantidad) {
        var url = 'clases/carrito.php';
        var formData = new FormData();
        formData.append('id', id);
        formData.append('cantidad', cantidad);

        fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors',
        }).then(response => response.json())
        .then(data => {
            if (data.ok) {
                let elemento = document.getElementById("num_cart");
                elemento.innerHTML = data.numero;
            }
        });
    }

    function comprarAhora(id, cantidad) {
        var url = 'clases/carrito.php';
        var formData = new FormData();
        formData.append('id', id);
        formData.append('cantidad', cantidad);

       
    }
</script>
  <script src="https://kit.fontawesome.com/86ad41ce0a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php
    include("../assets/includes/footer.php");
    ?>
  </body>
</html>
