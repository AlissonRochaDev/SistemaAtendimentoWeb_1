<?php
require_once '../DAO/UtilDAO.php';
if(isset($_GET['exit']) && $_GET['exit'] == '1'){
    UtilDAO::Deslogar();
}
?>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="assets/img/find_user.png" class="user-image img-responsive" />
            </li>


            <li>
                <a href="meus_dados.php"><i class="fa fa-user fa-3x"></i> Meus dados</a>
            </li>
            <li>
                <a href="servico.php"><i class="fa fa-desktop fa-3x"></i> Meus Serviços</a>
            </li>


            <li>
                <a href="#"><i class="fa fa-users fa-3x"></i> Funcionários<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="novo_funcionario.php">Novo funcionário</a>
                    </li>
                    <li>
                        <a href="consultar_funcionarios.php">Consultar</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-3x"></i> Clientes<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="novo_clientes.php">Novo Cliente</a>
                    </li>
                    <li>
                        <a href="consultar_clientes.php">Consultar</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-calendar fa-3x"></i> Consultas<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="consultar_agenda.php">Agendas</a>
                    </li>
                    <li>
                        <a href="consultar_atendimento.php">Atendimentos</a>
                    </li>


                </ul>
            </li>
            <li>
                <a href="_menu.php?exit=1"><i class="fa fa-square-o fa-3x"></i> Sair</a>
            </li>
        </ul>

    </div>

</nav>