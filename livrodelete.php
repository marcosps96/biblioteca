<?php

require_once '../../../config.php';
require_once '../../actions/livro.php';
require_once '../partials/header.php';

if(isset($_POST['id']))
    deleteBookAction($conn, $_POST['id']);

?>
<div class="container">
    <h2>Deletar Livro</h2>
    <form action="../../pages/livro/delete.php" method="POST">
        <label>Realmente deseja excluir esse Livro?</label>
        <input type="hidden" name="id" value="<?=$_GET['id']?>" required/>
        <button class="btn-verde" type="submit">
                Sim
        </button> 
    </form>

    <button class="btn-vermelho" onclick="window.location.href = 'http://localhost/sistema_livros/src/pages/livro/read.php'">
                Não
             </button> 
</div>

<?php require_once '../partials/footer.php'; ?>