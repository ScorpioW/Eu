<?php
session_start();
unset($_SESSION["user"]);
header("location: http://192.168.209.8/Estagio/Contactos/");

?>