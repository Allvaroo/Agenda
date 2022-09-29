<h1>Editar Atividade</h1>
<?php

$sql = "SELECT * FROM chamados WHERE idchamado=".$_REQUEST["idchamado"];
$res = $conn->query($sql);
$row = $res->fetch_object();

?>

<form action=