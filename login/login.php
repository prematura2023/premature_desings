<?php 

require '../config/config.php';
require '../config/Database.php';
require '../clases/clientesFuncione.php';

// llamamos a la clase database de nuestra base de datos para luego conectarnos
$db = new Database();
$con = $db->conectar();
// creamos una variable error como un arreglo para almacenar los errores

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <title>Inicio de sesión</title>
</head>
<body>
    <form action="login.php" method="POST">
        <h1>Iniciar sesión</h1>
        <a href="politica-de-privacidad.php">Política de privacidad</a>
        <a href="terminos-y-condiciones.php">Términos y condiciones</a>
        <hr>
        <i class="fa-solid fa-user"></i>
        <label for="nombre">Usuario</label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre de usuario" required>

        <i class="fa-solid fa-unlock"></i>
        <label for="password">Contraseña</label>
        <input name="password" type="password" id="password" placeholder="Contraseña" required>
        <hr>
        <button type="submit">Iniciar sesión</button>
        <a href="registro.php" class="btn btn-success">Crear cuenta</a><br><br>
    </form>
</body>
</html>
