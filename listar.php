
<?php
include_once("templates/headercli.php");
$usuario = $_SESSION['nome_usuario'];
if ($usuario == ''){
	header('Location: login.php');
}

?>
<h1><?= $usuario?></h1>
    <div class="container">
        <?php if(isset($printMsg) && $printMsg != ''): ?>
        <p id="msg"><?= $printMsg ?></p>
        <?php endif; ?>
        <h1 id="main-title">Lista de Clientes</h1>
        <?php if(count($clientes) > 0): ?>
            <table class="table" id="contacts-table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Acões</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($clientes as $cliente):   ?>
                        <tr>
                            <td scope="row" class="col-id"><?= $cliente['id'] ?></td>
                            <td scope="row"><?= $cliente['name'] ?></td>
                            <td scope="row"><?= $cliente['email'] ?></td>
                            <td scope="row"><?= $cliente['telefone'] ?></td>
                            <td class="actions">
                                <a href="<?= $BASE_URL ?>show.php?id=<?= $cliente['id'] ?>"><i class="fas fa-eye check-icon"></i></a>
                                <a href="<?= $BASE_URL ?>edit.php?id=<?= $cliente['id'] ?>"><i class="far fa-edit edit-icon"></i></a>

                               <form class="delete-form" action="<?= $BASE_URL?>config/processCli.php" method="POST">
                                   <input type="hidden" name="type" value="delete">
                                   <input type="hidden" name="id" value="<?= $cliente["id"] ?>">
                                    <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                               </form>
                            </td>
                        </tr>
                     <?php  endforeach;  ?>
                </tbody>
            </table>
        <?php else: ?>
            <p id="empty-list-text">Ainda Naõ tem contato na agenda, <a href="<?= $BASE_URL ?>create.php"></a></p>

        <?php endif; ?>
    </div>
    
<?php
include_once("templates/footer.php");

?>