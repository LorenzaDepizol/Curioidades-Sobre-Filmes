<?php

  include "../conexao.php";
  class Admin{

    
    private $email;
    private $senha;
    



    public function setEmail($email){

      $this->email = $email;


    }
    public function getEmail(){

      return $this->email;

    }

    public function setSenha($senha){

      $this->senha = $senha;


    }
    public function getSenha(){

      return $this->senha;

    }

     

     //O ideal do sistema é que não haja a possibilidade de cadastrar administradores
    // public function cadastrar(){

    //   $con = new Conexao();
    //   $con->conectar();
    //   $sql = "INSERT INTO admin(EmailAdmin, SenhaAdmin) VALUES('".$this->getEmail()."', '".$this->getSenha()."')";
    //   if($con->executaSQL($sql))
    //   {

    //     return true;

    //   }
    //   else{

    //     return false;

    //   }



    // }

    public function validar($email, $senha){

      $con = new Conexao();
      $con->conectar();
      $sql = "SELECT EmailAdmin, SenhaAdmin FROM admin WHERE EmailAdmin = '$email' and SenhaAdmin = '$senha' ";
      return $con->executaBusca($sql);
      echo $sql;
      die();
      



    }

    public function listarFilmes(){
      $con = new Conexao();
      $con->conectar();
      // echo $email;
      // die();
      $sql = "SELECT idFilme, TituloFilme, DescricaoFilme, ClassIndicativa, DataLancamento, Diretor, Genero FROM filmes WHERE 1";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);


    }

    // public function RetornarNumeroFilmes(){
    //   $con = new Conexao();
    //   $con->conectar();
    //   // echo $email;
    //   // die();
    //   $sql = "SELECT COUNT(idFilme) FROM filmes WHERE 1";
    //   // echo $sql;
    //   // die();
    //   return $con->executaBusca($sql);


    // }


    public function listarUsuarios(){
      $con = new Conexao();
      $con->conectar();
      // echo $email;
      // die();
      $sql = "SELECT ID, Nome, Email, StatusUser FROM usuario WHERE 1";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);


    }



}

?>

