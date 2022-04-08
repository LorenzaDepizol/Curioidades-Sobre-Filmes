<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title>Admin</title>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<link rel='stylesheet' type='text/css' media='screen' href='../css/admin.css'>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
		<script src='../js/admin.js'></script>
    <!-- <script src='../js/controleVagas.js'></script> -->

	</head>
	<body onload = "onLoad()">

    <?php 
      session_start();
      if(isset($_POST["id_filme"])){

        $id_filme = $_POST["id_filme"];
        $alter_data_movie_route = "./AlterarDadosFilme.php?id=".$id_filme;
        $delete_data_movie_route = "../controllers/filmesController.php?action=3&id=".$id_filme;



      }
      else{

        $alter_data_movie_route = "#";
        $delete_data_movie_route = "#";

      }
      // if(!isset($_SESSION["Email"])){

      //   echo "<script type='text/javascript'>
      //   alert('Sessão expirada, faça login novamente');
      //   window.location.href = './login.php';
      //   </script>";


      // }
      // else{

      //   $email = $_SESSION["Email"];
      //   $conta = $_SESSION["Conta"];

      // }
  
    ?>
    <div class = "menu">

  

      <ul>
      <center>
        <button onclick = "goToHome()"><li>Acessar a home</li></button>
        <button onclick = "aparecer_usuarios()"><li>Usuarios</li></button>
        <button onclick = "aparecer_filmes()"><li>Filmes</li></button>
        <button onclick = "Sair()"><li>Sair</li></button>
      </center>

      </ul>

    </div>
   
      <table id = "filmesTable">
        <tr>
          <td colspan="8"><h1 style = "color: #19B3D3">Filmes</h1></td>
        </tr>
        <tr class = "headerTable">
          <td></td>
          <td>Id</td>
          <td>Titulo</td>
          <td>Descricao</td>
          <td>Classicação Indicativa</td>
          <td>Data de Lançamento</td>
          <td>Diretor</td>
          <td>Genero</td>
        </tr>
          <?php
            include ("../controllers/adminController.php");
            $admin = new Admin();
            $busca = $admin->listarFilmes();
            $lista = $busca->fetchAll();
            if($lista > 1)
            {

                // $num_registros = $admin->RetornarNumeroFilmes();
                // $lista_registros = $num_registros->fetch();
                // if($lista_registros > 0){
                //   $registros = $lista_registros["COUNT(idFilme)"];
                //   if(isset($_POST["id_filme"])){

                //       for($cont = 1; $cont <= $registros; $cont++){

                //           $id_filme =   

                //       }
                //       $alter_data_movie_route = "./AlterarDadosFilme.php?id="

                //   }

                // }
              // $year = date("Y");
              foreach($lista as $key => $value)
              {

                
                $date = date("Y/m/d");
                echo "<tr class = 'results'>";
                echo "<td><form action = './painelAdmin.php' method = 'POST'><input type =  'checkbox' name = 'id_filme' value = '".$value["idFilme"]."'></td>";
                echo "<td>".$value["idFilme"]."</td>";
                echo "<td>".$value["TituloFilme"]."</td>";
                echo "<td>".$value["DescricaoFilme"]."</td>";
                if($value["ClassIndicativa"] == 0){

                  echo "<td>Livre</td>";

                }
                else{

                  echo "<td>".$value["ClassIndicativa"]." anos</td>";

                }
                echo "<td>". date("d/m/Y", strtotime($value["DataLancamento"]))."</td>";
                echo "<td>".$value["Diretor"]."</td>";
                $genero = $value["Genero"];
                if($genero == 1){

                  echo "<td>Ação</td>";

                }
                else if($genero == 2){

                  echo "<td>Romance</td>";

                }
                else if($genero == 3){

                  echo "<td>Comedia</td>";

                }
                else if($genero == 4){

                  echo "<td>Terror</td>";

                }
                else if($genero == 5){

                  echo "<td>Ficção Ciêntífica</td>";

                }

  
            
              }
              echo "</tr>";
              echo "<tr>";
              echo "<td colspan = '4'></td>";
              echo "<td><input class = 'select-button' type = 'submit' value = 'Selecionar'></form></td>";  
              echo "<td><a class = 'add-button' href = './AddFilme.php'>Adicionar</a></td>";  
              echo "<td><a class = 'alter-button' href = '".$alter_data_movie_route."'>Alterar</a></td>";
              echo "<td><a class = 'delete-button' href = '".$delete_data_movie_route."'>Excluir</a></td>";
              echo "</tr>";

            }
          ?>

     
      </table>
      <table id = "usuariosTable">
        <tr>
          <td colspan="4"><h1 style = "color: #19B3D3">Usuarios</h1></td>
        </tr>
        <tr class = "headerTable">
          <td>Id</td>
          <td>Nome</td>
          <td>Email</td>
          <td>Status</td>
        </tr>
          <?php
            $admin = new Admin();
            $busca = $admin->listarUsuarios();
            $lista = $busca->fetchAll();
            if($lista > 1)
            {

              // $year = date("Y");
              foreach($lista as $key => $value)
              {

                echo "<tr class = 'results'>";
                echo "<td>".$value["ID"]."</td>";
                echo "<td>".$value["Nome"]."</td>";
                echo "<td>".$value["Email"]."</td>";
                $ativo = $value["StatusUser"];
                if($ativo == true){

                  echo "<td>Ativo</td>";

                }
                else{

                  echo "<td>Inativo</td>";

                }
                echo "</tr>";

               
                // $idade = $year - $value["YEAR(DataNascimento)"];
                // echo "<td>".$idade." anos</td>";
            
              }

            }
          ?>
          <tr>
            <td colspan = "3"></td>
            <td><a href = "#">Desativar</a></td>  
          </tr>


     
      </table>
  

    
	
			
	</body>
</html>