<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FILMES</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="../css/carousel.css">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    
  </head>
  <body>
    <?php 
      session_start();
      if(isset($_SESSION['Email'])){
        
        include ("../controllers/userController.php");
        $user = new User();
        $button_user_text =  "Perfil";
        $button_user_route = "./UserUserPage.php";
        if($_SESSION['Email'] == "yily.isxim9@hotmail.com" || $_SESSION['Email'] == "sqcbnqyg.ndgqs13@hotmail.com" ){

          $button_user_text =  "Voltar";
          $button_user_route = "./painelAdmin.php";

        }
        $button_favoritos_link = "./filmesFavoritos.php";
        $id = $user->RetornarId($_SESSION["Email"]);
        $id_user = $id->fetch();
        if($id_user > 0){

          $id_usuario = $id_user["ID"];

        }
        
        
        
        $logado = true;    


      }
      else{

        include ("../controllers/userController.php");
        $user = new User();
        $button_user_text =  "Login";
        $button_user_route = "./view.php";
        $button_favoritos_link = "./view.php";
        $id_usuario = "";
        $link_avaliar = "./view.php";
        $logado = false;
        
        

      }


  
    ?>
  

    <input type="checkbox" id="check">
      <!--header start-->
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
      <h3><span><a href = "./index.php">SOBRE FILMES</a></span></h3>
      </div>
      <div class="right_area">
        <a href="<?php echo $button_user_route ?>" class="login_btn"><?php echo $button_user_text ?></a>
      </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <div class="sidebar">
      <div class="menu"></div>
      <a class="sub-btn"><i class="fas fa-desktop"></i><span>Filmes</span><span><i class="fas fa-angle-right dropdown"></i></span></a>
        <div class="sub-menu">
          <a href="./acao.php" class="sub-item"><span>Ação</span></a>
          <a href="./comedia.php" class="sub-item"><span>Comédia</span></a>
          <a href="./ficcao.php" class="sub-item"><span>Ficção científica</span></a>
          <a href="./romance.php" class="sub-item"><span>Romance</span></a>
          <a href="./terror.php" class="sub-item"><span>Terror</span></a>
        </div>
      <a href="<?php echo $button_favoritos_link ?>"><i class="fas fa-heart"></i><span>Favoritos</span></a>
      <a href="#"><i class="fas fa-info-circle"></i><span>Sobre</span></a>
      <a href="#"><i class="fas fa-sliders-h"></i><span>Desenvolvedores</span></a>
    </div>
    <div class="container">

      <div class = "sobre"> 
        <h4 style = "color: #0B87A6">Sobre</h4>
        <p>
          Este sistema é um projeto das aulas de PW3 do 3ºModulo do curso técnico em Desenvolvimento de Sistemas da ETEC Jacinto Ferreira de Sá. 
          Ele tem o objetivo de listar informações do sprincipais filmes de Ação, Terror, Ficção Ciêntífica, Comédia e Romance juntamente com as funcionalidades de avaliação e lista de favoritos. 
        </p>

      </div>

    </div>

  
  </body>
</html>