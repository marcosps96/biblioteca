<!DOCTYPE html>
<html lang="pt">

<?php
require_once '../partials/header.php';
require_once '../../../config.php';
require_once '../../actions/livro.php';
require_once '../../../src/modules/messages.php';

$books = readBorrowedBookAction($conn);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Empréstimo de Livros</title>
    <?php $key = uniqid(md5(rand())) ?>
    <link rel="stylesheet" href="../../css/styles.css?key=
    <?php echo $key ?>">
</head>

<body>
<h2>Lista de Livros Emprestados</h2>
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
        </tr>
    <?php endforeach; ?>

</table>
</body>

<?php require_once '../partials/footer.php'; ?>
