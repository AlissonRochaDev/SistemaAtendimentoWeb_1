<?php
require_once '../DAO/usuarioDAO.php';
$obj = new UsuarioDAO();
if (isset($_POST['btn'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $salao = $_POST['salao'];
    $endereco = $_POST['endereco'];

    $ret = $obj->AlterarMeusDados($nome, $salao, $telefone, $endereco, $email);
}

$resu = $obj->CarregarMeusDados();


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include_once '_head.php';
?>

<body>
    <div id="wrapper">
        <?php
        include_once '_topo.php';
        include_once '_menu.php';
        ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once '_msg.php'; ?>
                        <h2> Meus Dados</h2>
                        <h5>Aqui você altera seus dados pessoais e do seu salão </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="post" action="meus_dados.php">
                    <div class="form-group col-md-6">
                        <label>Seu nome</label>
                        <input class="form-control" placeholder="Digite seu nome aqui..." name="nome" id="nome" value="<?= $resu['nome_usuario'] ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nome da empresa</label>
                        <input class="form-control" placeholder="Digite o nome do seu salão aqui..." name="salao" id="salao" value="<?= $resu['nome_salao'] ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Telefone da empresa</label>
                        <input class="form-control" placeholder="Digite o telefone do salão aqui..." name="telefone" id="telefone" value="<?= $resu['tel_usuario'] ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Seu E-mail</label>
                        <input class="form-control" placeholder="Digite seu E-mail aqui..." name="email" id="email" value="<?= $resu['email_usuario'] ?>" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Endereço da empresa (opcional)</label>
                        <input class="form-control" placeholder="Digite o endereço do salão aqui..." name="endereco" id="endereco" value="<?= $resu['endereco_salao'] ?>" />
                    </div>
                    <center>
                        <button class="btn btn-success btn-lg" name="btn" onclick="return ValidarMeusDados()">Salvar</button>
                    </center>
                </form>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>



</body>

</html>