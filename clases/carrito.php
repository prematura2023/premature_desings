<?php 

require '../config/config.php';

if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$cantidad = isset($_POST['cant']) ? $_POST['cant'] : 1;
	$token = $_POST['token'];
	$token_tmp = hash_hmac('sha1', $id,KEY_TOKEN);

	if ($token == $token_tmp && $cantidad > 0 && is_numeric($cantidad)) {
		if (isset($_SESSION['carrito']['productos'][$id])) {
			$_SESSION['carrito']['productos'][$id] += $cantidad;
		}
		else
		{

			$_SESSION['carrito']['productos'][$id] = $cantidad;
		}
		$datos['numero'] = count($_SESSION['carrito']['productos']);
		$datos['ok'] = true;
	}else{
		$datos['ok'] = false;
	}
}else{
	$datos['ok'] = false;
}
echo json_encode($datos);
?>
<script src="https://kit.fontawesome.com/86ad41ce0a.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>