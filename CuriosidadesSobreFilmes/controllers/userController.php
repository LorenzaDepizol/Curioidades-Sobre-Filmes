<?php

  include "../models/userModel.php";

  class UserController{

    public function cadastrar(){
      $user = new User();
      $user->setNome($_POST["nome"]);
      $user->setEmail($_POST["email"]);
      $user->setSenha($_POST["senha"]);
      $user->setStatus(true);
      if($user->cadastrar()){

        echo "<script type='text/javascript'>
				alert('O cadastro foi concluido com sucesso');
				window.location.href = '../views/view.php';
				</script>";

      }
      else{
          
        echo "Houve um erro";

      }

      

    }

    
    public function listarInfo($email){

      $user = new User();
      // echo $email;
      // die();
      return $user->listarInfo($email);

    }

    public function listarFilmesFavoritos($id_usuario){

      $user = new User();
      // echo $email;
      // die();
      return $user->listarFilmesFavoritos($id_usuario);

    }

    
    public function RemoverFilmeFavorito($id_filme, $id_usuario){

      $user = new User();
      // echo $email;
      // die();
      if($user->RemoverFilmeFavorito($id_filme, $id_usuario)){

        echo "<script type='text/javascript'>
				alert('Filme removido da lista de favoritos com sucesso');
				window.location.href = '../views/filmesFavoritos.php';
				</script>";

      }
      else{

        echo "<script type='text/javascript'>
				alert('Houve um erro, tente novamente');
        window.location.href = '../views/filmesFavoritos.php';
				</script>";
        
      }

    }

    
    public function listarInfoFilme($id_filme){

      $user = new User();
      // echo $email;
      // die();
      return $user->listarInfoFilme($id_filme);

    }

    public function RetornarId($email){

      $user = new User();
      // echo $email;
      // die();
      return $user->RetornarId($email);

    }

    public function VerificaAvaliacao($id, $id_filme){

      $user = new User();
      // echo $email;
      // die();
      return $user->VerificaAvaliacao($id, $id_filme);

    }

    public function listarFilmes(){

      $admin = new Admin();
      // echo $email;
      // die();
      return $admin->listarFilmes();

    }

    public function listarFilmesAcao(){

      $admin = new Admin();
      // echo $email;
      // die();
      return $admin->listarFilmesAcao();

    }

    public function listarFilmesComedia(){

      $admin = new Admin();
      // echo $email;
      // die();
      return $admin->listarFilmesComedia();

    }

    public function listarFilmesFiccao(){

      $admin = new Admin();
      // echo $email;
      // die();
      return $admin->listarFilmesFiccao();

    }

    public function listarFilmesRomance(){

      $admin = new Admin();
      // echo $email;
      // die();
      return $admin->listarFilmesRomance();

    }

    public function listarFilmesTerror(){

      $admin = new Admin();
      // echo $email;
      // die();
      return $admin->listarFilmesTerror();

    }

    public function listarAvaliacoes($idFilme){

      $user = new User();
      // echo $email;
      // die();
      return $user->listarAvaliacoes($idFilme);

    }

    public function IsFavorite($id_filme, $id_usuario){

      $user = new User();
      // echo $email;
      // die();
      return $user->IsFavorite($id_filme, $id_usuario);

    }

    public function listarNota($idFilme){

      $user = new User();
      // echo $email;
      // die();
      return $user->listarNota($idFilme);

    }

    public function Avaliar($idFilme, $idUser){
      $user = new User();
      $user->setAvaliacao($_POST["nota"]);
      $user->setComentario($_POST["coments"]);
      if($user->avaliar($idFilme, $idUser)){

        echo "<script type='text/javascript'>
				alert('O cadastro foi concluido com sucesso');
				window.location.href = '../views/index.php';
				</script>";

      }
      else{
          
        echo "Houve um erro";

      }

      

    }

    
    public function AddFilmeFavorito($id_filme, $id){

      $user = new User();
      if($user->AddFilmeFavorito($id_filme, $id)){

        echo "<script type='text/javascript'>
				alert('Adicionado a lista de favoritos com sucesso');
				window.location.href = '../views/index.php';
				</script>";

       }
       else{

        echo "<script type='text/javascript'>
				alert('Houve um erro ao adicionar, tente novamente');
				window.location.href = '../views/index.php';
				</script>";

       }

    }




    public function validar($email, $senha){

      $user = new User();
      // $email = $_POST['email'];
      // $senha = $_POST['senha'];
      // echo $email;
      // die();
      $busca = $user->validar($email, $senha);
      $lista = $busca->fetch();
       if($lista > 0){

        //Inicia a sessão para passar os dados do usuario para o arquivo senha.php
        session_start();
        $_SESSION['Email'] = $email;
        $_SESSION['Senha'] = $senha;
        $_SESSION['Conta'] = $_POST["conta"];

        echo "<script type='text/javascript'>
				alert('Login feito com sucesso');
				window.location.href = '../views/UserUserpage.php';
				</script>";

       }
       else{

        echo "<script type='text/javascript'>
				alert('Email ou senha estão errados, tente novamente');
				window.location.href = '../views/view.php';
				</script>";

       }

    }

    public function EditaDados($id){	
      $user = new User();			
      $user->setNome($_POST["nome"]);
      $user->setSenha($_POST["senha"]);	
      if($user->EditarDados($id))
      {
          
        echo "<script type='text/javascript'>
				alert('Dados alterados com sucesso');
				window.location.href = '../views/UserUserPage.php';
				</script>";
      
      }
      else
      {
         
        echo "<script type='text/javascript'>
				alert('Houve um erro, tente novamente');
				window.location.href = '../views/UserUserPage.php';
				</script>";
      
      }
  }




  }

  if(isset($_POST["action"])){

    $action = $_POST["action"];
    if($action == 1){

      $operation = new UserController();
      $operation->cadastrar();

    }
    else if($action == 2){

      $operation = new UserController();
      $operation->validar($_POST["email"], $_POST["senha"]);

    }
    else if($action == 3){

      $operation = new UserController();
      $operation->EditaDados($_POST["id"]);

    }
    else if($action == 4){

      $operation = new UserController();
      $operation->Avaliar($_POST["idFilme"], $_POST["idUser"]);

    }

  }
  else if(isset($_GET["action"])){

    $action = $_GET["action"];
    if($action == 1){

      $operation = new UserController();
      $operation->AddFilmeFavorito($_GET["idFilme"], $_GET["idUser"]);

    }
    else if($action == 2){

      $operation = new UserController();
      $operation->RemoverFilmeFavorito($_GET["idFilme"], $_GET["idUser"]);

    }

  }


?>