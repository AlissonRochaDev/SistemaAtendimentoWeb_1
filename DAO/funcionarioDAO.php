<?php
require_once 'Conexao.php';
require_once 'UtilDAO.php';

class funcionarioDAO extends Conexao
{

    public function Gravarfuncionario($nome, $admissao, $telefone, $demissao, $endereco)
    {

        if (trim($nome) == '' || trim($admissao) == '' || trim($endereco) == '' || trim($telefone) == '') {
            return 0;
        }
        $conexao = parent::retornaConexao();

        $comando_sql = 'insert into tb_funcionario
        (nome_funcionario , tel_funcionario , data_admissao , data_demissao , endereco_funcionario , id_usuario)
        values (? , ? , ? , ? , ? , ?);';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $telefone);
        $sql->bindValue(3, $admissao);
        $sql->bindValue(4, $demissao == "" ? null : $demissao);
        $sql->bindValue(5, $endereco);
        $sql->bindValue(6, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }
    public function AlterarFuncionario($nome, $admissao, $telefone, $demissao, $endereco, $codigo)
    {
        if (trim($nome) == '' || trim($admissao) == '' || trim($telefone) == ''  || trim($endereco) == '' || trim($codigo) == '') {
            return 0;
        }
        $conexao = parent::retornaConexao();

        $comando_sql = 'UPDATE tb_funcionario
                        set nome_funcionario = ?, tel_funcionario = ?, data_admissao = ?, data_demissao = ?, endereco_funcionario = ? 
                        WHERE id_funcionario = ? and id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $telefone);
        $sql->bindValue(3, $admissao);
        $sql->bindValue(4, $demissao == '' ? null : $demissao);
        $sql->bindValue(5, $endereco);
        $sql->bindValue(6, $codigo);
        $sql->bindValue(7, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }
    public function Consultarfuncionarios()
    {
        $conexao = parent::retornaConexao();
        $comando_sql = 'SELECT id_funcionario,
                               nome_funcionario,
                               tel_funcionario,
                               DATE_FORMAT(data_admissao, "%d/%m/%Y") as data_admissao,
                               DATE_FORMAT(data_demissao, "%d/%m/%Y") as data_demissao,
                               endereco_funcionario
                          FROM tb_funcionario
                         WHERE id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        return $sql->fetchAll();
    }

    public function DetalharFuncionario($id_func)
    {
        $conexao = parent::retornaConexao();
        $comando_sql = "SELECT  id_funcionario,
                                nome_funcionario,
                                tel_funcionario,
                                data_admissao,
                                data_demissao,
                                endereco_funcionario
                           FROM tb_funcionario
                          WHERE id_funcionario = ? and id_usuario = ?";
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $id_func);
        $sql->bindValue(2, UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetch();
    }
}
