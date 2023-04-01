<?php 

include_once '../DAO/clienteDAO.php';
$obj = new ClienteDAO;
if(isset($_POST['btnAlterar'])){
    $valor = $_POST['valor'];
    $obs = $_POST['obs'];
    $codigo = $_POST['codigo'];

    $ret = $obj->AlterarAtendimento($valor,$obs,$codigo);
    header("location: consultar_atendimento.php?ret=$ret");
    exit;
    


}
else if(isset($_GET['id']))
{
    $nome = $_GET['nome'];
    $id = $_GET['id'];
    
    $atend = $obj->DetalharAtendimento($id);
}

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
                        <h2>Alterar Atendimento do: <?= strtoupper($nome) ?></h2>
                        <h5>Altere o atendimento aqui... </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="alterar_atendimento.php" method="post">
                   <input type="hidden" name="codigo" value="<?=$id?>">
                <div class="form-group col-md-6">
                    <label>Data do atendimento</label>
                    <input disabled  class="form-control" value="<?=$atend['data_agenda']?>"   />
                </div>
                <div class="form-group col-md-6">
                    <label>Horário do atendimento</label>
                    <input disabled class="form-control" value="<?=$atend['horario_agenda']?>"   />
                </div>
                <div class="form-group col-md-6">
                    <label> Funcionário do atendimento</label>
                   <input disabled class="form-control" value="<?=$atend['nome_funcionario']?>"> 
                </div>
                <div class="form-group col-md-6">
                    <label> Serviço do atendimento</label>
                    <input disabled class="form-control" value="<?=$atend['nome_servico']?>" >
                </div>
                <div class="form-group col-md-6">
                    <label>Valor do atendimento</label>
                    <input  class="form-control" placeholder="Altere o Valor aqui..." name="valor" value="<?=$atend['valor_atendimento']?>" name="valor" />
                </div>
                <div class="form-group col-md-12">
                    <label>Observação do atendimento</label>
                    <textarea class="form-control" name="obs" rows="3" placeholder="Altere a observação aqui..." name="obs"><?=$atend['obs_atendimento']?></textarea>
                </div>
                <div class="form-group col-md-12">
                <center> 
                    <button class="btn btn-success btn-lg" name="btnAlterar">Alterar</button>
                </center>
                </div>
                </form>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    


</body>

</html>