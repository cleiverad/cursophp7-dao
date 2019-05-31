<?php 

require_once("config.php");

/*
$sql = new Sql();
$usuarios = $sql->select("SELECT * FROM TB_USUARIOS");
echo json_encode($usuarios);
*/

/* Carrega um usuario
$root = new Usuario();
$root->loadById(4);
echo $root;
*/

/*Carrega uma lista de usuarios
$lista = Usuario::getList();
echo json_encode($lista);
*/

/*Carrega uma lista de usuarios buscando pelo login
$search = Usuario::search("o");
echo json_encode($search);
*/

//Carrega um usuario usando o login e senha
$usuario = new Usuario();
$usuario ->login("anderson","222222");

echo $usuario;
 ?>