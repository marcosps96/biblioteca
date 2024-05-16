<?php

require_once '../../database/emprestimo.php';

function readClientesAction($conn){
	return findClientesDb($conn);
	}

function readLivrosAction($conn){
	return findLivrosDb($conn);
}

function readLivrosDisponiveisAction($conn){
	return findLivrosDisponiveisDb($conn);
}

function findEmprestimoAction($conn, $id) {
	return findEmprestimoDb($conn, $id);
}

function readEmprestimoAction($conn)
{
	return readEmprestimoDb($conn);
}

function clienteComEmprestimoAction($conn)
{
	return clienteComEmprestimoDb($conn);
}


function createEmprestimoAction($conn, $cliente, $livro, $dt_devolucao)
{
	$createEmprestimoDb = createEmprestimoDb($conn, $cliente, $livro,  $dt_devolucao);
	$message = $createEmprestimoDb == 1 ? 'success-create' : 'error-create';
	return header("Location: ./read.php?message=$message");
}

function updateEmprestimoAction($conn, $id, $dt_devolucao)
{
	$updateEmprestimoDb = updateEmprestimoDb($conn, $id,  $dt_devolucao);
	$message = $updateEmprestimoDb == 1 ? 'success-update' : 'error-update';
	return header("Location: ./read.php?message=$message");
}

function deleteEmprestimoAction($conn, $id)
{
	$deleteEmprestimoDb = deleteEmprestimoDb($conn, $id);
	$message = $deleteEmprestimoDb == 1 ? 'success-remove' : 'error-remove';
	return header("Location: ./read.php?message=$message");
}
