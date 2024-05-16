<?php

require_once '../../../config.php';
require_once '../../actions/livro.php';
require_once '../partials/header.php';

$publishers = readPublishersAction($conn);
$genres = readGenresAction($conn);
$authors = readAuthorsAction($conn);


if (isset($_POST["title"]) && isset($_POST["isbn"]) && isset($_POST["pages"]) && isset($_POST["language"]) && isset($_POST["edition"]) && isset($_POST["year"]) && isset($_POST["editora"]) && isset($_POST["genero"]) && isset($_POST["autor"])) {
    createBookAction($conn, $_POST["title"], $_POST["isbn"], $_POST["pages"], $_POST["language"], $_POST["edition"], $_POST["year"], $_POST["editora"], $_POST["genero"], $_POST["autor"]);
}
$books = readBookAction($conn);
?>

<div class="container">
    <h2>Cadastro de Livros</h2>
    <form action="create.php" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="title" required>
        <label for="isbn">ISBN:</label>
        <input type="number" id="isbn" name="isbn" required>
        <label for="paginas">Nº Páginas:</label>
        <input type="number" id="paginas" name="pages" required>
        <label for="idioma">Idioma:</label>
        <input type="text" id="idioma" name="language" required>
        <label for="edicao">Edição:</label>
        <input type="number" id="edicao" name="edition" required>
        <label for="ano">Ano de lançamento:</label>
        <input type="number" id="ano" name="year" required>
        <label for="editora">Editora:</label>
       
       
       
        <select name="editora" id="editora" required>
            <option value="" disabled selected hidden>Selecione uma opção</option>
            <?php
            foreach ($publishers as $publisher) { ?>
                <option value="<?= $publisher['id'] ?>"><?= $publisher['nome'] ?></option>
            <?php
            } ?>
        </select>
       
       
       
        <label for="genero">Gênero:</label>
        <select name="genero" id="genero" required>
        <option value="" disabled selected hidden>Selecione uma opção</option>
            <?php
            foreach ($genres as $genre) { ?>
                <option value="<?= $genre['id'] ?>"><?= $genre['nome'] ?></option>
            <?php
            } ?>
        </select>


        <label for="autor">Autor:</label>
        <select name="autor" id="autor" required>
        <option value="" disabled selected hidden>Selecione uma opção</option>
    <?php
    foreach ($authors as $author) { ?>
        <option value="<?= $author['id'] ?>"><?= $author['nome'] ?></option>
    <?php
    } ?>
</select>
        <input type="submit" value="Cadastrar">
    </form>
</div>  
  
<?php require_once '../partials/footer.php'; ?>