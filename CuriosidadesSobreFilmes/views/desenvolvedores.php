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
      <a href="./sobre.php"><i class="fas fa-info-circle"></i><span>Sobre</span></a>
      <a href="./desenvolvedores.php"><i class="fas fa-sliders-h"></i><span>Desenvolvedores</span></a>
    </div>
    <div class="container">
      <div class = "devs">
      <div class="dev">
          <div class = "area_dev">
            <img src="../images/Lorenza.jpg" alt = "Leonardo Faria" class="img_dev">
            <div class = "descricao">
              <h3 class = "nome">Lorenza Andrade</h3>
              <h5> Programadora Front-End</h5>
            </div>
          </div>
        </div>

        <div class="dev">
          <div class = "area_dev">
            <img src="../images/Euu_recente_3.jpeg" alt = "Leonardo Faria" class="img_dev">
            <div class = "descricao">
              <h3 class = "nome">Leonardo Faria</h3>
              <h5> Programador Back-End</h5>
            </div>
          </div>
        </div>
    </div>

    </div>

  
  </body>
</html>