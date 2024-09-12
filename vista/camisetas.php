
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
 WHERE  activo = 1 AND id_categoria = 2");
 $sql->execute();
 $resultado = $sql->fetchAll(PDO:: FETCH_ASSOC);
?>


<?php include("../assets/includes/header_talesc.php");
 include("../assets/includes/footer.php");
?>