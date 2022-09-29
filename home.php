<?php

//essa pagina é somente do admin.
    include "include/banco.php";

    if(empty($_COOKIE['admin'])){ 
      header("Location:index.php"); 
    }
  

// essa variavel serve para já começar com conteudo para não dar erro! 
    $status = "Pendente";

    if(isset($_POST['selecionar'])){
        $selecionar = $_POST['selecionar'];
        $status = $_POST['status'];
        
        if($selecionar == "todos"){
            $query = "select idchamado, data, setorcall, solicitacao, descricao, problema, numaquina, status from chamados where status = '$status' order by idchamado";
        }else{
            $query = "select idchamado, data, setorcall, solicitacao, descricao, problema, numaquina, status from chamados where setorcall = '$selecionar' and status = '$status' order by idchamado";
        }
        
    }else{ $query = "select idchamado, data, setorcall, solicitacao, descricao, problema, numaquina, status from chamados where status = 'Pendente' order by idchamado"; }
    $cons = mysqli_query($con, $query);
    $total = mysqli_num_rows($cons);

    include "include/header.php";   
?>
<div class="clear4"></div>
    <section class="overx" >
        <div class="container">
            <div class="col-xs-12 col-md-12">
                <h3 class="ajust2">Atividades</h3>
              
                <form action="" method="post" >
                    <div class="setor form-group">
                        <label style="color: black;" for="selecionar">Selecionar por:</label>
                        <select class="form-control" name="selecionar" id="selecionar" required>
                            <option value="todos">Todos</option>
                            
                        </select>
                        
                    </div>
                    
                    <div class="tipo form-group ">
                        <label style="color: black;" for="status">Status:</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="">Selecione:</option>
                            <option  style="color: red;" value="Pendente">Pendentes</option>
                            <option style="color: blue;" value="Resolvido">Resolvidos</option>
                        </select>
                        <div class="form-control botao">
                            <button class="btn btn-default pesq"> Pesquisar</button>
                        </div>
                    </div>
                </form>
                
                <div class='table-responsive'>
                    <?php if($total != 0){
                        echo "<table class='tab table table-hover'>
                                <thead>
                                    <tr class='back'>
                                        <th>Nome:</th>
                                        <th>Prioridade</th>
                                        <th>Atividade:</th>
                                        <th>Data:</th>
                                        <th>Solicitação:</th>
                                        <th>Status:</th>
                                        <th>Editar:</th>
                                        <th>Excluir:</th>
                                        
                                    </tr>
                                </thead>";

                        while($quero = mysqli_fetch_array($cons)){
                            $idchamado = $quero['idchamado'];
                            echo "<tbody>   
                                    <tr>
                                        <td>" .$quero['setorcall']. "</td>
                                        <td>" .$quero['numaquina']. "</td>
                                        <td>" .$quero['descricao']. "</td>
                                        <td>" .$quero['data']. "</td>
                                        <td>" .$quero['solicitacao']. "</td><td>" ?>
                                        
                                        
                                        
                            <?php if($quero['status'] == 'Pendente'){
                                $query4 = "select * from confirma where idchamado2 = $idchamado";
                                $consulta4 = mysqli_query($con,$query4);
                                $rows = mysqli_num_rows($consulta4);
                            
                                if ($rows > 0) {
                                    echo "<p style='color: red; '>".$quero['status']."</br><span style='font-style: italic;'>(Alteração</span></br>solicitada)</p>";
                                } else {
                                    echo "<span style='color: red;'>".$quero['status']."</span>";
                                ?>
                                <?php 
                                    include 'include/modalalterarstatus.php';
                                } }
                            
                            if($quero['status'] == 'Resolvido') {
                                echo "<span style='color:blue;'>Resolvido</span>"; 
                                
                            }  
                                                      
                            ?><?php echo "</td>";  ?>
                                                                    
                                                                                      
                               <td> <button onclick="location.href='editar.php'.$row-id" class='btn btn-success'>Editar</button> </td>

                               
                               <td> <button onclick="location.href='deletar.php'.$row-id" class='btn btn-danger'>Excluir</button>   </td>  


                            <?php
                                include 'include/modaldescricao.php';
                                echo "</td>
                                
                                   </tr> 
                                </tbody>"; ?>                                  
                            <?php     
                            }
        
                            echo "</table>";

                    }
                    
                    ?>
                </div> 
            </div>
        </div>
    </section>
<div class="clear3"></div>

