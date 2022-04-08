<!DOCTYPE html>
<html>
<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title>Admin</title>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<!-- <link rel='stylesheet' type='text/css' media='screen' href='../css/admin.css'> -->
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
		
    <!-- <script src='../js/controleVagas.js'></script> -->

	</head>
	<body >

		<?php
      session_start();
      include "../controllers/filmesController.php";
      $listaInfo = new FilmesController();
      if(!isset($_SESSION["Email"])){

        echo "<script type='text/javascript'>
        alert('Sessão expirada, faça login novamente');
        window.location.href = './login.php';
        </script>";


      }
      $id = $_GET["id"];
      $busca = $listaInfo->listarInfoFilme($id);
      $lista = $busca->fetch();

    ?>

    


  <div>
			<form action =  "../controllers/filmesController.php" method="POST">
				<br>
        <h1>Alterar Informações</h1>
        <br><br>
        <input type = "hidden" value = "2" name = "action"/>
        <input type = "hidden" value = "<?php echo $lista["idFilme"]; ?>" name = "id"/>
        <i>Titulo:</i><br> <input type="text" size="35" maxlength="256" value = "<?php echo $lista["TituloFilme"]; ?>" name="titulo" autocomplete="off" required autofocus>
        <br><br>
        <i>Descrição:</i><br>
        <textarea rows="25" cols="100" autocomplete="off" name = "descricao"  required  maxlength="1000"  ><?php echo $lista["DescricaoFilme"]; ?></textarea>
        <br><br>
        <i>Classificação Indicativa:</i><br>
        <select name = "classindic">
          <option value="<?php echo $lista["ClassIndicativa"]; ?>"><?php echo $lista["ClassIndicativa"]; ?></option>  
          <option value="0">Livre</option>
          <option value="10">10 anos</option>
          <option value="12">12 Anos</option>
          <option value="14">14 Anos</option>
          <option value="16">16 Anos</option>
          <option value="18">18 Anos</option>
        </select> 
        </br><br>
        <i>Data de Lançamento:</i><br> <input type="date" name="data_lanc" value = "<?php echo $lista["DataLancamento"]; ?>" required>
				<br><br>
        <i>Diretor:</i><br> <input type="text" name="diretor" value = "<?php echo $lista["Diretor"]; ?>" autocomplete="off" required>   
        </br><br>
        <i>Genero:</i><br>
        <select name = "genero">
          <option value="<?php echo $lista["Genero"]; ?>"><?php echo $lista["Genero"]; ?></option>
          <option value="1">Ação</option>
          <option value="2">Romance</option>
          <option value="3">Comédia</option>
          <option value="4">Terror</option>
          <option value="5">Ficção Científica</option>
        </select>
        <br><br>
        <i>Link do poster</i><br> <input type="text" size="35" maxlength="300" value = "<?php echo $lista["Poster"]; ?>" name="link" autocomplete="off" required>
        <br><br>
				<input type = "submit">
			</form>
		</div>

		    

	</body>
</html>