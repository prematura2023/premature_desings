<?php
 require '../config/config.php';
 require '../config/database.php';
 require '../clases/clientesFuncione.php';

 $db = new Database();
 $con = $db->conectar();

 $error=[];
 if(!empty($_POST)){

$nombre = trim(htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8'));
$contra = trim(htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8'));

if(esNulo([$nombre,$contra])){

$error[] = "llene los campos vacios";


}

if(count($error)==0){
    $id = Registrar_usuarios([$nombre,$contra],$con);
    if($id > 0){

        $url = URL. '/login.php';
    }

}else{
    $error[] = "Error al registrarse";
}





 }else{
    $error[] = "Error al registrarse";
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
    <form action="registro.php" method="POST">
        <h3>Regístrate</h3>
      

        <div class="input-wrapper">
            <input type="text" name="nombre" placeholder="Nombre">
        </div>
        <div class="input-wrapper">
            <input type="password" name="password" placeholder="Contraseña">
        </div>
        <input class="boton" type="submit" name="registro" value="enviar">
        <a href="login.php">Inicia sesión</a>
    </form>
</body>