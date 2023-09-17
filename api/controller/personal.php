<?php

require_once('../config/conexion.php');
require_once('../models/personal.php');

//$pdo = new Conexion();
$personal = new PersonalModel();

try {
	//code...

	//Listar registros y consultar registro
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		if (isset($_GET['dni'])) {
			$datos = $personal->getPersonalByDNI($_GET['dni']);
			header("HTTP/1.1 200 hay  datos");
			echo json_encode($datos);
			exit;

		} else {

			$datos = $personal->getPersonal();
			header("HTTP/1.1 200 hay datos");

			echo json_encode($datos);
			exit;
		}
	}



	//Insertar registro
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(!empty($_POST['admin_mod'])){
            $is_admin_or_mod = $_POST['admin_mod'];
		    $personalPost = $personal->insertPersonalWithAM(
			$_POST['dni'], $_POST['nombre'],
			$_POST['appaterno'], $_POST['apmaterno'],
            $_POST['email_personal'], $_POST['telefono'],
			$_POST['tipo_personal'], $is_admin_or_mod,
            $_POST['sueldo'], $_POST['banco'],
			$_POST['distrito_res']);
        }else {
            $personalPost = $personal->insertPersonalWithoutAM(
                $_POST['dni'], $_POST['nombre'],
                $_POST['appaterno'], $_POST['apmaterno'],
                $_POST['email_personal'], $_POST['telefono'],
                $_POST['tipo_personal'],
                $_POST['sueldo'], $_POST['banco'],
                $_POST['distrito_res']);

        }
		header("HTTP/1.1 200 Ok");
		//echo json_encode($personalPost);
		echo '{"resultado":1,"detalle":"usuario registrado"}';
		exit;
	}


	//Actualizar registro
	if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        if(!empty($_GET['admin_mod'])){
            $is_admin_or_mod = $_GET['admin_mod'];
            $personalUpdate = $personal->updatePersonalwithAM(
                $_GET['dni'], $_GET['nombre'],
                $_GET['appaterno'], $_GET['apmaterno'],
                $_GET['email_personal'], $_GET['telefono'],
                $_GET['tipo_personal'], $is_admin_or_mod,
                $_GET['sueldo'], $_GET['banco'],
                $_GET['distrito_res']);
        }else{
            $personalUpdate = $personal->updatePersonalwithoutAM(
                $_GET['dni'], $_GET['nombre'],
                $_GET['appaterno'], $_GET['apmaterno'],
                $_GET['email_personal'], $_GET['telefono'],
                $_GET['tipo_personal'],
                $_GET['sueldo'], $_GET['banco'],
                $_GET['distrito_res']);
        }
		header("HTTP/1.1 200 Ok");
		echo '{"resultado":1,"detalle":"datos cambiados exitosamente"}';
		exit;
	}



	//Eliminar registro
	if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

		$dniDelete = $personal->deletePersonal($_GET['dni']);
		header("HTTP/1.1 200 Ok");
		echo '{"resultado":1,"detalle":"usuario eliminado"}';
		exit;


	}

} catch (Exception $e) {
	header("HTTP/1.1 400 Bad Request");
	echo '{"resultado":0,"detalle":"se ha producido  un error"}';
    echo($e);
	//throw $th;
}

//Si no corresponde a ninguna opción anterior
/*

*/
?>