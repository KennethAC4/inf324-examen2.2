<?php
session_start();

$correo=$_GET['email'];
$contraseña=$_GET['password'];

echo $correo;