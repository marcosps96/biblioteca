<?php

require_once '../../../config.php';
require_once '../../actions/emprestimo.php';
require_once '../../../src/modules/messages.php';
require_once '../partials/header.php';

$emprestimos = readEmprestimoAction($conn);
?>
<button class="btn-cadastrar" onclick="window.location.href='create.php'">
    Novo Empréstimo
</button>
<div class="message">
    <?php if (isset($_GET['message'])) echo (printMessage($_GET['message'])); ?>
</div>
<h2>Empréstimos</h2>

<table>
    <tr>
        <th>Livro</th>

        <th>Cliente</th>
        <th>Telefone</th>
        <th>Data de empréstimo</th>
        <th>Data de devolução</th>
        <th>Situação</th>
        <th>Ação</th>
    </tr>

    <?php foreach ($emprestimos as $row) : ?>
        <tr>
            <td><?= htmlspecialchars($row['livro']) ?></td>
            <td><?= htmlspecialchars($row['cliente']) ?></td>
            <td><?= htmlspecialchars($row['telefone']) ?></td>
            <td><?= htmlspecialchars($row['data_emprestimo']) ?></td>
            <td><?= htmlspecialchars($row['data_devolucao']) ?></td>
            <td><?= htmlspecialchars($row['situacao']) ?></td>
            <td>

                <?php
                $aux = false;
                if ($row['is_emprestado'] == 1 && $row['pendencia'] == 1) {
                    $aux = true;
                } else if ($row['is_emprestado'] == 1 && $row['pendencia'] == 0) {
                    $aux = true;
                } else if ($row['is_emprestado'] == 0 && $row['pendencia'] == 1) {
                    $aux = true;
                }
                if ($aux) {
                    // Se o livro estiver emprestado, exibe o botão de devolver e editar
                    echo '<button class="btn-verde"><a class="btn-verde" 
                    href="../devolucao/devolucao.php?id_livro=' . $row['id_livro'] . 
                    ' &id=' . $row['id'] . ' &id_cliente=' . $row['id_cliente'] . '">
                    Devolver</a></button>';
                    echo '<button class="btn-vermelho"><a class="btn-vermelho" href="edit.php?id=' 
                    . $row['id'] . '">Editar</a></button>';
                } else {
                    // Se o livro estiver devolvido, exibe uma mensagem ou outro conteúdo
                    echo '<button class="btn-vermelho">Este livro já está devolvido.</button>';
                    echo '<button class="btn-vermelho"><a class="btn-vermelho" 
                    href="delete.php?id=' . $row['id'] . '">Deletar</a></button>';
                }
                ?>

            </td>
        </tr>
    <?php endforeach; ?>

</table>


<?php require_once '../partials/footer.php'; ?>
