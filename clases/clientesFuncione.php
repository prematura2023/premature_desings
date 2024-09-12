<?php 


function iniciarSesion($usuario, $password){
    $sentencia = "SELECT id, nombre FROM clientes WHERE nombre  = ?";
    $resultado = select($sentencia, [$usuario]);
    if($resultado){
        $nombre = $resultado[0];
        $verificaPass = verificarPassword($nombre->id, $password);
        if($verificaPass) return $nombre;
    }
} 	
     
