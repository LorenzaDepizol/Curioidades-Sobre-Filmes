<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FILMES</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../css/style.css">
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"> -->
    <link rel="stylesheet" href="../css/carousel.css">
   
    

    <style>
      body{

        color: #fff;

      }

    </style>
  </head>
  <body>
    
      <?php

        session_start();
        $id_filme = $_GET["idFilme"];
        $id = $_GET["idUser"];
        $HasEvaluate = false;
        $soma_nota = 0;
        include ("../controllers/userController.php");
        $user = new User();
        $Evaluate = $user->VerificaAvaliacao($id, $id_filme);
        $Search = $Evaluate->fetch();
        if($Search > 0){

          $HasEvaluate = true;
          

        }

        if($HasEvaluate){

          $button_evaluate = '<span type="submit" class="btn btn-secondary" disable>Você já votou</span>';

        }
        else{

            $button_evaluate = '<button type="submit" class="btn btn-primary">Enviar avaliação</button>';

        }

        $busca = $user->listarInfoFilme($id_filme);
        $lista = $busca->fetch();
        if($lista > 1)
        {
            
          $link = $lista["Poster"];
          $gen = $lista["Genero"];
          $diretor = $lista["Diretor"];
          $lancamento = $lista["DataLancamento"];
          $classIndicativa = $lista["ClassIndicativa"];
          $descricao = $lista["DescricaoFilme"];
          $titulo = $lista["TituloFilme"];

        }


        echo '<div class = "container">';
        echo "<img class = 'imgFilme' src = '".$link."'>";
        echo "<h1 class = 'tituloFilme' >".$titulo."</h1><br>";
        echo "<p class = 'descricaoFilme' style = 'display: inline-block;'>".$descricao."</p><br>";
        echo "<h5 style = 'display: inline-block;'>".$gen."</h5><br>";
        echo "<h5 style = 'display: inline-block;'>".$lancamento."</h5><br>";
        echo "<h5 style = 'display: inline-block;'>".$diretor."</h5><br>";
        echo "<h5 style = 'display: inline-block;'>".$classIndicativa."</h5>";
        $busca_nota = $user->listarNota($id_filme);
        $Search_nota = $busca_nota->fetch();
        if($Search_nota > 1){

          $nota = $Search_nota["nota"];

        }
        echo '<h3 >Nota: '.$nota.'</h3><button class = "btn btn-primary" data-toggle="modal" data-target="#modalExemplo">Avaliar</button>';
        echo '<br><br>';
        echo '  <h3>Comentarios</h3>';

        $avaliacoes = $user->listarAvaliacoes($id_filme);
        $Search_evaluates = $avaliacoes->fetchAll();
        if($Search_evaluates > 1){

          foreach($Search_evaluates as $key => $value){

            echo '<div class = "coments" >';
            $user = $value["Nome"];
            $comentario = $value["ComentarioAvaliacao"];
            if($comentario != null){


              

              echo '  <div class = "coment" >';
              echo '    <h6>De: '.$user.'</h6>';
  
              echo '    <p>'.$comentario.'</p>';
              echo '    <h6>01/06/2021</h6>';
              
              echo '  </div>';
             


            }
            echo '</div>';





          }


        }

      ?>
      

    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form action = "../controllers/userController.php" method = "POST">
            <div class="form-group">
              <label for="exampleFormControlInput1">Nota:</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name = "nota" placeholder="Digite a sua nota pro filme">
              <input type="hidden" value = "4" name = "action">
              <input type="hidden" value = "<?php  echo $id_filme  ?>" name = "idFilme">
              <input type="hidden" value = "<?php  echo $id  ?>" name = "idUser">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Comentario</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name = "coments" rows="3"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <?php echo $button_evaluate; ?>
          </div>
          </form>
          

        </div>
      </div>
    </div>
     

       
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  

	</body>
</html>