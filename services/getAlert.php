<?php

	

	//$db = new PDO('mysql:host=localhost;dbname=ambermx', 'root', 'root',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$db = new PDO('mysql:host=mysql.1freehosting.com;dbname=u148390976_amber', 'u148390976_amusr', 'gohe1106',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$alerta = "";

	if(isset($_POST['id']))
	{
		$alerta = $_POST['id'];
	}

	$data = array();

	if (!empty($alerta))
	{
		$statement = $db->prepare("SELECT * FROM Alerta WHERE id = ?");
		$values = array($alerta);
		$statement->execute($values);
		$data = $statement->fetchAll(PDO::FETCH_ASSOC);
		if (!empty($data))
		{
			$data = $data[0];
		}
	}
	header("access-control-allow-origin: *");
	header("application/json");
	echo json_encode($data);
?>