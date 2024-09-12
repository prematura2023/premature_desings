<?php 

require_once '../config/Database.php';
require_once 'clientesFuncione.php';
$datos = [];
if (isset($_POST['action'])) {
	$action = $_POST['action'];
	$db = new Database();
	$con = $db->conectar();
	if ($action == 'validarUser') {

		$datos['ok'] = validarUser($_POST['usuario'], $con);
		
	} elseif ($action == 'validarEmail') {
		$datos['ok'] = validarEmail($_POST['email'], $con);

	}


}

echo json_encode($datos);

?>