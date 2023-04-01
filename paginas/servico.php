<?php
require_once '../DAO/servicoDAO.php';
$obj = new ServicoDAO();

$cod = '';
$nome = '';
$desc = '';
if (
    isset($_GET['cod']) && isset($_GET['nome']) && isset($_GET['desc'])
    && $_GET['cod'] != '' && $_GET['nome'] != '' && $_GET['desc'] != ''
) {
    $cod = $_GET['cod'];
    $nome = $_GET['nome'];
    $desc = $_GET['desc'];
   


}


if (isset($_POST['salvar'])) {
    $cod = $_POST['cod'];
    $servico = $_POST['servico'];
    $desc = $_POST['desc'];
   if($cod == '')
   {
    $ret = $obj->GravarServico($servico, $desc);
   }else{
    $ret = $obj->AlterarServico($servico,$desc,$cod);
   }
}
$servicos = $obj->ConsultarServico();

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
                        <?php include_once '_msg.php' ?>
                        <h2>Serviços</h2>
                        <h5>Aqui você gerencia seus serviços </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="servico.php" method="post">
                    <input type="hidden" name="cod" value="<?= $cod ?>">
                    <div class="form-group">
                        <label> Nome do serviço</label>
                        <input class="form-control" placeholder="Digite o nome do serviço aqui..." value="<?= $nome?>" name="servico" id="servico" />
                    </div>
                    <div class="form-group">
                        <label> Descrição do serviço</label>
                        <textarea class="form-control" placeholder="Digite a descrição do serviço aqui..." name="desc" id="desc"><?=$desc ?></textarea>
                    </div>
                    <center>
                        <button class="btn btn-success btn-lg" name="salvar" onclick="return ValidarCamposServico()"><?=$cod == '' ? 'Gravar': 'Alterar' ?></button>
                        <?php if($cod != "") {?>
                        <button class="btn btn-danger btn-lg" name="excluir">Excluir</button>
                        <?php }?>
                    </center>
                </form>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Serviços cadastrados
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Ação</th>
                                                <th>Serviço</th>
                                                <th>Descrição</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 0; $i < count($servicos); $i++) {
                                                $parametro = '?cod=' . $servicos[$i]['id_servico'] . '&nome=' . $servicos[$i]['nome_servico'] . '&desc=' . $servicos[$i]['descricao_servico'];


                                            ?>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        <center>
                                                            <a href="servico.php<?= $parametro ?>" class="btn btn-info btn-xs "> Editar</a>
                                                        </center>
                                                    </td>
                                                    <td> <?= $servicos[$i]['nome_servico'] ?></td>
                                                    <td> <?= $servicos[$i]['descricao_servico'] ?></td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>


            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>


</body>

</html>