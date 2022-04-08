<!DOCTYPE html>
<html>
	<head>
		  <meta charset="UTF-8">
      		<meta http-equiv="X-UA-Compatible" content="IE=edge">
      		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<script src='../js/validar_admin.js'></script>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      		<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Cabin+Sketch&family=Mate+SC&family=Pangolin&display=swap" rel="stylesheet">
	
			<link rel="stylesheet" href="../css/style.css">
		
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
	
			<title>USUÁRIO</title>

		<style>

			body{				
				font-family: 'Pangolin', cursive;
				font-size:30px;
			}
			header{
				height: 55px;
				padding: 15px;
				left: 0;
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
			}
			input[type="password"]{
				font-size: 20px;
				font-family: 'Pangolin', cursive; 
			}
			
			a{
			color:#635D6D;
			font-family: 'Pangolin', cursive; 
			}
		</style>
	</head>
	<body>
	<?php 
      session_start();
	  session_destroy();  
    ?>
	<input type="checkbox" id="check">
      <!--header start-->
    <header>		
			<div class="left_area">
				<h3>SOBRE <span>FILMES</span></h3>
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
			<!--<button id = "IJKHY" onclick = "lookedin()"> <?php echo MD5("Admin"); ?></button>-->
			<br>
			<form method="POST" name="form"  action="../controllers/userController.php"> 
			<br>
             
        <input type = "hidden" value = "3" name = "action"/>
        <input type = "hidden" value = "<?php echo $lista["ID"]; ?>" name = "id"/>
        <strong>Email:</strong><br> <input type="text" name = "email" id="email" autocomplete = "off"><br>
						<input type="hidden" value = "2"  name = "action"><br>
        
        <strong>Senha:</strong><br> <input type="password" name = "senha" id="senha" autocomplete = "off"><br>
        </br><br>				
				<input type="submit" value="Logar" id="button">
        <a href = "./cadastro.html" >Cadastre-se</a>
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
