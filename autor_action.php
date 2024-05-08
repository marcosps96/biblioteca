<?php

	require_once '../../database/autor.php';

	//Função responsável por buscar nosso autor no banco de dados através da função 'findAuthorDb'
	function findAuthorAction($conn, $id) {
		return findAutorDb($conn, $id);
	}

	//Função que busca nossos cadastros através da função 'readAuthorDb'
	function readAuthorAction($conn) {
		return readAuthorDb($conn);
	}

	# Funções responsáveis por criar (createUserAction), atualizar (updateUserAction) e remover (deleteUserAction) nossos cadastros
	# cada uma recebe seus respectivos parâmetros (conexão e atributos do cadastro) e os repassa para as funções do arquivo '/src/database/db.php' 
	# de acordo com o resultado redireciona o usuário para a page 'src/pages/author/read.php' passando como parâmetro a variável GET message
	# que guarda nossa mensagem de sucesso ou erro
	function createAuthorAction($conn, $name) {
		$createAuthorDb = createAuthorDb($conn, $name);
		$message = $createAuthorDb == 1 ? 'success-create' : 'error-create';
		return header("Location: ./read.php?message=$message");
	}

	function updateAuthorAction($conn, $id, $name) {
		$updateAuthorDb = updateAuthorDb($conn, $id, $name);
		$message = $updateAuthorDb == 1 ? 'success-update' : 'error-update';
		return header("Location: ./read.php?message=$message");
	}

	function deleteAuthorAction($conn, $id) {
		$deleteAuthorDb = deleteAuthorDb($conn, $id);
		$message = $deleteAuthorDb == 1 ? 'success-remove' : 'error-remove';
		return header("Location: ./read.php?message=$message");
	}
