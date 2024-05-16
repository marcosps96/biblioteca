<?php

function findClientesDb($conn)
{
	$clientes = [];

	$sql = "SELECT * FROM cliente";
	$result = mysqli_query($conn, $sql);

	$result_check = mysqli_num_rows($result);

	if ($result_check > 0)
		$clientes = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $clientes;
}

function findLivrosDisponiveisDb($conn)
{
	$livros = [];

	$sql = "SELECT * FROM livro l where l.is_emprestado = 0 or l.is_emprestado is null";
	$result = mysqli_query($conn, $sql);

	$result_check = mysqli_num_rows($result);

	if ($result_check > 0)
		$livros = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $livros;
}

function findLivrosDb($conn)
{
	$livros = [];

	$sql = "SELECT * FROM livro";
	$result = mysqli_query($conn, $sql);

	$result_check = mysqli_num_rows($result);

	if ($result_check > 0)
		$livros = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $livros;
}

function clienteComEmprestimoDb($conn)
{
	$clientes = [];

	$sql = "SELECT e.id_cliente
	
	FROM emprestimo e";
	$result = mysqli_query($conn, $sql);

	$result_check = mysqli_num_rows($result);

	if ($result_check > 0)
		$clientes = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_close($conn);
	return $clientes;
}

function findEmprestimoDb($conn, $id)
{
	$id = mysqli_real_escape_string($conn, $id);

	$sql = "SELECT e.*,
	l.titulo as titulo

	FROM emprestimo e
	inner join livro l on l.id = e.id_livro
	 WHERE e.id = ?";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql))
		exit('SQL error');

	mysqli_stmt_bind_param($stmt, 'i', $id);
	mysqli_stmt_execute($stmt);

	$emprestimo = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

	mysqli_close($conn);
	return $emprestimo;
}

function createEmprestimoDb($conn, $cliente, $livro,  $dt_devolucao)
{
	$cliente = mysqli_real_escape_string($conn, $cliente);
	$livro = mysqli_real_escape_string($conn, $livro);
	$dt_devolucao = mysqli_real_escape_string($conn, $dt_devolucao);
	$dt_emprestimo = date('Y-m-d');

	if ($cliente && $dt_devolucao && $livro) {
		$sql = "INSERT INTO emprestimo (id_cliente, id_livro, dt_devolucao, dt_emprestimo, multa) VALUES ('$cliente', '$livro', '$dt_devolucao', '$dt_emprestimo', '0.00')";
		$result = mysqli_query($conn, $sql);
		$sql = "UPDATE livro SET is_emprestado= '1' WHERE id = '$livro'";
		$result = mysqli_query($conn, $sql);
		$sql = "UPDATE cliente SET pendencia = '1' WHERE id = '$cliente'";
		$result = mysqli_query($conn, $sql);
		mysqli_close($conn);
		return true;
	}
}


function readEmprestimoDb($conn)
{
	$emprestimos = [];

	$sql = "SELECT *,
	DATE_FORMAT(e.dt_emprestimo,'%d/%m/%Y') as data_emprestimo,
	DATE_FORMAT(e.dt_devolucao,'%d/%m/%Y') as data_devolucao,
	e.id as id,
	l.titulo as livro,
	l.id as id_livro,
	c.nome as cliente,
	c.telefone as telefone,
	l.is_emprestado,
	c.pendencia,
	IF (c.pendencia = 0, IF (l.is_emprestado = 0, 'Devolvido', 'Emprestado'), 
	             IF (l.is_emprestado = 0, 'Devolvido', 'Emprestado')) as situacao
	FROM emprestimo e 
	inner join livro l on l.id = e.id_livro
	inner join cliente c on c.id = e.id_cliente
	order by e.dt_devolucao";
	$result = mysqli_query($conn, $sql);

	$result_check = mysqli_num_rows($result);

	if ($result_check > 0)
		$emprestimos = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_close($conn);
	return $emprestimos;
}

function updateEmprestimoDb($conn, $id, $dt_devolucao)
{
	$dt_devolucao = mysqli_real_escape_string($conn, $dt_devolucao);
	if ($id && $dt_devolucao) {
		$sql = "UPDATE emprestimo SET dt_devolucao = ? WHERE id = ?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'si', $dt_devolucao, $id);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}


function deleteEmprestimoDb($conn, $id)
{
	$id = mysqli_real_escape_string($conn, $id);

	if ($id) {
		$sql = "DELETE FROM emprestimo WHERE id = ?";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		return true;
	}
}
