<?php

	require_once("conexion/database.php");

	$db = new Database();
	$alerta = "";

	if(isset($_POST['alerta']))
	{
		$estado = $_POST'alerta'];
	}

	$data = array();

	if (empty($estado))
	{
		$statement = $db->conexion->prepare("SELECT * FROM Alerta WHERE id = ?");
		$values = array($alerta);
		$statement->execute($values);
		$data = $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	header("application/json");
	echo json_encode($data);
?>