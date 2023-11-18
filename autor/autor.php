<?php

include_once '../../conectar.php';

//parte 1 - atributos

class Autor
{
    private $Cod_A;
    private $Nome_A;
    private $Sobr;
    private $email;
    private $dt_nasc;
    private $conn;

    //parte 2 - os gettes e setter

    public function getCod_A() {
        return $this -> Cod_A;
    }

    public function setCod_A($Cod_Aut) {
        $this -> Cod_A = $Cod_Aut;
    }

    public function getNome_A() {
        return $this -> Nome_A;
    }

    public function setNome_A($Nome_Aut) {
        $this -> Nome_A = $Nome_Aut;
    }

    public function getSobr() {
        return $this -> Sobr;
    }
    public function setSobr($sobrenome) {
        $this -> Sobr = $sobrenome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($mail) {
        $this->email = $mail;
    }

    public function getdt_nasc() {
        return $this->dt_nasc;
    }

    public function setdt_nasc($dt_nasci) {
        $this->dt_nasc = $dt_nasci;
    }

    //parte 3 - métodos

    function exclusao ()
    {
        try
        {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("delete from autor where Cod_Autor = ?"); // informei o ? (parametro)
            @$sql-> bindParam(1, $this->getCod_A(), PDO:: PARAM_STR); // inclui esta linha para definix o parametro
            if ($sql->execute() == 1)
            {
            return "Excluído com sucesso!";
            }
            else
            {
            return "Erro na exclusão !";
            }

            $this->conn = null;
        }
        catch (PDOException $exc)
        {
        echo "Erro ao excluir" . $exc->getMessage();
        }
    }

    function salvar()
    {
        try
        {
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("insert into autor values (null,?,?,?,?)");
            @$sql-> bindParam(1, $this->getNome_A(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getSobr(), PDO::PARAM_STR);
            @$sql-> bindParam(3, $this->getEmail(), PDO::PARAM_STR);
            @$sql-> bindParam(4, $this->getdt_nasc(), PDO::PARAM_STR);
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

    function listar()
    {
        try
        {
            $this -> conn = new Conectar;
            $sql = $this->conn->query("select * from autor order by Cod_Autor");
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        }
        catch (PDOException $exc)
        {
            echo "Erro ao executar consulta. " . $exc -> getMessage();
        }
    }

    function consultar()
    {
        try
        {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare ("select * from autor where NomeAutor like ?"); // informei o ?
            @$sql-> bindParam(1, $this->getNome_A(), PDO:: PARAM_STR); // inclui eata linha para definir o parametro
            // @$sql-> bindParam(1, $this->getNome()."%", PDO:: PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        }
        catch (PDOException $exc)
        {
        echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }

    function alterar ()
    {
        try
        {
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("select * from autor where Cod_Autor = ?"); // informed o ? (parametro)
            @$sql-> bindParam(1, $this->getCod_A(), PDO::PARAM_STR); // inclui sata linha para definir o parametro
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        }
        catch (PDOException $exc)
        {
            echo "Erro ao alterar. " . $exc->getMessage();
        }
    }

    function alterar2()
    {
        try
        {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare ("update autor set NomeAutor = ?, Sobrenome = ?, Email = ?, Nasc = ? where Cod_Autor = ?");
            @$sql-> bindParam(1, $this->getNome_A(), PDO:: PARAM_STR);
            @$sql-> bindParam(2, $this->getSobr(), PDO:: PARAM_STR);
            @$sql-> bindParam(3, $this->getEmail(), PDO:: PARAM_STR);
	        @$sql-> bindParam(4, $this->getdt_nasc(), PDO:: PARAM_STR);
	        @$sql-> bindParam(5, $this->getCod_A(), PDO:: PARAM_STR);
            if ($sql->execute() == 1)
            {
            return "Registro alterado com sucesso!";
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