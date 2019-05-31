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

/*Carrega um usuario usando o login e senha
$usuario = new Usuario();
$usuario ->login("anderson","222222");
echo $usuario;
*/

/*Criando um novo usuario
$aluno = new Usuario("aluno","111111");
$aluno->insert();
echo $aluno;
*/

/*Alterando um usuario
$usuario = new Usuario();
$usuario->loadById(4);
$usuario->update("Jose Alves", "123456");
echo $usuario;
*/

//Excluindo um usuario
$usuario = new Usuario();
$usuario->loadById(3);
$usuario->delete();
echo $usuario;

 ?>