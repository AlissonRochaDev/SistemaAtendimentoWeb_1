<?php

class UtilDAO
{


    public static function IniciarSessao()
    {

        if (!isset($_SESSION)) {
            session_start();
        }
    }


    public static function CriarSessao($id, $nome)
    {
        self::IniciarSessao();

        //Criar a sessao
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
    }

    public static function IrLogin()
    {
        header('location: login.php');
        exit;
    }

    public static function Deslogar()
    {
        self::IniciarSessao();
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        self::IrLogin();
    }



    public static function CodigoLogado()
    {
        self::IniciarSessao();
        return $_SESSION['id'];
    }
    public static function NomeLogado()
    {
        self::IniciarSessao();
        return $_SESSION['nome'];
    }

    public static function VerificarLogado(){
        self::IniciarSessao();
        if(!isset($_SESSION['id']) && !isset($_SESSION['nome']) && !is_numeric($_SESSION['id'])){
            self::IrLogin();
        }
    }

}
