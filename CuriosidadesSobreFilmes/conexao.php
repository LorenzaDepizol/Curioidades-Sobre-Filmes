

<?php

class Conexao
{


  private $usuario = "root";
  private $senha = "";
  private $dsn = "mysql:host=localhost;dbname=curiosidades";

  public function conectar()
  {

    
    try
    {

      //Variavel que faz a conexão PDO com o banco de dados

      $this->conexao = new PDO($this->dsn, $this->usuario, $this->senha);
      

    }

    //Comando que pega a mensagem de erro, caso a tentativa não de certo
    catch(PDOException $e)
    {

      echo "Erro: " .$e->getCode(). " <br> Mensagem: ".$e->getMessage();

    }

  }

  public function executaSQL($sql)
  {

    if($this->conexao -> exec($sql))
    {

      return true;

    }
    else
    {

      return false;

    }

  }

  public function executaBusca($sql){

    return $this->conexao -> query($sql);

  }


}





?>