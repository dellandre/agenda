<?php


session_start();
include_once("connect.php");
include_once("url.php");


//Retorna Todos os contatos

$clientes = [];
$query = "select * from clientes";
$stmt = $conn->prepare($query);
$stmt->execute();
$clientes = $stmt->fetchAll();




?>