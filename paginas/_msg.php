<?php
if(isset($_GET['ret']))
{
    $ret = $_GET['ret'];
}


if (isset($ret)) {

    switch ($ret) {
        case 0:
            echo '<div class="alert alert-warning">
                    Preencher o(s) campo(s) obrigatório(s)
                </div>';
            break;
        case 1:
            echo '<div class="alert alert-success">
                Ação realizada com sucesso!
            </div>';
            break;
        case -1:
            echo '<div class="alert alert-danger">
                    Ocorreu um erro na operação. Tente mais tarde!
                </div>';
            break;
        case -2:
            echo '<div class="alert alert-danger">
                        A SENHA e REPETIR SENHA devem ser iguais 
                        </div>';
            break;
        case -3:
            echo '<div class="alert alert-danger">
                A SENHA deve conter no minimo 6 caracteres </div>';
            break;
        case -4:
            echo '<div class="alert alert-info">
                Usuario nao encontrado </div>';
            break;
    }
}
