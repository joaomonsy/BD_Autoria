<?php

include_once '../conectar.php';

//parte 1 - atributos

class Usuario
{
    private $usu;
    private $senha;
    private $conn;

    //parte 2 - os gettes e setter

    public function getUsu() {
        return $this -> usu;
    }

    public function setUsu($usuario) {
        $this -> usu = $usuario;
    }

    public function getSenha() {
        return $this -> senha;
    }

    public function setSenha($sen) {
        $this -> senha = $sen;
    }

    function logar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("SELECT * from usuario WHERE Login LIKE ? and senha = ?");
            @$sql-> bindParam(1, $this->getUsu(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getSenha(), PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "<span class='text-green-200'>Erro ao executar consulta. </span>" . $exc->getMessage();
        }
    }

    function salvar()
    {
        try
        {
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("insert into usuario values (?,?)");
            @$sql-> bindParam(1, $this->getUsu(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getSenha(), PDO::PARAM_STR);
            if ($sql->execute() == 1)
            {
                return "Cadastro realizado!" ;
            }
            $this->conn = null;
        }
        catch (PDOException $exc)
        {
            echo "Erro ao salvar o registro. " . $exc->getMessage();
        }
    }
}
?>