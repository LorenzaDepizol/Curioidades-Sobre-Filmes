<?php

  include "../models/filmeModel.php";

  class FilmesController{

    public function cadastrar(){
      $filme = new Filme();
      $filme->setTitulo($_POST["titulo"]);
      $filme->setDescricao($_POST["descricao"]);
      $filme->setClassIndic($_POST["classindic"]);
      $filme->setData_lanc($_POST["data_lanc"]);
      $filme->setDiretor_filme($_POST["diretor"]);
      $filme->setGenero($_POST["genero"]);
      $filme->setPoster($_POST["link"]);
      if($filme->cadastrar()){

        echo "<script type='text/javascript'>
				alert('O cadastro foi concluido com sucesso');
				window.location.href = '../views/painelAdmin.php';
				</script>";

      }
      else{
          
        echo "Houve um erro";

      }

      

    }


    public function listarInfoFilme($id){

      $filme = new Filme();
      // echo $email;
      // die();
      return $filme->listarInfoFilme($id);

    }

    public function ExcluirFilme($id){

      $filme = new Filme();
      // echo $email;
      // die();
      return $filme->ExcluirFilme($id);

    }

    public function EditaDados($id){	
      $filme = new Filme();			
      $filme->setTitulo($_POST["titulo"]);
      $filme->setDescricao($_POST["descricao"]);	
      $filme->setClassIndic($_POST["classindic"]);	
      $filme->setData_lanc($_POST["data_lanc"]);	
      $filme->setDiretor_filme($_POST["diretor"]);	
      $filme->setGenero($_POST["genero"]);	
      $filme->setPoster($_POST["link"]);
      if($filme->EditarDados($id))
      {
          
        echo "<script type='text/javascript'>
				alert('Dados alterados com sucesso');
				window.location.href = '../views/painelAdmin.php';
				</script>";
      
      }
      else
      {
         
        echo "<script type='text/javascript'>
				alert('Houve um erro, tente novamente');
				window.location.href = '../views/painelAdmin.php';
				</script>";
      
      }
  }



  }

  if(isset($_POST["action"])){

    $action = $_POST["action"];
    if($action == 1){

      $operation = new FilmesController();
      $operation->cadastrar();

    }
    else if($action == 2){

      $operation = new FilmesController();
      $operation->EditaDados($_POST["id"]);

    }


  }
  else if(isset($_GET["action"])){

    $action = $_GET["action"];
    if($action == 3){

      $operation = new FilmesController();
      $operation->ExcluirFilme($_GET["id"]);


    }

  }


?>