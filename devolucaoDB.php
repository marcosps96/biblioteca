<?php

function updateDevolucaoDb($conn, $id_livro, $id, $id_cliente) {
	if($id_livro && $id){
        $sql = "UPDATE livro l SET l.is_emprestado = '0' WHERE l.id = '$id_livro'";
		$result = mysqli_query($conn, $sql);
		$dt_devolucao = date('Y-m-d');
		$sql = "UPDATE emprestimo e SET e.dt_devolucao = '$dt_devolucao' WHERE e.id = '$id'";
		$result = mysqli_query($conn, $sql);
		$sql = "UPDATE cliente c SET c.pendencia = '0' WHERE c.id = '$id_cliente'";
		$result = mysqli_query($conn, $sql);
		mysqli_close($conn);
		return true;
    }
}
