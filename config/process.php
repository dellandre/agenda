<?php

session_start();
include_once("connect.php");
include_once("url.php");

//Retona apenas um contacto



$data = $_POST;

if(!empty($data)) {
    //print_r($data);


    if($data['type'] === "create"){
        //echo "criar";
        $name = $data["name"];
        $phone = $data["phone"];
        $observations = $data["observations"];

        $query = "INSERT INTO contacts (name,phone,observations) VALUES (:name,:phone,:observations)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone",$phone);
        $stmt->bindParam(":observations", $observations);


        try{
          $stmt->execute();
          $_SESSION["msg"] = "Contato criado com sucesso.. !";
        
        }
        catch(PDOException $e) {
            $err = $e->getMessage();
            echo "Erro:  $err";
        }
        

    }else if($data["type"] === "edit"){
        $id = $data["id"];
        $name = $data["name"];
        $phone = $data["phone"];
        $observations = $data["observations"];

        $query = "UPDATE contacts
                  SET name = :name, phone = :phone, observations = :observations WHERE id = :id";

      $stmt = $conn->prepare($query);
      $stmt->bindParam(":id", $id);
      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":phone",$phone);
      $stmt->bindParam(":observations", $observations);

      try{
        $stmt->execute();
        $_SESSION["msg"] = "Contato atualizado com sucesso.. !";
      
      }
      catch(PDOException $e) {
          $err = $e->getMessage();
          echo "Erro:  $err";
      }

    }else if($data["type"] === "delete"){

        $id = $data["id"];

        $query = "DELETE FROM contacts  WHERE id = :id";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(":id", $id);
        try{
            $stmt->execute();
            $_SESSION["msg"] = "Contato deletado com sucesso.. !";
          
          }
          catch(PDOException $e) {
              $err = $e->getMessage();
              echo "Erro:  $err";
          }

    }

    header("Location:" . $BASE_URL . "../index.php");
}else{

    $id = '';
if(!empty($_GET)){
    $id = $_GET['id'];

    
}


if(!empty($id)) {

    $query = "select * from contacts where id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);

    $stmt->execute();
    $contact = $stmt->fetch();
}
else{

}

//Retorna Todos os contatos
$contacts = [];
$query = "select * from contacts";
$stmt = $conn->prepare($query);
$stmt->execute();
$contacts = $stmt->fetchAll();


}


$conn = null;

?>