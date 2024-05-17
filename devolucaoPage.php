<?php

require_once '../../../config.php';
require_once '../../actions/devolucao.php';
require_once '../../actions/emprestimo.php';
require_once '../partials/header.php';


if(isset($_POST['id_livro']) && isset($_POST['id']) && isset($_POST['id_cliente']))
   updateDevolucaoAction($conn, $_POST['id_livro'], $_POST['id'], $_POST['id_cliente']);
   
   $emprestimo = findEmprestimoAction($conn, $_GET['id']);
?>

<div class="container">
<h2>Devolução</h2>
    <form action="../../pages/devolucao/devolucao.php" method="POST">
        <label>Realmente deseja devolver este livro?</label> 
        <input type="hidden" name="id_livro" value="<?=$_GET['id_livro']?>" required/>
        <input type="hidden" name="id_cliente" value="<?=$_GET['id_cliente']?>" required/>
        <input type="hidden" name="id" value="<?=$_GET['id']?>"/>
        <label><?=htmlspecialchars($emprestimo['titulo'])?></label>
        <button class="btn-verde" type="submit">
                Sim
            </button>  
    </form>
    <button class="btn-vermelho" onclick="window.location.href = 
    'http://localhost/sistema_livros/src/pages/emprestimo/read.php'">
                Não
             </button> 
</div>

<?php require_once '../partials/footer.php'; ?>
