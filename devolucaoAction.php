<?php

	require_once '../../database/devolucao.php';

    function updateDevolucaoAction($conn, $id_livro, $id, $id_cliente) {
		$updateDevolucaoDb = updateDevolucaoDb($conn, $id_livro, $id, $id_cliente);
		$message = $updateDevolucaoDb == 1 ? 'success-devolucao' : 'error-devolucao';
		return header("Location: ../emprestimo/read.php?message=$message");
	}

