<?php

  include "../models/adminModel.php";
  class AdminController extends Admin{

    private $admin;

    
    public function listarFilmes(){

      $admin = new Admin();
      // echo $email;
      // die();
      return $admin->listarFilmes();

    }

    public function listarUsuarios(){

      $admin = new Admin();
      // echo $email;
      // die();
      return $admin->listarUsuarios();

    }

    // public function RetornarNumeroFilmes(){

    //   $admin = new Admin();
    //   // echo $email;
    //   // die();
    //   return $admin->RetornarNumeroFilmes();

    // }

 
    

    public function validar($email, $senha){

      $admin = new Admin();
      $busca = $admin->validar($email, $senha);
      $lista = $busca->fetch();
       if($lista > 0){

        //Inicia a sessão para passar os dados do usuario
        session_start();
        $_SESSION['Email'] = $email;
        $_SESSION['Senha'] = $senha;
        $_SESSION['Conta'] = 4;

        echo "<script type='text/javascript'>
				alert('Login feito com sucesso');
				window.location.href = '../views/painelAdmin.php';
				</script>";

       }
       else{

        echo "<script type='text/javascript'>
				alert('Email ou senha estão errados, tente novamente');
				window.location.href = '../views/view.php';
				</script>";

       }

    }

  
  }




  if(isset($_POST["action"]))
  {

    $action = $_POST["action"];
    if($action == 1){

      $operation = new AdminController();
      $operation->validar($_POST["email"], $_POST["senha"]);

    }


  }
  




  




?>