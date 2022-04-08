<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Cabin+Sketch&family=Mate+SC&family=Pangolin&display=swap" rel="stylesheet">
    <style>

      body{
        color: #22242A;
        font-family: 'Cabin Sketch', cursive;
        font-size:25px;
      }
      header{
        height: 25px;
        padding: 15px;
        left: 0;
      }
      strong, h1{
        font-family: 'Cabin Sketch', cursive;
        color: #22242A ;       
      } 
      span>a{

        text-decoration: none;
        color: inherit;

      }

      input[type="submit"] {
          padding: 5px 10px;
          background: #8B7B90;
          text-decoration: none;
          float: inherit;
          margin-left: 10px;
          border-radius: 2px;          
          font-weight: 600;
          color: white;
          transition: 0.5s;
          transition-property: background;
          font-size: 20px;
          font-family: 'Pangolin', cursive;
      }
      input[type="text"]{
        font-size: 20px;
        font-family: 'Pangolin', cursive; 
        color:#635D6D
      }
      input[type="password"]{
        font-size: 20px;
        font-family: 'Pangolin', cursive; 
        color:#635D6D
      }

    </style>
  
  
  </head>
	<body >

		<?php
      session_start();
      include "../controllers/userController.php";
      $listaInfo = new UserController();
      if(!isset($_SESSION["Email"])){

        echo "<script type='text/javascript'>
        alert('Sessão expirada, faça login novamente');
        window.location.href = './login.php';
        </script>";


      }
      $email = $_GET["Email"];
      $button_user_text =  "Perfil";
      $button_user_route = "#";
      $busca = $listaInfo->listarInfo($email);
      $lista = $busca->fetch();

    ?>

    <input type="checkbox" id="check">
      <!--header start-->
    <header>      
      <div class="left_area">
        <h3>SOBRE <span>FILMES</span></h3>
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
          <a href="#" class="sub-item"><span>Ação</span></a>
          <a href="#" class="sub-item"><span>Comédia</span></a>
          <a href="#" class="sub-item"><span>Ficção científica</span></a>
          <a href="#" class="sub-item"><span>Romance</span></a>
          <a href="#" class="sub-item"><span>Terror</span></a>
        </div>
      <a href="#"><i class="fas fa-heart"></i><span>Favoritos</span></a>
      <a href="#"><i class="fas fa-info-circle"></i><span>Sobre</span></a>
      <a href="#"><i class="fas fa-sliders-h"></i><span>Desenvolvedores</span></a>
    </div>


  <div style = "text-align: center; margin-top: 120px; margin-left: 300px;">
			<form action =  "../controllers/userController.php" method="POST">
				<br>
        <h1>Alterar Informações</h1>        
        <input type = "hidden" value = "3" name = "action"/>
        <input type = "hidden" value = "<?php echo $lista["ID"]; ?>" name = "id"/>
        <strong>Nome:</strong><br> <input type="text" size="35" maxlength="256" value = "<?php echo $lista["Nome"]; ?>" name="nome" autocomplete="off" required autofocus>
        <br><br>
        <strong>Senha:</strong><br> <input type="password" name="senha" id = "senha" value = "<?php echo $lista["Senha"]; ?>" autocomplete="off" required>   
        </br><br>
				<!-- <span id = "valid_1">Senhas não batem</span> -->
				<strong>Confirmar Senha:</strong><br> <input type="password" value = "<?php echo $lista["Senha"]; ?>" id = "confirm_senha" name="confirm_senha" onkeyup="IsEqual()" autocomplete="off" required> 
				<br><br><br>
				<input type="submit" value="Confirmar" id="button">
        <section class="images">        
        <div class="circle"></div>
        </section>
			</form>
		</div>

		    
    <!--sidebar end-->
    <script type="text/javascript">
      $(document).ready(function(){
        //jquery for toggle sub menus
        $('.sub-btn').click(function(){
          $(this).next('.sub-menu').slideToggle();
          $(this).find('.dropdown').toggleClass('rotate');
        });
      });
    </script>
	</body>
</html>