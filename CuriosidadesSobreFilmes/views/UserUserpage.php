<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/style.css">   
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Cabin+Sketch&family=Mate+SC&family=Pangolin&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <style>

        body{
          color: #635D6D;
          font-family: 'Pangolin', cursive;
          font-size: 25px;
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

        .update_btn{

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
          
        }  

      </style>
  </head>
	<body>
  <?php 
      session_start();
      if(!isset($_SESSION["Email"])){

        echo "<script type='text/javascript'>
        alert('Sessão expirada, faça login novamente');
        window.location.href = './views/login.html';
        </script>";


      }
      else{

        
        $button_user_text =  "Perfil";
        $button_user_route = "#";
        $button_favoritos_link = "./filmesFavoritos.php";



      }
    ?>

<input type="checkbox" id="check">
      <!--header start-->
    <header>      
      <div class="left_area">
        <a href = "./index.php" style = "text-decoration:none;"><h3>SOBRE <span>FILMES</span></h3></a>
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
    <div style = "text-align: center; margin-top: 120px; margin-left: 300px;">
    <br>
      <h1>Informações de Cadastro</h1>
      <div>
        <?php

          include "../controllers/userController.php";
          $listaInfo = new UserController();
          $email = $_SESSION["Email"];
          $busca = $listaInfo->listarInfo($email);
          $lista = $busca->fetch();
          if($lista > 1)
          {


            
            $id = $lista["ID"];
            //echo $id . "<br>";
            echo "<strong>Nome:</strong><br>";
            echo $lista["Nome"]."<br><br>";

            echo "<strong>Email:</strong><br>";
            echo $lista["Email"]."<br><br>";

            echo "<strong>Senha:</strong><br>";
            echo MD5($lista["Senha"])."&nbsp <br><br><br>";

            echo '<a class = "update_btn" href = "./AlterarDadosUsuario.php?Email='.$lista["Email"].'">Alterar Informações</a>';
            echo '<br><br><a class = "update_btn" href = "../Sair.php">Sair</a>';
           
            

          

            

          }
          else{

            echo "<script type='text/javascript'>
            alert('Houve um erro, usuario não encontrado');
            window.location.href = './login.php';
            </script>";

          }

      


        ?>
      </div>
    </div>
    <section class="images">        
        <div class="circle"></div>
    </section>
  

    
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