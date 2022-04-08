<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FILMES</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../css/favoritos.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Cabin+Sketch&family=Mate+SC&family=Pangolin&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
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

        
        echo "<script type='text/javascript'>
				alert('Email ou senha estão errados, tente novamente');
				window.location.href = '../views/view.php';
				</script>";
        
        

      }


  
    ?>
  

    <input type="checkbox" id="check">
      <!--header start-->
    <header>      
      <div class="left_area">
        <center><h3>Lista de Favoritos</h3></center>
      </div>      
    </header>
    <!--header end-->
    <!--sidebar start-->
    <!-- <div class="sidebar">
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
    </div> -->
    <div class="container">
        <div class="row">
        <!-- <h4>Adicionados Recentemente</h4> -->
          <?php
            $busca = $user->listarFilmesFavoritos($id_usuario);
            $lista = $busca->fetchAll();
            if($lista > 1)
            {

              // $year = date("Y");
              foreach($lista as $key => $value)
              {
                
                $id_filme = $value["idFilme"];
                echo '<div class="col s12 m6 l3">';
                echo'  <div class="card hoverable">';
                echo'    <div class="card-image waves-effect waves-block waves-light">';
                echo'      <img class="activator" src="'.$value["Poster"].'">';
                echo'      <a href = "../controllers/userController.php?action=2&idFilme='.$id_filme.'&idUser='.$id_usuario.'" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">favorite</i></a>';
                echo'    </div>';
                echo'    <div class="card-content">';
                
                if($logado){

                 

                  $link_avaliar = "avaliacao.php?idFilme=".$id_filme."&idUser=".$id_usuario."";

                }
                else{

                  $id_usuario = "";
                  $link_avaliar = "./view.php";
                  

                }
                $busca_nota = $user->listarNota($id_filme);
                $Search_nota = $busca_nota->fetch();
                if($Search_nota > 1){
        
                  $nota = $Search_nota["nota"];
        
                }
                echo'      <span class="card-title activator grey-text text-darken-4 "><a href= "'.$link_avaliar.'" ><strong style = "padding: 0px;" >Avaliação: '.$nota.'</strong></a></span>';
                echo'    </div>';
                echo'    <div class="card-reveal">';
                echo'      <span class="card-title grey-text text-darken-4 center">Sinopse<i class="material-icons right">close</i></span>';
                echo'      <p>'.$value["DescricaoFilme"].'</p>';
                echo'      <p>Lançamento: '.$value["DataLancamento"].'<br>'; 
                if($value["ClassIndicativa"] == 0)
                { 
                  echo "Livre"; 
                }
                else 
                {
                 echo "Classificação Indicativa: ".$value["ClassIndicativa"]. " anos";
                }
                echo  '</p>';
                
                //echo'      <p>Duração: 1h 50m</p>';
                //echo'      <p>Onde assistir: Amazon Prime</p>';
                //echo'      <p>•Ação, Aventura, Thriller, Guerra•</p>';
                echo'    </div>';
                echo'  </div>';
                echo'</div>';
              }

            }
          ?>

         
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