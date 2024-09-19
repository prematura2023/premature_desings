<?php
require '../config/config.php';
require '../config/database.php';

 $db = new Database();
 $con = $db->conectar();

if(isset($_POST['registro'])){
    
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $gmail = $_POST['gmail'];
    $contraseña = $_POST['password'];

    $consulta = "INSERT INTO clientes (gmail,nombre,password,usuario) VALUES ( '$gmail', '$nombre', ' $contraseña' , '$usuario' )";
    
    if($con->query($consulta)){
        echo "Se creo";
    }else{
        echo "nada";
    }

}



?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Premature</title>
        <link rel="stylesheet" href="../assets/css/estilo.css">
        
</head>
    <form action="" method="POST">
        <h3>Regístrate</h3>
      
        <div class="input-wrapper">
            <input type="text" name="nombre" placeholder="Nombre" required>
        </div>
        <div class="input-wrapper">
            <input type="text" name="usuario" placeholder="Usuario" required>
        </div>
        <div class="input-wrapper">
            <input type="email" name="gmail" placeholder="Correo de electronico" required>
        </div>
        <div class="input-wrapper">
            <input type="password" name="password" placeholder="Contraseña" required>
        </div>
        <input class="boton" type="submit" name="registro" value="enviar">
        <a href="login.php">Inicia sesión</a>
    </form>
</body>