<?php
require_once 'Conexao.php';
require_once 'UtilDAO.php';


class ServicoDAO extends Conexao{

    public function GravarServico($nome,$descricao)
    {
        if(trim($nome) == '' || trim($descricao) == '' )
        {
            return 0;
        }
        $conexao = parent::retornaConexao();

        $comando_sql = 'insert into tb_servico
        (id_usuario , nome_servico , descricao_servico)
        values (? , ? , ?);';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::CodigoLogado());
        $sql->bindValue(2,$nome);
        $sql->bindValue(3,$descricao);

        try {
            $sql->execute();
            return 1;
        }
        catch(Exception $ex){
            echo $ex->getMessage();
            return -1;
        }
    }

    public function AlterarServico($nome, $descricao, $id)
    {
        if(trim($nome) == '' || trim($descricao) == ''|| trim($id) == '' )
        {
            return 0;
        }
        $conexao = parent::retornaConexao();

        $comando_sql = 'UPDATE tb_servico
        set nome_servico = ?, descricao_servico =? 
        where id_servico = ? and id_usuario = ?
        ';

        $sql = new PDOStatement;
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1,$nome);
        $sql->bindValue(2,$descricao);
        $sql->bindValue(3,$id);
        $sql->bindValue(4, UtilDAO::CodigoLogado());

        try{
            $sql->execute();
            return 1;
        }
        catch(Exception $ex)
        {
            echo $ex->getMessage();
            return -1;
        }
        


    }

    public function ConsultarServico()
    {
        $conexao = parent::retornaConexao();
        $comando_sql = 'SELECT id_servico,
                               nome_servico,
                               descricao_servico
                               FROM tb_servico
                               WHERE id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        
        $sql->bindValue(1, UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        return $sql->fetchAll();
    }
}