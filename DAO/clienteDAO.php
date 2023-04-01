<?php
require_once 'Conexao.php';
require_once 'UtilDAO.php';

class ClienteDAO extends Conexao{

    public function GravarCliente($nome,   $telefone  , $endereco){

        if(trim($nome) == '' || trim($telefone) == ''||trim($endereco) == ''){
             return 0;
        }

        $conexao = parent::retornaConexao();

        $comando_sql = 'insert into tb_cliente
        ( id_usuario, nome_cliente , tel_cliente , endereco_cliente)
        values (? , ? , ? , ?);';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1,UtilDAO::CodigoLogado());
        $sql->bindValue(2,$nome );
        $sql->bindValue(3,$telefone);
        $sql->bindValue(4,$endereco);

        try {
            $sql->execute();
            return 1;
        }
        catch(Exception $ex){
            echo $ex->getMessage();
            return -1;
        }

    }

    public function AlterarCliente($nome,$telefone,$codigo,$endereco)
    {
        if(trim($nome)==''||trim($telefone)==''||trim($codigo)==''||trim($endereco)=='')
        {
            return 0;
        }
        $conexao = parent::retornaConexao();

        $comando_sql = 'UPDATE tb_cliente
                        set nome_cliente = ?, tel_cliente = ?, endereco_cliente = ? 
                        WHERE id_cliente = ? and id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $telefone);
        $sql->bindValue(3, $endereco);
        $sql->bindValue(4, $codigo);
        $sql->bindValue(5, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function AtenderCliente($valor,$obs, $idAgenda)
    {
        if(trim($valor) == ''|| trim($idAgenda) == '')
        {
            return 0;
        }

        $conexao = parent::retornaConexao();

        $comando_sql = 'INSERT into tb_atendimento
                                    (valor_atendimento,
                                    obs_atendimento,
                                    id_agenda,
                                    id_usuario)
                                    values
                                    (?,?,?,?);';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1,$valor);
        $sql->bindValue(2,$obs==''?null:$obs);
        $sql->bindValue(3,$idAgenda);
        $sql->bindValue(4,UtilDAO::CodigoLogado());

        try{
            $sql->execute();
            return 1;
        }
        catch(Exception $ex){
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ConsultarClientes()
    {
        $conexao = parent::retornaConexao();
        $comando_sql = 'SELECT id_cliente,
                               nome_cliente,
                               tel_cliente,
                               endereco_cliente
                          FROM tb_cliente
                         WHERE id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        return $sql->fetchAll();
    }


    public function DetalharCliente($id_cliente)
    {
        $conexao = parent::retornaConexao();
        $comando_sql = "SELECT  id_cliente,
                                nome_cliente,
                                tel_cliente,
                                endereco_cliente
                           FROM tb_cliente
                          WHERE id_cliente = ? and id_usuario = ?";
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $id_cliente);
        $sql->bindValue(2, UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetch();
    }

    public function ConsultarAtendimento($dataI,$dataF)
    {
        if(trim($dataI)== '' || trim($dataF)== '')
        {
            return 0;
        }
        $conexao = parent::retornaConexao();
        $comando_sql = 'SELECT id_atendimento,
                               valor_atendimento,
                               obs_atendimento,
                               nome_funcionario,
                               nome_servico,
                               nome_cliente,
                   DATE_FORMAT(data_agenda, "%d/%m/%Y") as data_agenda,
                               horario_agenda
                          from tb_atendimento
                          inner join tb_agenda on tb_agenda.id_agenda = tb_atendimento.id_agenda
                          inner join tb_funcionario on tb_funcionario.id_funcionario = tb_agenda.id_funcionario
                          inner join tb_servico on tb_servico.id_servico = tb_agenda.id_servico
                          inner join tb_cliente on tb_cliente.id_cliente = tb_agenda.id_cliente
                          where tb_agenda.data_agenda between ? and ? and tb_atendimento.id_usuario = ?';
        
        $sql = new PDOStatement();
        $sql =$conexao->prepare($comando_sql);
        $sql->bindValue(1,$dataI);
        $sql->bindValue(2,$dataF);
        $sql->bindValue(3,UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
         return $sql->fetchAll();
    }

    public function DetalharAtendimento($idAtend)
    {
        $conexao = parent::retornaConexao();
        $comando_sql ='SELECT id_atendimento,
                              valor_atendimento,
                              obs_atendimento,
                              nome_funcionario,
                              nome_servico,
                              nome_cliente,
                        DATE_FORMAT(data_agenda, "%d/%m/%Y") as data_agenda,
                              horario_agenda
                              from tb_atendimento
                          inner join tb_agenda on tb_agenda.id_agenda = tb_atendimento.id_agenda
                          inner join tb_funcionario on tb_funcionario.id_funcionario = tb_agenda.id_funcionario
                          inner join tb_servico on tb_servico.id_servico = tb_agenda.id_servico
                          inner join tb_cliente on tb_cliente.id_cliente = tb_agenda.id_cliente
                          where id_atendimento = ? and tb_atendimento.id_usuario = ?';
         $sql = new PDOStatement();
         $sql =$conexao->prepare($comando_sql);
         $sql->bindValue(1,$idAtend);
         $sql->bindValue(2,UtilDAO::CodigoLogado());
         $sql->setFetchMode(PDO::FETCH_ASSOC);
         $sql->execute();
         return $sql->fetch();
    }

    public function AlterarAtendimento($valor,$obs,$codigo)
    {
        if ( trim($valor) == '' || trim($codigo) == ''  ) {
            return 0;
        }
        $conexao = parent::retornaConexao();
        $comando_sql = 'UPDATE tb_atendimento
                           set valor_atendimento = ? , obs_atendimento = ?
                         where id_atendimento = ? and id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $valor);
        $sql->bindValue(2, $obs == '' ? null : $obs);
        $sql->bindValue(3, $codigo);
        $sql->bindValue(4, UtilDAO::CodigoLogado());
   
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }


}