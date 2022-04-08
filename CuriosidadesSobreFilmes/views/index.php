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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Cabin+Sketch&family=Mate+SC&family=Pangolin&display=swap" rel="stylesheet">
    
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
      
      <div id = "recent">
        <center><h4 class = "titleCarousel" style = "color: white;" >Adicionados Recentemente</h4></center>
        <div class="MS-content">
          <?php
            $busca = $user->listarFilmes();
            $lista = $busca->fetchAll();
            if($lista > 1)
            {

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

                    $favorito = '<a href = "../controllers/userController.php?action=2&idFilme='.$id_filme.'&idUser='.$id_usuario.'" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light blue"><i class="material-icons">favorite</i></a>';
                    
                  }
                  else{

                    $favorito = '<a href = "../controllers/userController.php?action=1&idFilme='.$id_filme.'&idUser='.$id_usuario.'" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light blue"><i class="material-icons">favorite_border</i></a>';

                  }
                }
                else{

                  $id_usuario = "";
                  $link_avaliar = "./view.php";
                  $IsFavorite = "./view.php";
                  $favorito = '<a href = "./view.php" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light blue "><i class="material-icons">favorite_border</i></a>';
                  
                }

                echo '<div  class="item">';
                echo'  <div class="card hoverable  imgTitle">';
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
                echo'      <span class="card-title activator grey-text text-darken-4 "><a href= "'.$link_avaliar.'" ><strong style = "color: white;"  >Avaliação: '.$nota.'</strong></a></span>';
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

            }
          ?>
        </div>
          <div class="MS-controls">
              <button class="MS-left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
              <button class="MS-right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
          </div>
      </div>

      <br><br><br>

      <!--Ação-------------------------------------------------------------------->
      <div id = "acao">
      <center><h4 class = "titleCarousel" style = "color: #19B3D3;" >Ação</h4></center>
        <div class="MS-content">
          <?php
            $busca = $user->listarFilmesAcao();
            $lista = $busca->fetchAll();
            if($lista > 1)
            {

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

                    $favorito = '<a href = "../controllers/userController.php?action=2&idFilme='.$id_filme.'&idUser='.$id_usuario.'" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light blue"><i class="material-icons">favorite</i></a>';
                    
                  }
                  else{

                    $favorito = '<a href = "../controllers/userController.php?action=1&idFilme='.$id_filme.'&idUser='.$id_usuario.'" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light blue"><i class="material-icons">favorite_border</i></a>';

                  }
                }
                else{

                  $id_usuario = "";
                  $link_avaliar = "./view.php";
                  $IsFavorite = "./view.php";
                  $favorito = '<a href = "./view.php" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light blue "><i class="material-icons">favorite_border</i></a>';
                  
                }

                echo '<div  class="item">';
                echo'  <div class="card hoverable  imgTitle">';
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
                echo'      <span class="card-title activator grey-text text-darken-4 "><a href= "'.$link_avaliar.'" ><strong style = "color:white;" >Avaliação: '.$nota.'</strong></a></span>';
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

            }
          ?>
        </div>
          <div class="MS-controls">
              <button class="MS-left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
              <button class="MS-right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
          </div>
      </div>

      <br><br><br>

      <!--Comédia-------------------------------------------------------------------->
      <div id = "comedia">
      <center><h4  class = "titleCarousel" style = "color: hsl(22, 87%, 48%)" >Comédia</h4></center>
        <div class="MS-content">
          <?php
            $busca = $user->listarFilmesComedia();
            $lista = $busca->fetchAll();
            if($lista > 1)
            {

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

                    $favorito = '<a href = "../controllers/userController.php?action=2&idFilme='.$id_filme.'&idUser='.$id_usuario.'" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light "><i class="material-icons" style = "background-color: hsl(22, 87%, 48%);">favorite</i></a>';
                    
                  }
                  else{

                    $favorito = '<a href = "../controllers/userController.php?action=1&idFilme='.$id_filme.'&idUser='.$id_usuario.'" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light "><i class="material-icons" style = "background-color: hsl(22, 87%, 48%);">favorite_border</i></a>';

                  }
                }
                else{

                  $id_usuario = "";
                  $link_avaliar = "./view.php";
                  $IsFavorite = "./view.php";
                  $favorito = '<a href = "./view.php" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light  " ><i class="material-icons" style = "background-color: hsl(22, 87%, 48%);">favorite_border</i></a>';
                  
                }

                echo '<div  class="item">';
                echo'  <div class="card hoverable  imgTitle">';
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
                echo'      <span class="card-title activator grey-text text-darken-4 "><a href= "'.$link_avaliar.'"><strong style = "color: white" >Avaliação: '.$nota.'</strong></a></span>';
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

            }
          ?>
        </div>
          <div class="MS-controls" >
              <button class="MS-left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
              <button class="MS-right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
          </div>
      </div>

      <br><br><br>

      <!--Ficção Ciêntífica-------------------------------------------------------------------->
      <div id = "ficcao">
      <center><h4  class = "titleCarousel" style = "color: #512da8">Ficção Ciêntífica</h4></center>
        <div class="MS-content">
          <?php
            $busca = $user->listarFilmesFiccao();
            $lista = $busca->fetchAll();
            if($lista > 1)
            {

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

                    $favorito = '<a href = "../controllers/userController.php?action=2&idFilme='.$id_filme.'&idUser='.$id_usuario.'" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light blue"><i class="material-icons" style = "background-color: #512da8">favorite</i></a>';
                    
                  }
                  else{

                    $favorito = '<a href = "../controllers/userController.php?action=1&idFilme='.$id_filme.'&idUser='.$id_usuario.'" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light blue"><i class="material-icons" style = "background-color: #512da8">favorite_border</i></a>';

                  }
                }
                else{

                  $id_usuario = "";
                  $link_avaliar = "./view.php";
                  $IsFavorite = "./view.php";
                  $favorito = '<a href = "./view.php" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light blue "><i class="material-icons" style = "background-color: #512da8">favorite_border</i></a>';
                  
                }

                echo '<div  class="item">';
                echo'  <div class="card hoverable  imgTitle">';
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
                echo'      <span class="card-title activator grey-text text-darken-4 "><a href= "'.$link_avaliar.'"><strong style = "color:white" >Avaliação: '.$nota.'</strong></a></span>';
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

            }
          ?>
        </div>
          <div class="MS-controls">
              <button class="MS-left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
              <button class="MS-right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
          </div>
      </div>

      <br><br><br>

      <!--Romance-------------------------------------------------------------------->
      <div id = "romance">
      <center><h4  class = "titleCarousel" style = "color: #ff4081">Romance</h4></center>
        <div class="MS-content">
          <?php
            $busca = $user->listarFilmesRomance();
            $lista = $busca->fetchAll();
            if($lista > 1)
            {

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

                    $favorito = '<a href = "../controllers/userController.php?action=2&idFilme='.$id_filme.'&idUser='.$id_usuario.'" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light blue"><i class="material-icons" style = "background-color: #ff4081">favorite</i></a>';
                    
                  }
                  else{

                    $favorito = '<a href = "../controllers/userController.php?action=1&idFilme='.$id_filme.'&idUser='.$id_usuario.'" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light blue"><i class="material-icons" style = "background-color: #ff4081">favorite_border</i></a>';

                  }
                }
                else{

                  $id_usuario = "";
                  $link_avaliar = "./view.php";
                  $IsFavorite = "./view.php";
                  $favorito = '<a href = "./view.php" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light  "><i class="material-icons" style = "background-color: #ff4081">favorite_border</i></a>';
                  
                }

                echo '<div  class="item">';
                echo'  <div class="card hoverable  imgTitle">';
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
                echo'      <span class="card-title activator grey-text text-darken-4 "><a href= "'.$link_avaliar.'"><strong style = "color: white" >Avaliação: '.$nota.'</strong></a></span>';
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

            }
          ?>
        </div>
          <div class="MS-controls">
              <button class="MS-left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
              <button class="MS-right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
          </div>
      </div>

      <br><br><br>

      <!--Terror-------------------------------------------------------------------->
      <div id = "terror">
      <center><h4  class = "titleCarousel" style = "color: #e53935">Terror</h4></center>
        <div class="MS-content">
          <?php
            $busca = $user->listarFilmesTerror();
            $lista = $busca->fetchAll();
            if($lista > 1)
            {

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

                    $favorito = '<a href = "../controllers/userController.php?action=2&idFilme='.$id_filme.'&idUser='.$id_usuario.'" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light blue"><i class="material-icons" style = "background-color: #e53935">favorite</i></a>';
                    
                  }
                  else{

                    $favorito = '<a href = "../controllers/userController.php?action=1&idFilme='.$id_filme.'&idUser='.$id_usuario.'" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light "><i class="material-icons" style = "background-color: #e53935">favorite_border</i></a>';

                  }
                }
                else{

                  $id_usuario = "";
                  $link_avaliar = "./view.php";
                  $IsFavorite = "./view.php";
                  $favorito = '<a href = "./view.php" style = "top: 5px;" class="btn-floating halfway-fab waves-effect waves-light  "><i class="material-icons" style = "background-color: #e53935">favorite_border</i></a>';
                  
                }

                echo '<div  class="item">';
                echo'  <div class="card hoverable  imgTitle">';
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
                echo'      <span class="card-title activator grey-text text-darken-4 "><a href= "'.$link_avaliar.'" ><strong style = "color: white">Avaliação: '.$nota.'</strong></a></span>';
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

            }
          ?>
        </div>
          <div class="MS-controls">
              <button class="MS-left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
              <button class="MS-right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
          </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> 
    <script src="../js/multislider.js"></script> 
    <script type="text/javascript">
      $(document).ready(function(){
        //jquery for toggle sub menus
        $('.sub-btn').click(function(){
          $(this).next('.sub-menu').slideToggle();
          $(this).find('.dropdown').toggleClass('rotate');
        });

        $('#recent').multislider({
          duration: 750,
          interval: 3100
        });

        $('#acao').multislider({
          duration: 750,
          interval: 3000
        });

        $('#comedia').multislider({
          duration: 750,
          interval: 2900
        });

        $('#ficcao').multislider({
          duration: 750,
          interval: 2800
        });

        $('#romance').multislider({
          duration: 750,
          interval: 2700
        });

        $('#terror').multislider({
          duration: 750,
          interval: 2600
        });

      });


      var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
    </script>
  </body>
</html>