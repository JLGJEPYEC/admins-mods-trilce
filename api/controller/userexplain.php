<?php

require_once('../config/conexion.php');
require_once('../models/userexplain.php');

//$pdo = new Conexion();
$users = new UserExplainModel();

try {
	//code...

	//Listar registros y consultar registro
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		if (isset($_GET['dni'])) {


			$datos = $users->getUsersByDNI($_GET['dni']);
			header("HTTP/1.1 200 hay  datos");
			echo json_encode($datos);
			exit;

		} else {

			$datos = $users->getUsers();
			header("HTTP/1.1 200 hay datos");

			echo json_encode($datos);
			exit;
		}
	}

} catch (Exception $e) {
	header("HTTP/1.1 400 Bad Request");
	echo '{"resultado":0,"detalle":"se ha producido  un error"}';
	//throw $th;
}

//Si no corresponde a ninguna opción anterior
/*

*/
?>