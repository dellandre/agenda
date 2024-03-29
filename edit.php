
<?php
include_once("templates/header.php");

?>
  <div class="container">
  <?php include_once("templates/back.html"); ?>
      <h1>Editar Contato</h1>
      <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
       <input type="hidden" name="type" value="edit">
       <input type="hidden" name="id" value="<?= $contact['id']?>">
       <div class="form-group">
           <label for="name">Nome do Contato:</label>
           <input type="text" class="form-control" id="nome" name="name" placeholder="Digite o nome"  value="<?= $contact['name']?>">
       </div>
       <div class="form-group">
           <label for="phone">Teleone:</label>
           <input type="tel" class="form-control" id="phone" name="phone" placeholder="Digite o telefone"  value="<?= $contact['phone']?>">
       </div>
       <div class="form-group">
           <label for="observations">Observacões:</label>
           <textarea type="text" class="form-control" id="observations" name="observations"  placeholder="Digite a Observacões" rows="3" value=""><?= $contact['observations']?></textarea>
       </div>
       <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>

  </div> 
    
<?php
include_once("templates/footer.php");

?>