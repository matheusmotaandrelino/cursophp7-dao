<?php

require_once("config.php");

$user = new Usuario();

$user->loadbyId(1);

echo $user;


?>