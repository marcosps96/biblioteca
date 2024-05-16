<?php

require_once '../../../config.php';
require_once '../../actions/livro.php';
require_once '../../../src/modules/messages.php';
require_once '../partials/header.php';

$books = readBookAction($conn);
//$livrosEmprestados = readBorrowedBookAction($conn);
?>
<button class="btn-cadastrar" onclick="window.location.href='create.php'">
    Cadastrar Livro
</button>

<div class="message">
    <?php if (isset($_GET['message'])) echo (printMessage($_GET['message'])); ?>
</div>

<h2>Lista de Livros</h2>
<table>
    <tr>
        <th>Título</th>
        <th>ISBN</th>
        <th>Nº Páginas</th>
        <th>Idioma</th>
        <th>Edição</th>
        <th>Ano de lançamento</th>
        <th>Editora</th>
        <th>Gênero</th>
        <th>Autor</th>
        <th>Ação</th>
    </tr>

    <?php foreach ($books as $row) : ?>
        <tr>
            <td><?= htmlspecialchars($row['titulo']) ?></td>
            <td><?= htmlspecialchars($row['isbn']) ?></td>
            <td><?= htmlspecialchars($row['num_pg']) ?></td>
            <td><?= htmlspecialchars($row['idioma']) ?></td>
            <td><?= htmlspecialchars($row['edicao']) ?></td>
            <td><?= htmlspecialchars($row['ano']) ?></td>
            <td><?= htmlspecialchars($row['editora']) ?></td>
            <td><?= htmlspecialchars($row['genero']) ?></td>
            <td><?= htmlspecialchars($row['autor']) ?></td>
            <td>
                <button class="btn-verde">
                    <a class="btn-verde" href="edit.php?id=<?= $row['id'] ?>">Editar</a>
                </button>

                <?php
                $aux = false;
                if($row['is_emprestado'] == 1){
                    $aux = true;
                }
                if (!$aux) {
                    // Se o livro estiver disponível, exibe o botão de deletar
                    echo '<button class="btn-vermelho"><a class="btn-vermelho" href="delete.php?id=' . $row['id'] . '">Deletar</a></button>';
                } else {
                    // Se o livro estiver emprestado, exibe uma mensagem ou outro conteúdo
                    echo '<button class="btn-vermelho">Este livro está emprestado e não pode ser deletado.</button>';
                }
                ?>

               <!-- <button class="btn-vermelho">
                    <a class="btn-vermelho" href="delete.php?id=<?= $row['id'] ?>">Deletar</a>
                </button> -->
            </td>
        </tr>
    <?php endforeach; ?>

</table>
<?php require_once '../partials/footer.php'; ?>
