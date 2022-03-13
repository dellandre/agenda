
<?php
include_once("templates/header.php");

?>
  <div class="container">
  <?php include_once("templates/back.html"); ?>
      <h1>Criar Contato</h1>
      <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
       <input type="hidden" name="type" value="create">
       <div class="form-group">
           <label for="name">Nome do Contato:</label>
           <input type="text" class="form-control" id="nome" name="name" placeholder="Digite o nome" required>
       </div>
       <div class="form-group">
           <label for="phone">Teleone:</label>
           <input type="tel" class="form-control" id="phone" name="phone" placeholder="Digite o telefone" required>
       </div>
       <div class="form-group">
           <label for="observations">Observacões:</label>
           <textarea type="text" class="form-control" id="observations" name="observations" required placeholder="Digite a Observacões" rows="3"></textarea>
       </div>
       <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

  </div> 
    
<?php
include_once("templates/footer.php");

?>