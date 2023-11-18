<?php

include_once '../../conectar.php';

//parte 1 - atributos

class Livro 
{
    private $CodLivro;
    private $Titulo;
    private $cat;
    private $ISBN;
    private $idioma;
    private $qtde_Pag;
    private $conn;

    public function getCodLivro() {
        return $this->CodLivro;
    }

    public function setCodLivro($CodL) {
        $this->CodLivro = $CodL;
    }

    public function getTitulo() {
        return $this->Titulo;
    }

    public function setTitulo($Tit) {
        $this->Titulo = $Tit;
    }

    public function getCat() {
        return $this->cat;
    }

    public function setCat($categ) {
        $this->cat = $categ;
    }

    public function getISBN() {
        return $this->ISBN;
    }

    public function setISBN($inst_ISBN) {
        $this->ISBN = $inst_ISBN;
    }

    public function getIdioma() {
        return $this->idioma;
    }

    public function setIdioma($idi) {
        $this->idioma = $idi;
    }

    public function getQtdePag() {
        return $this->qtde_Pag;
    }

    public function setQtdePag($qtde_Pagina) {
        $this->qtde_Pag = $qtde_Pagina;
    }


    //parte 3 - métodos

    function exclusao ()
    {
        try
        {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("delete from livro where Cod_livro = ?"); // informei o ? (parametro)
            @$sql-> bindParam(1, $this->getCodLivro(), PDO:: PARAM_STR); // inclui esta linha para definix o parametro
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
            $sql = $this->conn->prepare("insert into livro values (null,?,?,?,?,?)");
            @$sql-> bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getCat(), PDO::PARAM_STR);
            @$sql-> bindParam(3, $this->getISBN(), PDO::PARAM_STR);
            @$sql-> bindParam(4, $this->getIdioma(), PDO::PARAM_STR);
            @$sql-> bindParam(5, $this->getQtdePag(), PDO::PARAM_STR);
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
            $sql = $this->conn->query("select * from livro order by Cod_livro");
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
            $sql = $this->conn->prepare ("select * from livro where Titulo like ?"); // informei o ?
            @$sql-> bindParam(1, $this->getTitulo(), PDO:: PARAM_STR); // inclui eata linha para definir o parametro
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
            $sql = $this->conn->prepare("select * from livro where Cod_livro = ?"); // informed o ? (parametro)
            @$sql-> bindParam(1, $this->getCodLivro(), PDO::PARAM_STR); // inclui sata linha para definir o parametro
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
            $sql = $this->conn->prepare ("update livro set Titulo = ?, Categoria = ?, ISBN = ?, Idioma = ?, QtdePag = ? where Cod_livro = ?");
            @$sql-> bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getCat(), PDO::PARAM_STR);
            @$sql-> bindParam(3, $this->getISBN(), PDO::PARAM_STR);
            @$sql-> bindParam(4, $this->getIdioma(), PDO::PARAM_STR);
            @$sql-> bindParam(5, $this->getQtdePag(), PDO::PARAM_STR);
            @$sql-> bindParam(6, $this->getCodLivro(), PDO::PARAM_STR);
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