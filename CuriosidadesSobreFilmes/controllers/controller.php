<?php 
	include "Usuario.php";

	class ClienteController{
		public function cadastrar(){
			
			$usuario = new Cliente();
			$usuario->setId($_POST["id"]);
			$usuario->setNome($_POST["nome"]);
			$usuario->setEmail($_POST["email"]);
			$usuario->setSenha($_POST["senha"]);

			if($usuario->gravar()){
				echo "Sucesso!";
			}else{
				echo "Erro!";
			}

			
		}
	}
	$cc = new UsuarioController();
	$cc->cadastrar();
 ?>