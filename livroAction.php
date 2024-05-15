<?php

	require_once '../../database/livro.php';

	function readPublishersAction($conn){
		return findPublisherDb($conn);
	}

	function readGenresAction($conn){
		return findGenreDb($conn);
	}

	function findId_GenreAction($conn) {
		return findId_GenreDb($conn);
	}

	function findId_AuthorAction($conn) {
		return findId_AuthorDb($conn);
	}

	function readAuthorsAction($conn){
		return findAuthorDb($conn);
	}

	function findBookAction($conn, $id) {
		return findBookDb($conn, $id);
	}

	function findId_PublisherAction($conn) {
		return findId_PublisherDb($conn);
	}

	function readBookAction($conn) {
		return readBookDb($conn);
	}

	function readBorrowedBookAction($conn) {
		return readBorrowedBookDb($conn);
	}

	function createBookAction($conn, $title, $isbn, $pages, $language, $edition, $year, $editora, $genero, $autor) {
		$createBookDb = createBookDb($conn, $title, $isbn, $pages, $language, $edition, $year, $editora, $genero, $autor);
		$message = $createBookDb == 1 ? 'success-create' : 'error-create';
		return header("Location: ./read.php?message=$message");
	}

	function updateBookAction($conn, $id, $title, $isbn, $pages, $language, $edition, $year, $editora, $genero, $autor) {
		$updateBookDb = updateBookDb($conn, $id, $title, $isbn, $pages, $language, $edition, $year, $editora, $genero, $autor);
		$message = $updateBookDb == 1 ? 'success-update' : 'error-update';
		return header("Location: ./read.php?message=$message");
	}

	function deleteBookAction($conn, $id) {
		$deleteBookDb = deleteBookDb($conn, $id);
		$message = $deleteBookDb == 1 ? 'success-remove' : 'error-remove';
		return header("Location: ./read.php?message=$message");
	}
