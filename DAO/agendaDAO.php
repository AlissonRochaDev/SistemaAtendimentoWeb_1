<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class AgendaDAO extends Conexao
{

    public function Agendar($data, $hora, $func, $servico, $obs, $id_cliente)
    {
        if (trim($data) == '' || trim($hora) == '' || trim($func) == '' || trim($servico) == '' || trim($id_cliente) == '') {
            return 0;
        }
        //continuar

        $conexao = parent::retornaConexao();

        $comando_sql = 'insert into tb_agenda
        (id_cliente , data_agenda , horario_agenda , obs_agenda , id_funcionario , id_servico , id_usuario)
        values (? , ? , ? , ? , ? , ? , ?);';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1,$id_cliente);
        $sql->bindValue(2, $data);
        $sql->bindValue(3,$hora);
        $sql->bindValue(4,$obs);
        $sql->bindValue(5,$func);
        $sql->bindValue(6,$servico);
        $sql->bindValue(7, UtilDAO::CodigoLogado());
        

        try {
            $sql->execute();
            return 1;
        }
        catch(Exception $ex){
            echo $ex->getMessage();
            return -1;
        }
    }
    public function ConsultarAgendaCliente($id_cliente)
    {
        
        $conexao = parent::retornaConexao();
        $comando_sql = 'SELECT id_agenda,
                   DATE_FORMAT(data_agenda,"%d/%m/%Y") as data_agenda,
                               horario_agenda,
                               obs_agenda,
                               nome_servico,
                               nome_funcionario
                          FROM tb_agenda 
                    INNER JOIN tb_servico     on tb_servico.id_servico = tb_agenda.id_servico
                    INNER JOIN tb_funcionario on tb_funcionario.id_funcionario = tb_agenda.id_funcionario
                         WHERE tb_agenda.id_usuario = ?  
                           AND tb_agenda.id_cliente = ?';
         $sql = new PDOStatement();
         $sql = $conexao->prepare($comando_sql);
         $sql->bindValue(1,UtilDAO::CodigoLogado());
         $sql->bindValue(2,$id_cliente);
         $sql->setFetchMode(PDO::FETCH_ASSOC);
         $sql->execute();
         return $sql->fetchAll();
    }
    public function AlterarAgenda($data,$hora,$func,$servico,$obs,$codigo)
    {
        if(trim($data)==''||trim($hora)==''||trim($func)==''||trim($servico)==''||trim($codigo)=='')
        {
            return 0;
        }
        $conexao = parent::retornaConexao();
        $conexao_sql = 'UPDATE tb_agenda
                           SET data_agenda = ?, horario_agenda = ?, obs_agenda = ?, id_servico = ?, id_funcionario = ?
                         WHERE id_agenda = ? and id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($conexao_sql);
        $sql->bindValue(1,$data);
        $sql->bindValue(2,$hora);
        $sql->bindValue(3,$obs);
        $sql->bindValue(4,$servico);
        $sql->bindValue(5,$func);
        $sql->bindValue(6,$codigo);
        $sql->bindValue(7,UtilDAO::CodigoLogado());
         
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ExcluirAgenda($id_agenda)
    {
        $conexao = parent::retornaConexao();
        $comando_sql = 'DELETE FROM tb_agenda
                        WHERE id_agenda = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1,$id_agenda);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        
        try{
            $sql->execute();
            return 1;
        }
        catch(Exception $ex){
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ConsultarAgenda($dataI, $dataF)
    {
        if(trim($dataF) == '' || trim($dataI) == '')
        {
            return 0;
        }
        $conexao = parent::retornaConexao();
        $comando_sql = "SELECT id_agenda,
                   DATE_FORMAT(data_agenda,'%d/%m/%Y') as data_agenda,
                               horario_agenda,
                               obs_agenda,
                               nome_servico,
                               nome_funcionario,
                               nome_cliente
                          FROM tb_agenda
                          INNER JOIN tb_servico on tb_servico.id_servico = tb_agenda.id_servico
                          INNER JOIN tb_funcionario on tb_funcionario.id_funcionario = tb_agenda.id_funcionario
                          INNER JOIN tb_cliente on tb_cliente.id_cliente = tb_agenda.id_cliente
                         where data_agenda between ? and ? and tb_agenda.id_usuario = ? and 
                         tb_agenda.id_agenda not in (select id_agenda from tb_atendimento)";
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1,$dataI);
        $sql->bindValue(2,$dataF);
        $sql->bindValue(3,UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function DetalharAgenda($id_agenda)
    {
        $conexao = parent::retornaConexao();
        $comando_sql = "SELECT id_agenda,
                               data_agenda,
                               horario_agenda,
                               obs_agenda,
                               id_cliente,
                               id_servico,
                               id_funcionario
                          FROM tb_agenda
                         WHERE id_agenda = ? and id_usuario = ?";
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1,$id_agenda);
        $sql->bindValue(2,UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetch();

    }
}
