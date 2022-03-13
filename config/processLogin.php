<?php
include_once("connect.php");
include_once("url.php");
session_start();


if(isset($_POST['registrar'])){

	


	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$confirmar_senha = $_POST['confirmar-senha'];

	if($senha == $confirmar_senha){

		//VERIFICAR SE EXISTE O EMAIL CADASTRADO NO BANCO DE DADOS
		$res = $conn->query("SELECT * from usuarios where email = '$email'");
		$dados = $res->fetchAll(PDO::FETCH_ASSOC);
		$linhas = count($dados);

		if($linhas == 0){
			
			$res = $conn->prepare("insert into usuarios (nome, email, senha, nivel) values (:nome, :email, :senha, :nivel)");

			$res->bindValue(":nome", $nome);
			$res->bindValue(":email", $email);
			$res->bindValue(":senha", $senha);
			$res->bindValue(":nivel", "Comum");
			$res->execute();

			echo "<script language='javascript'>window.alert('Usuário Cadastrado!'); </script>";
		}else{
            //echo "<script language='javascript'>window.location='index.php'; </script>"; 
			echo "<script language='javascript'>window.alert('Este usuário já está cadastrado!'); </script>";
            echo "<script language='javascript'>window.location='index.php'; </script>";
		}

		
		
	}else{
		echo "<script language='javascript'>window.alert('As senhas são Diferentes!'); </script>";
	}

$usuarios = [];
$query = "select * from usuarios";
$stmt = $conn->prepare($query);
$stmt->execute();
$usuarios = $stmt->fetchAll();


	
}



?>

