

function onLoad(){

  // document.getElementById("filmesTable").style.display = "none";
  document.getElementById("usuariosTable").style.display = "none";


}

function aparecer_filmes(){

  document.getElementById("filmesTable").style.display = "block";
  document.getElementById("usuariosTable").style.display = "none";
 

}

function aparecer_usuarios(){

  
  document.getElementById("usuariosTable").style.display = "block";
  document.getElementById("filmesTable").style.display = "none";

}




 

 function lookedin(){

    window.location = "../admin/admin_form.html";


 }
 
 function goToHome(){

  window.location = "../views/index.php";


}

function Sair(){

  window.location = "../Sair.php";


}




