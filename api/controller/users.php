<?php

require_once('../config/conexion.php');
require_once('../models/users.php');

//$pdo = new Conexion();
$users = new UserModel();

try {
	//code...

	//Listar registros y consultar registro
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		if (isset($_GET['id'])) {
			$datos = $users->getUsersByDNI($_GET['id']);
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



	//Insertar registro
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$dniPost = $users->insertUser(
			$_POST['personal_dni'], $_POST['pass'],
			$_POST['email_generado'], $_POST['personal_admin_mod']
		);


		header("HTTP/1.1 200 Ok");
		//echo json_encode($dniPost);
		echo '{"resultado":1,"detalle":"usuario registrado"}';
		exit;
	}


	//Actualizar registro
	if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
		$dniUpdate = $users->updateUser(
			$_GET['id'], $_GET['personal_dni'],
			$_GET['pass'], $_GET['email_generado'],
			$_GET['personal_admin_mod']
		);
		header("HTTP/1.1 200 Ok");
		echo '{"resultado":1,"detalle":"datos cambiados exitosamente"}';
		exit;
	}



	//Eliminar registro
	if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

		$dniDelete = $users->deleteUser($_GET['id']);
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