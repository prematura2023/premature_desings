<?php
 require '../../config/config.php';
 require '../../config/Database.php';
 $db = new Database();
 $con = $db->conectar();
if (!empty($_POST["registro"])) {
    if (empty($_POST["nombre"]) || empty($_POST["password"])) {
        echo "Algun campo está vacío";
    } else {
        $nombre = $_POST["nombre"];
        $password = $_POST["password"];
    	$sql = $con->prepare("INSERT INTO clientes(nombre,password) VALUES(?,?)");
	if ($sql->execute()) {
		return $con->lastInsertid();

	}else{
		return 0;
	}
    }
}
?>
