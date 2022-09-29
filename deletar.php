<?php

    
include "include/banco.php";

        $id = $_POST['id'];

        $sqlSelect = "DELETE FROM chamados WHERE idchamado = '$id'";

        $result = $con->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM chamados WHERE id=$id";
            $resultDelete = $con->query($sqlDelete);
        }
    
    header('Location: home.php');
   
?>