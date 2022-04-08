
var admin = false;


function lookedin(){

  window.location = "../views/admin_form.html";


}


function onLoad(){

  validarAdmin();
  if(admin == true){

    document.getElementById("form").style.display = "block";

  }
  else if(admin == false){

    document.getElementById("form").style.display = "none";
    alert("DONT TRY TO LOG IN THE SYSTEM ANYMORE ");
    window.location = "../views/view.php";

  }
  else{
    document.getElementById("form").style.display = "none";
    alert("DONT TRY TO LOG IN THE SYSTEM ANYMORE ");
    window.location = "../views/view.php";



  }



}


 

 function validarAdmin(){

  validation = prompt("Please type your credencials, and if you're not a  e3afed0047b08059d0fada10f400c1e5 get out");

  if(validation == "qkaqg.rjsrcs11@hotmail.com" || validation == "yily.isxim9@hotmail.com" || validation == "sqcbnqyg.ndgqs13@hotmail.com" || validation == "pendpmrlhtfxkcm15@hotmail.com")
  {

     admin = true;

  }
  else 
  {

    admin = false;

  }


 }



