<?php

if(!empty($_GET['file'])){
	$file_name = basename($_GET['file']);
	$file_path = "../Assets/archivos/contratos".$file_name;

	if(!empty($file_name) && file_exists($file_path)){

		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$file_name");
		header("Content-Type: application/zip");
		header("Content-Transfer-Encoding: binary");

		readfile($file_path);
		exit;

	} 
	else{
		echo "<script> alert('Archivo no encontrado!!!');</script>";
	}

}

?>