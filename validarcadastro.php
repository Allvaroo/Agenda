<?php 
	if(isset($_POST['login'])){
		$nome = htmlspecialchars($_POST['nome']);
        $email = htmlspecialchars($_POST['email']);
		$login = htmlspecialchars($_POST['login']);
		$senha = htmlspecialchars($_POST['senha']);
		$senha = md5($senha);
		$setor = $_POST['setor'];
		date_default_timezone_set('America/Sao_Paulo');
		$data = date("Y-m-d H:i:s");  
            
        include "include/banco.php";
        
	    $query = "select nome from usuario where login = '$login' or email = '$email' limit 1";
	    $consulta = mysqli_query($con, $query);
	    $total = mysqli_num_rows($consulta);
	
		if($total > 0){
			header("Location:cadastro.php?erro=1");
		} else {
			$query2 = "insert into usuario(nome, email, login, senha, setor, datacadastro, dados_status, primeira_vez) values('$nome','$email','$login','$senha','$setor','$data','ativo','1')";
			mysqli_query($con, $query2);
			header("Location:cadastro.php?ok=ok");
		}

	}
 ?>