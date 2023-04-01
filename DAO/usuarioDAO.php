<?php
require_once 'Conexao.php';
require_once 'UtilDAO.php';

class UsuarioDAO extends Conexao
{


    public function ValidarLogin($email, $senha)
    {
        $conexao = parent::retornaConexao();
        $comando_sql = 'SELECT id_usuario,
                               nome_usuario
                        FROM   tb_usuario
                       WHERE email_usuario = ? 
                         AND senha_usuario = ?';

        $sql = new PDOStatement;
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $senha);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        $user = $sql->fetch();

        if($user == ''){
            return -4;
        }

        UtilDAO::CriarSessao($user['id_usuario'],$user['nome_usuario']);
        header('location: meus_dados.php');
        exit;


    }

    public function CarregarMeusDados()
    {
        $conexao = parent::retornaConexao();
        $comando_sql = 'SELECT id_usuario,
                              nome_usuario,
                              nome_salao,
                              tel_usuario,
                              email_usuario,
                              endereco_salao
                       FROM   tb_usuario
                       WHERE id_usuario = ?';

        $sql = new PDOStatement;
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetch();
    }

    public function CadastrarUsuario($nome, $salao, $telefone, $email, $senha, $rsenha, $endereco)
    {

        if (trim($nome) == '' || trim($salao) == '' || trim($email) == '' || trim($telefone) == '' || trim($senha) == '' || trim($endereco) == '') {
            return 0;
        }
        if (strlen($senha) < 6) {
            return -3;
        }
        if ($rsenha != $senha) {
            return -2;
        }
        $conexao = parent::retornaConexao();

        $comando_sql = 'insert into tb_usuario
        ( nome_usuario , nome_salao , tel_usuario , senha_usuario , email_usuario , endereco_salao)
        values (? , ? , ? , ? , ? , ?);';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $salao);
        $sql->bindValue(3, $telefone);
        $sql->bindValue(4, $senha);
        $sql->bindValue(5, $email);
        $sql->bindValue(6, $endereco);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function AlterarMeusDados($nome, $salao, $tel, $end, $email)
    {
        $conexao = parent::retornaConexao();
        $comando_sql = 'UPDATE tb_usuario
                           SET nome_usuario = ?, nome_salao = ?, tel_usuario = ?, endereco_salao = ?, email_usuario = ?
                         WHERE id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $salao);
        $sql->bindValue(3, $tel);
        $sql->bindValue(4, $end);
        $sql->bindValue(5, $email);
        $sql->bindValue(6, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }
}
