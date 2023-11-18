<?php

include_once '../../conectar.php';

//parte 1 - atributos

class Autoria
{
    private $Cod_Autoria;
    private $Cod_A;
    private $Cod_L;
    private $dt_lanc;
    private $edit;
    private $conn;

    //parte 2 - os gettes e setter

    public function getCod_Autoria() {
        return $this -> Cod_Autoria;
    }

    public function setCod_Autoria($Cod_Autoriaa) {
        $this -> Cod_Autoria = $Cod_Autoriaa;
    }

    public function getCod_A() {
        return $this -> Cod_A;
    }

    public function setCod_A($Cod_Aut) {
        $this -> Cod_A = $Cod_Aut;
    }

    public function getCod_L() {
        return $this -> Cod_L;
    }

    public function setCod_L($Cod_Liv) {
        $this -> Cod_L = $Cod_Liv;
    }

    public function getDt_lanc() {
        return $this -> dt_lanc;
    }
    public function setDt_lanc($dt_lancamento) {
        $this -> dt_lanc = $dt_lancamento;
    }

    public function getEdit() {
        return $this -> edit;
    }
    public function setEdit($editora) {
        $this -> edit = $editora;
    }

    //parte 3 - métodos

    function exclusao ()
    {
        try
        {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("delete from autoria where Cod_Autoria = ?"); // informei o ? (parametro)
            @$sql-> bindParam(1, $this->getCod_Autoria(), PDO:: PARAM_STR); // inclui esta linha para definix o parametro
            if ($sql->execute() == 1)
            {
            return "Excluido com sucesso!";
            }
            else
            {
            return "Erro na exclusao !";
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
            $sql = $this->conn->prepare("insert into autoria values (null,?,?,?,?)");
            @$sql-> bindParam(1, $this->getCod_A(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getCod_L(), PDO::PARAM_STR);
            @$sql-> bindParam(3, $this->getDt_lanc(), PDO::PARAM_STR);
            @$sql-> bindParam(4, $this->getEdit(), PDO::PARAM_STR);
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
            $sql = $this->conn->query("select * from autoria order by Cod_Autoria");
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
            $sql = $this->conn->prepare ("select * from autoria where cod_Autoria like ?");
            @$sql-> bindParam(1, $this->getCod_Autoria(), PDO:: PARAM_STR);
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

    function alterar()
    {
        try
        {
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("select * from autoria where Cod_Autoria = ?"); // informed o ? (parametro)
            @$sql-> bindParam(1, $this->getCod_Autoria(), PDO::PARAM_STR); // inclui sata linha para definir o parametro
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
            $sql = $this->conn->prepare ("update autoria set Cod_Autor = ?, Cod_livro = ?, DataLancamento = ?, Editora = ? where Cod_Autoria = ?");
            @$sql-> bindParam(1, $this->getCod_A(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getCod_L(), PDO::PARAM_STR);
            @$sql-> bindParam(3, $this->getDt_lanc(), PDO::PARAM_STR);
            @$sql-> bindParam(4, $this->getEdit(), PDO::PARAM_STR);
            @$sql-> bindParam(5, $this->getCod_Autoria(), PDO::PARAM_STR);
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