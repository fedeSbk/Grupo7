<?php
require_once ("../../controlador/dbConfig.php");
if (isset($_GET['id'])){
	$sql='DELETE FROM hospedaje WHERE idHospedaje='.$_GET['id'];
	$resultado = mysqli_query($con,$sql);
	if ($resultado){
		    header("Location: /Grupo7-Final/Grupo7/Site/hospedajes/Index.php?delete=1");
	}
}
?>