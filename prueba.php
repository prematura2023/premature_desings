<?php

$pass = "123";

$a = password_hash($pass,PASSWORD_DEFAULT);

echo $a;
?>