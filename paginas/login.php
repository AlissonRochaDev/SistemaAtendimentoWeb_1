<?php
include_once '../DAO/usuarioDAO.php';
if(isset($_POST['btn']))
{
    $email = $_POST['email'];
    $senha = $_POST['senha'];
$obj = new UsuarioDAO();
    $ret = $obj->ValidarLogin($email,$senha);
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once '_head.php';
?>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Faça seu login </h2>
               
                <h5>( Entre com seus dados )</h5>
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Preencha os campos abaixo </strong>  
                            </div>
                            <div class="panel-body">
                                <?php include_once '_msg.php'?>
                                <form method="post" action="login.php">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Seu e-mail " name="email" />
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Sua senha" name="senha" />
                                        </div>
                                    
                                     
                                     <button class="btn btn-primary" name="btn">Acessar </button>
                                    <hr />
                                    Não tem cadastro ? <a href="cadastro.php" >CLIQUE AQUI </a> 
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


   
   
</body>
</html>
