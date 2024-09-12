<?php 

define("URL", "https://localhost/tienda_online");
define("MAIL_HOST", "smtp.gmail.com");
define("MAIL_USER", "juanjosemira12@gmail.com");
define("MAIL_PASS", "oozluvytwykzqpkx");
define("MAIL_PORT", "587");
define("KEY_TOKEN", "TPM.ñ-13790564");
define("KEY_ID", "TPM.ñ-13790564");
define("CURRENCY", "MXN");

define("MONEDA", "$");
session_start();

$num_cart =0;
if (isset($_SESSION['carrito']['productos'])) {

    $num_cart = count($_SESSION['carrito']['productos']);
}



?>