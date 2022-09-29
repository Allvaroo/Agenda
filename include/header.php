<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agenda Eletrônica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    
    <link rel="shortcut icon" />
    
    <script src="../js/bootstrap.min.js"></script>
    <script src="js/myscript.js"></script>
</head>
<body onload="piscar()">

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header text-center ">
                <a href="index.php"><img class="img-responsive" width="80px" height="80px" src="img/logo1.png"/></a>
                <h3>Agenda Eletrônica </h3>
                    
                
                <?php 
                if((isset($_COOKIE['admin'])) or (isset($_COOKIE['usuario'])) or (isset($_COOKIE['tecnico']))){
                ?>
                    
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barra-navegacao">
                    <span class="sr-only">Alternar Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                   
            </div>
                 
            <div class="collapse navbar-collapse" id='barra-navegacao'>  
                
                <ul class="nav navbar-nav navbar-right">

                <?php 
                if (isset($_COOKIE['tecnico'])) {          
                    $login = $_COOKIE['tecnico'];
                    $q = "select * from usuario where login = '$login'";
                    $c = mysqli_query($con,$q);
                    
                    if ($u = mysqli_fetch_assoc($c)){
                        $setor = $u['setor'];
                    }
                    
                    if ($setor == "helpdesk"){
                ?>
                        <li class="tecnico"><a  style="cursor: default;">Técnico</a></li>
                    <?php } 
                }
                    
                if (isset($_COOKIE['usuario'])) {
                ?>
                    <li class="user"><a  style="cursor: default;">User</a></li>
                <?php } ?>
                        
                
                <?php 
                    if((isset($_COOKIE['admin'])) or (isset($_COOKIE['tecnico']))){
                        if(isset($_COOKIE['admin'])){
                ?> 
                            <li><a class="ativo" href="home.php">Início</a></li>
                            
                            <li><a  href="cadastro.php">Cadastrar</a></li>
                            
                            <li class="dropdown">
                                
                                <ul class="dropdown-menu">
                                    
                                </ul>
                            </li>
                            
                    <?php
                            }
                        if((isset($_COOKIE['admin'])) or (isset($_COOKIE['tecnico']))){  
                    ?>
                            <li class="dropdown">
                                
                                <ul class="dropdown-menu">
                               
                                    <li><a href="pdf/pendente.php">Atividades Pendentes</a></li>
                                    <li><a href="pdf/resolvido.php">Atividades Resolvidos</a></li>
                                    <li><a href="pdf/todos.php">Todas as Atividades</a></li>
                        <?php }
                        
                                if(isset($_COOKIE['admin'])){ ?>
                                    <hr>
                                    
                                    
                        <?php } ?>
                                </ul>
                            </li>
                        <?php } ?> 

                        <li  class="separador" role="separator"></li>
                          
                          
                        <?php 
                        if(isset($_COOKIE['usuario']) or (isset($_COOKIE['admin'])) or (isset($_COOKIE['tecnico']))){
                           ?>
                            <li id="sair"><a href="sair.php">Sair</a></li>
                        <?php } } ?>
                </ul>
            </div>
        </div>
    </nav>
    
    
