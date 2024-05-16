<?php

require_once '../../../config.php';
require_once '../../actions/livro.php';
require_once '../partials/header.php';

$publishers = readPublishersAction($conn);
$genres = readGenresAction($conn);
$authors = readAuthorsAction($conn);


if (isset($_POST["title"]) && isset($_POST["isbn"]) && isset($_POST["pages"]) && isset($_POST["language"]) && isset($_POST["edition"]) && isset($_POST["year"]) && isset($_POST["editora"]) && isset($_POST["genero"]) && isset($_POST["autor"]))
    updateBookAction($conn, $_POST["id"], $_POST["title"], $_POST["isbn"], $_POST["pages"], $_POST["language"], $_POST["edition"], $_POST["year"], $_POST["editora"], $_POST["genero"], $_POST["autor"]);

$book = findBookAction($conn, $_GET['id']);
?>

<div class="container">
<h2>Editar Livro</h2>
<form action="../../pages/livro/edit.php" method="POST" autocomplete="on">
<input type="hidden" name="id" value="<?= $book['id'] ?>" required />
<label for="titulo">Título:</label>
<input type="text" id="titulo" name="title" value="<?=htmlspecialchars($book['titulo'])?>" required>
<label for="isbn">ISBN:</label>
<input type="number" id="isbn" name="isbn" value="<?=htmlspecialchars($book['isbn'])?>" required>
<label for="paginas">Nº Páginas:</label>
<input type="number" id="paginas" name="pages" value="<?=htmlspecialchars($book['paginas'])?>" required>
<label for="idioma">Idioma:</label>
<input type="text" id="idioma" name="language" value="<?=htmlspecialchars($book['idioma'])?>" required>
<label for="edicao">Edição:</label>
<input type="number" id="edicao" name="edition" value="<?=htmlspecialchars($book['edicao'])?>" required>
<label for="ano">Ano Lançamento:</label>
<input type="number" id="ano" name="year" value="<?=htmlspecialchars($book['ano'])?>" required>
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
        <label for="autor">Autor</label> <br>
        <select name="autor" id="autor" required>
        <option value="" disabled selected hidden>Selecione uma opção</option>
            <?php
            foreach ($authors as $author) { ?>
                <option value="<?= $author['id'] ?>"><?= $author['nome'] ?></option>
            <?php
            } ?>
        </select>   
<button class="btn-verde" type="submit">
            Salvar
        </button>
    </form>
</div>
          
       

    </form>
</div>

<?php require_once '../partials/footer.php'; ?>