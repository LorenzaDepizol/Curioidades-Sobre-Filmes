<?php

  include "../conexao.php";
  class Filme{

    private $titulo;
    private $descricao;
    private $classIndic;
    private $data_lanc;
    private $diretor_filme;
    private $genero;

    public function setTitulo($titulo){

      $this->titulo = $titulo;


    }
    public function getTitulo(){

      return $this->titulo;

    }

    public function setDescricao($descricao){

      $this->descricao = $descricao;


    }
    public function getDescricao(){

      return $this->descricao;

    }

    public function setClassIndic($classIndic){

      $this->classIndic = $classIndic;


    }
    public function getClassIndic(){

      return $this->classIndic;

    }

    public function setData_lanc($data_lanc){

      $this->data_lanc = $data_lanc;


    }
    public function getData_lanc(){

      return $this->data_lanc;

    }

    
    public function setDiretor_filme($diretor_filme){

      $this->diretor_filme = $diretor_filme;


    }
    public function getDiretor_filme(){

      return $this->diretor_filme;

    }

    public function setGenero($genero){

      $this->genero = $genero;


    }
    public function getGenero(){

      return $this->genero;

    }

    
    public function setPoster($poster){

      $this->poster = $poster;


    }
    public function getPoster(){

      return $this->poster;

    }



    public function cadastrar(){

      $con = new Conexao();
      $con->conectar();
      $sql = "INSERT INTO filmes(TituloFilme, DescricaoFilme, ClassIndicativa, DataLancamento, Diretor, Genero, Poster) 
      VALUES('".$this->getTitulo()."', '".$this->getDescricao()."', '".$this->getClassIndic()."', '".$this->getData_lanc()."', '".$this->getDiretor_filme()."', '".$this->getGenero()."', '".$this->getPoster()."')";
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

   

    public function listarInfoFilme($id){
      $con = new Conexao();
      $con->conectar();
      // echo $email;
      // die();
      $sql = "SELECT idFilme, TituloFilme, DescricaoFilme, ClassIndicativa, DataLancamento, Diretor, Genero, Poster FROM filmes WHERE idFilme = '$id'";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);


    }

    public function EditarDados($id){
      $con = new Conexao();
      $con->conectar();
      $sql = "UPDATE filmes SET TituloFilme='".$this->getTitulo()."',
               DescricaoFilme='".$this->getDescricao()."', ClassIndicativa='".$this->getClassIndic()."', 
               DataLancamento='".$this->getData_lanc()."', Diretor='".$this->getDiretor_filme()."', 
               Genero='".$this->getGenero()."', Poster='".$this->getPoster()."' WHERE idFilme = '$id'";
      // echo $sql;
      // die();
      return $con->executaSql($sql);
  }

  public function ExcluirFilme($id){
    $con = new Conexao();
    $con->conectar();
    $sql = "DELETE FROM filmes WHERE idFilme = '$id'";
    // echo $sql;
    // die();
     if($con->executaSql($sql)){

      return true;

     }
     else{

      return false;

     }
}



}

?>

