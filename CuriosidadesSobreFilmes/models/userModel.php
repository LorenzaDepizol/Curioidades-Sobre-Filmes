<?php

  include "../conexao.php";
  class User{

    private $username;
    private $email;
    private $senha;
    private $status;

    public function setNome($nome){

      $this->nome = $nome;


    }
    public function getNome(){

      return $this->nome;

    }

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

    public function setStatus($status){

      $this->status = $status;


    }
    public function getStatus(){

      return $this->status;

    }
    public function setAvaliacao($avaliacao){

      $this->avaliacao = $avaliacao;


    }
    public function getAvaliacao(){

      return $this->avaliacao;

    }

    public function setComentario($comentario){

      $this->comentario = $comentario;


    }
    public function getComentario(){

      return $this->comentario;

    }

    public function cadastrar(){

      $con = new Conexao();
      $con->conectar();
      $sql = "INSERT INTO usuario(Nome, Email, Senha, StatusUser) VALUES('".$this->getNome()."', '".$this->getEmail()."', '".$this->getSenha()."', '".$this->getStatus()."')";
      if($con->executaSQL($sql))
      {

        return true;

      }
      else{

        return false;

      }



    }

    public function validar($email, $senha){

      $con = new Conexao();
      $con->conectar();
      $sql = "SELECT Email, Senha FROM usuario WHERE Email = '$email' and Senha = '$senha' ";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);



    }

    public function avaliar($idFilme, $idUser){

      $con = new Conexao();
      $con->conectar();
      $sql = "INSERT INTO avaliacoes(Avaliacao, ComentarioAvaliacao, idFilme, ID) 
      VALUES('".$this->getAvaliacao()."', '".$this->getComentario()."', '$idFilme', '$idUser')";
      // echo $sql;
      // die();
     if($con->executaSQL($sql))
      {

        return true;

      }
      else{

        return false;

      }



    }

    public function AddFilmeFavorito($id_filme, $id){

      $con = new Conexao();
      $con->conectar();
      $sql = "INSERT INTO favoritos(idFilme, ID) 
      VALUES('$id_filme', '$id')";
      // echo $sql;
      // die();
     if($con->executaSQL($sql))
      {

        return true;

      }
      else{

        return false;

      }


    }

    public function listarFilmes(){
      $con = new Conexao();
      $con->conectar();
      // echo $email;
      // die();
      $sql = "SELECT idFilme, TituloFilme, DescricaoFilme, ClassIndicativa, DataLancamento, Diretor, Genero, Poster FROM filmes WHERE 1 ORDER BY idFilme DESC";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);


    }


    public function listarInfoFilme($id_filme){
      $con = new Conexao();
      $con->conectar();
      // echo $email;
      // die();
      $sql = "SELECT idFilme, TituloFilme, DescricaoFilme, ClassIndicativa, DataLancamento, Diretor, Genero, Poster FROM filmes WHERE idFilme = '$id_filme'";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);


    }



    public function listarAvaliacoes($idFilme){
      $con = new Conexao();
      $con->conectar();
      $sql = "SELECT  avaliacoes.ComentarioAvaliacao, avaliacoes.idFilme, avaliacoes.ID, usuario.Nome FROM  avaliacoes,  usuario WHERE avaliacoes.idFilme = '$idFilme' and usuario.ID = avaliacoes.ID ";
      // echo $sql;
      // die();

      //SELECT AVG(avaliacoes.Avaliacao) as nota,
      return $con->executaBusca($sql);


    }

    
    public function RemoverFilmeFavorito($id_filme, $id_usuario){
      $con = new Conexao();
      $con->conectar();
      $sql = "DELETE FROM favoritos  WHERE idFilme = '$id_filme' and ID = '$id_usuario' ";
      // echo $sql;
      // die();

      if($con->executaBusca($sql)){

        return true;

      }
      else{

        return false;

      }


    }

    public function listarFilmesFavoritos($id_usuario){
      $con = new Conexao();
      $con->conectar();
      $sql = "SELECT  favoritos.idFilme, favoritos.ID, filmes.idFilme, filmes.TituloFilme, filmes.DescricaoFilme, filmes.ClassIndicativa, filmes.DataLancamento, filmes.Diretor, filmes.Genero, filmes.Poster FROM  favoritos, filmes WHERE favoritos.ID = '$id_usuario' and favoritos.idFilme = filmes.idFilme";
      // echo $sql;
      // die();

      //$sql = "SELECT idFilme, TituloFilme, DescricaoFilme, ClassIndicativa, DataLancamento, Diretor, Genero, Poster FROM filmes WHERE idFilme = '$id_filme'";
      return $con->executaBusca($sql);


    }

    public function IsFavorite($id_filme, $id_usuario){
      $con = new Conexao();
      $con->conectar();
      $sql = "SELECT  idFilme, ID FROM  favoritos WHERE ID = '$id_usuario' and idFilme = '$id_filme'";
      // echo $sql;
      // die();

      //$sql = "SELECT idFilme, TituloFilme, DescricaoFilme, ClassIndicativa, DataLancamento, Diretor, Genero, Poster FROM filmes WHERE idFilme = '$id_filme'";
      return $con->executaBusca($sql);


    }

    public function listarNota($idFilme){
      $con = new Conexao();
      $con->conectar();
      $sql = "SELECT AVG(Avaliacao) as nota FROM avaliacoes WHERE idFilme = '$idFilme' ";
      // echo $sql;
      // die();

      //SELECT AVG(avaliacoes.Avaliacao) as nota,
      return $con->executaBusca($sql);


    }

    public function RetornarId($email){
      $con = new Conexao();
      $con->conectar();
      // echo $email;
      // die();
      $sql = "SELECT ID FROM usuario WHERE Email = '$email' ";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);


    }

    
    public function VerificaAvaliacao($id, $id_filme){
      $con = new Conexao();
      $con->conectar();

      $sql = "SELECT ID, idFilme FROM avaliacoes WHERE ID = '$id' and idFilme = '$id_filme' ";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);


    }


    public function listarFilmesAcao(){
      $con = new Conexao();
      $con->conectar();
      // echo $email;
      // die();
      $sql = "SELECT idFilme, TituloFilme, DescricaoFilme, ClassIndicativa, DataLancamento, Diretor, Genero, Poster FROM filmes WHERE Genero = 1";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);


    }

    public function listarFilmesComedia(){
      $con = new Conexao();
      $con->conectar();
      // echo $email;
      // die();
      $sql = "SELECT idFilme, TituloFilme, DescricaoFilme, ClassIndicativa, DataLancamento, Diretor, Genero, Poster FROM filmes WHERE Genero = 3";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);


    }

    public function listarFilmesFiccao(){
      $con = new Conexao();
      $con->conectar();
      // echo $email;
      // die();
      $sql = "SELECT idFilme, TituloFilme, DescricaoFilme, ClassIndicativa, DataLancamento, Diretor, Genero, Poster FROM filmes WHERE Genero = 5";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);


    }

    public function listarFilmesRomance(){
      $con = new Conexao();
      $con->conectar();
      // echo $email;
      // die();
      $sql = "SELECT idFilme, TituloFilme, DescricaoFilme, ClassIndicativa, DataLancamento, Diretor, Genero, Poster FROM filmes WHERE Genero = 2";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);


    }

    public function listarFilmesTerror(){
      $con = new Conexao();
      $con->conectar();
      // echo $email;
      // die();
      $sql = "SELECT idFilme, TituloFilme, DescricaoFilme, ClassIndicativa, DataLancamento, Diretor, Genero, Poster FROM filmes WHERE Genero = 4";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);


    }





    public function EditarDados($id){
      $con = new Conexao();
      $con->conectar();
      $sql = "UPDATE usuario SET Nome='".$this->getNome()."',
               Senha='".$this->getSenha()."' WHERE ID = '".$id."'";
      // echo $sql;
      // die();
      return $con->executaSql($sql);
  }

    public function listarInfo($email){
      $con = new Conexao();
      $con->conectar();
      // echo $email;
      // die();
      $sql = "SELECT ID, Nome, Email, Senha, Senha, StatusUser FROM usuario WHERE Email = '$email'";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);


    }

}

?>

