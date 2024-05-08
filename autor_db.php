<?php

//Essa função busca um autor pelo ID na tabela autor
function findAutorDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id); //Escapa o ID para evitar injeção de SQL

	$sql = "SELECT * FROM autor WHERE id = ?"; //Define a consulta SQL para selecionar um autor com base no ID.
	$stmt = mysqli_stmt_init($conn); //Inicializa uma declaração preparada.

	if(!mysqli_stmt_prepare($stmt, $sql)) //Verifica se a declaração preparada foi bem-sucedida.
		exit('SQL error'); //Sai do script com uma mensagem de erro se a preparação da declaração falhar.

	mysqli_stmt_bind_param($stmt, 'i', $id); //Liga o parâmetro à declaração preparada.
	mysqli_stmt_execute($stmt); //Executa a declaração preparada.
	
	$author = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)); //Obtém o resultado da consulta como um array associativo.

	mysqli_close($conn); //Fecha a conexão com o banco de dados.
	return $author; //Retorna o autor encontrado.
}

function createAuthorDb($conn, $name) {
	$name = mysqli_real_escape_string($conn, $name);

	if($name) { // Verifica se o nome não está vazio.
		$sql = "INSERT INTO autor (nome) VALUES (?)"; //Define a consulta SQL para inserir um novo autor com o nome fornecido
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)) 
			exit('SQL error');
		
		mysqli_stmt_bind_param($stmt, 's', $name);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function readAuthorDb($conn) {
    $authors = [];

	$sql = "SELECT * FROM autor";
	$result = mysqli_query($conn, $sql);

	$result_check = mysqli_num_rows($result);
	
	if($result_check > 0)
		$authors = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_close($conn);
	return $authors;
}

function updateAuthorDb($conn, $id, $name) {
    if($id && $name) {
		$sql = "UPDATE autor SET nome = ? WHERE id = ?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'si', $name, $id);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function deleteAuthorDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

	if($id) {
		$sql = "DELETE FROM autor WHERE id = ?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		return true;
	}
}
