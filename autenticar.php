<?php 
include_once("./config/connect.php");
@session_start();
include_once("./config/url.php");
?>

 <?php

 if(empty($_POST['email']) || empty($_POST['senha'])){
 	 	echo "<script language='javascript'>window.location='index.php'; </script>";
 	exit();

 }

$email =  $_POST['email'];
$senha =  $_POST['senha'];


$res = $conn->prepare("SELECT * from usuarios where email = :email and senha = :senha");
		$res->bindValue(":email", $email);
		$res->bindValue(":senha", $senha);
		
		$res->execute();
		$dados = $res->fetchAll(PDO::FETCH_ASSOC);
		$linhas = count($dados);

		if($linhas > 0){

			$_SESSION['nome_usuario'] = $dados[0]['nome'];
			$_SESSION['nivel_usuario'] = $dados[0]['nivel'];
			

			echo "<script language='javascript'>window.location='listar.php'; </script>";

			}else{

				echo "<script language='javascript'>window.alert('Dados Incorretos!'); </script>";

				echo "<script language='javascript'>window.location='index.php'; </script>";
			}



