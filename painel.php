<?php 
include_once("config/connect.php");
include_once("./config/url.php");
include_once("templates/headerusu.php");
@session_start();
$usuario = $_SESSION['nome_usuario'];
if ($usuario == ''){
	header('Location: login.php');
}
 ?>

    <div class="container">
        <?php if(isset($printMsg) && $printMsg != ''): ?>
        <p id="msg"><?= $printMsg ?></p>
        <?php endif; ?>
        <h1 id="main-title">Lista de Usuarios</h1>
        <?php if(count($usuarios) > 0): ?>
            <table class="table" id="contacts-table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Senha</th>
                        <th scope="col">Acões</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $usuario):   ?>
                        <tr>
                            <td scope="row" class="col-id"><?= $usuario['id'] ?></td>
                            <td scope="row"><?= $usuario['nome'] ?></td>
                            <td scope="row"><?= $usuario['email'] ?></td>
                            <td scope="row"><?= $usuario['senha'] ?></td>
                            <td class="actions">
                                <a href="<?= $BASE_URL ?>show.php?id=<?= $usuario['id'] ?>"><i class="fas fa-eye check-icon"></i></a>
                                <a href="<?= $BASE_URL ?>edit.php?id=<?= $usuario['id'] ?>"><i class="far fa-edit edit-icon"></i></a>

                               <form class="delete-form" action="<?= $BASE_URL?>config/processLogin.php" method="POST">
                                   <input type="hidden" name="type" value="delete">
                                   <input type="hidden" name="id" value="<?= $usuario["id"] ?>">
                                    <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                               </form>
                            </td>
                        </tr>
                     <?php  endforeach;  ?>
                </tbody>
            </table>
        <?php else: ?>
            <p id="empty-list-text">Ainda Naõ tem Usuarios Cadastrado, <a href="<?= $BASE_URL ?>create.php"></a></p>

        <?php endif; ?>
    </div>
    
<?php
include_once("templates/footer.php");

?>
 