<?php

require_once("config.php");

//Carrega um usuário
/*
$user = new Usuario();
$user->loadbyId(1);
echo $user;
*/

//Carrega uma lista de usuários
/*
$lista = Usuario::getList();
echo json_encode($lista);
*/

//Carrega uma lista de usuarios buscando pelo login
/*$search = Usuario::search("us");
echo json_encode($search);*/

//Carrega um usuário usando o login e a senha
$usuario = new Usuario();
$usuario->login("user", "12345");

echo $usuario;

?>