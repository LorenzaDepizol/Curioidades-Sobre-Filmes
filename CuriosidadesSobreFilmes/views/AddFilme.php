<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title>Cadastro</title>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<link rel='stylesheet' type='text/css' media='screen' href='../css/admin.css'>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Cabin+Sketch&family=Mate+SC&family=Pangolin&display=swap" rel="stylesheet">
		<!-- <script src='../js/validar_admin.js'></script> -->
	</head>
	<body onload="onLoad()">			
	
		<div id = "form_add-filme">
			<form action =  "../controllers/filmesController.php" method="POST">
				<br>
        <h1>FILMES</h1>
        <br><br>
				<input type = "hidden" value = "1" name = "action"/>
        <strong>Titulo:</strongi><br> <input type="text" size="35" maxlength="256" name="titulo" autocomplete="off" required>
        <br><br>
        <strong>Descrição:</strong><br>
        <textarea rows="25" cols="100" autocomplete="off" name = "descricao"  required  maxlength="1000"  ></textarea>
        <br><br>
        </br><br>
				<strong>Classificação Indicativa:</strong><br>
        <select name = "classindic">
          <option value="0">Livre</option>
          <option value="10">10 anos</option>
          <option value="12">12 Anos</option>
          <option value="14">14 Anos</option>
          <option value="16">16 Anos</option>
          <option value="18">18 Anos</option>
        </select> 
        </br><br>
        <strong>Data de Lançamento:</strong><br> <input type="date" name="data_lanc" required>
				<br><br>
        <strong>Diretor:</strong><br> <input type="text" name="diretor"  autocomplete="off" required>   
        </br><br>
        <strong>Genero:</strong><br>
        <select name = "genero">
          <option value="1">Ação</option>
          <option value="2">Romance</option>
          <option value="3">Comédia</option>
          <option value="4">Terror</option>
          <option value="5">Ficção Científica</option>
        </select>
        <br><br>
        <strong>Link do poster:</strong><br> <input type="text" size="35" maxlength="300" name="link" autocomplete="off" required>
        <br><br>
				<input type = "submit" class = "login_btn">
			</form>

		</div>


			
	</body>
</html>