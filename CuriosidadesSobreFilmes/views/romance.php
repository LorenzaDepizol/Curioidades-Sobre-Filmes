<?php include "cabecalho-romance.php" ?>
<body>
  <header>
          <center><h1>ROMANCE</h1></<center>
  </header>
  <?php
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
    <div class="container">
        <div class="row">
          <?php

            $busca = $user->listarFilmesRomance();
            $lista = $busca->fetchAll();
            foreach($lista as $key => $value)
        {
          
          $id_filme = $value["idFilme"];
          if($logado){

            $link_avaliar = "avaliacao.php?idFilme=".$id_filme."&idUser=".$id_usuario."";
            $verifica_favorito = $user->IsFavorite($id_filme, $id_usuario);
            $favorites = $verifica_favorito->fetch();
            $IsFavorite = false;
            if($favorites > 1){

              $IsFavorite = true;

            }
            if($IsFavorite)
            {

              $favorito = '<a href = "../controllers/userController.php?action=2&idFilme='.$id_filme.'&idUser='.$id_usuario.'" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light "><i class="material-icons"  style = "background-color: #ff4081">favorite</i></a>';
              
            }
            else{

              $favorito = '<a href = "../controllers/userController.php?action=1&idFilme='.$id_filme.'&idUser='.$id_usuario.'" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light "><i class="material-icons"  style = "background-color: #ff4081">favorite_border</i></a>';

            }
          }
          else{

            $id_usuario = "";
            $link_avaliar = "./view.php";
            $IsFavorite = "./view.php";
            $favorito = '<a href = "./view.php" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light  "><i class="material-icons"  style = "background-color: #ff4081">favorite_border</i></a>';
            
          }
          echo '<div class="col s12 m6 l3">';
          echo'  <div class="card hoverable">';
          echo'    <div class="card-image waves-effect waves-block waves-light">';
          echo'      <img class="activator" src="'.$value["Poster"].'">';
          echo $favorito;
          echo'    </div>';
          echo'    <div class="card-content">';
          $busca_nota = $user->listarNota($id_filme);
          $Search_nota = $busca_nota->fetch();
          if($Search_nota > 1){
  
            $nota = $Search_nota["nota"];
  
          }
          echo'      <span class="card-title activator grey-text text-darken-4 "><a href= "'.$link_avaliar.'" ><strong style = "color: white;" >Avaliação: '.$nota.'</strong></a></span>';
          echo'    </div>';
          echo'    <div class="card-reveal">';
          echo'      <span class="card-title  text-darken-4 center">Sinopse<i class="material-icons right">close</i></span>';
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
          echo'    </div>';
          echo'  </div>';
          echo'</div>';
        }

          ?>
        </div> 
      </div> 
</body>

