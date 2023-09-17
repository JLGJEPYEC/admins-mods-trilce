<?php

require_once('../config/conexion.php');
require_once('../models/sede.php');

//$pdo = new Conexion();
$sede = new sedeModel();

try {
	//code...

	//Listar registros y consultar registro
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		if (isset($_GET['id'])) {
			$datos = $sede->getSedeByID($_GET['id']);
			header("HTTP/1.1 200 hay  datos");
			echo json_encode($datos);
			exit;

		} else {

			$datos = $sede->getsede();
			header("HTTP/1.1 200 hay datos");

			echo json_encode($datos);
			exit;
		}
	}



	//Insertar registro
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$dniPost = $sede->insertSede(
			$_POST['nombre_sede'], $_POST['direccion'],
			$_POST['distrito']
		);


		header("HTTP/1.1 200 Ok");
		//echo json_encode($dniPost);
		echo '{"resultado":1,"detalle":"usuario registrado"}';
		exit;
	}


	//Actualizar registro
	if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
		$dniUpdate = $sede->updateSede(
			$_GET['id'], $_GET['nombre_sede'],
			$_GET['direccion'], $_GET['distrito'],
		);
		header("HTTP/1.1 200 Ok");
		echo '{"resultado":1,"detalle":"datos cambiados exitosamente"}';
		exit;
	}



	//Eliminar registro
	if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

		$dniDelete = $sede->deleteSede($_GET['id']);
		header("HTTP/1.1 200 Ok");
		echo '{"resultado":1,"detalle":"usuario eliminado"}';
		exit;


	}

} catch (Exception $e) {
	header("HTTP/1.1 400 Bad Request");
	//echo '{"resultado":0,"detalle":"se ha producido  un error"}';
	echo ($e);
	
	//throw $th;
}

//Si no corresponde a ninguna opción anterior
/*

*/
?>