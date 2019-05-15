<?php
require_once ("../../controlador/dbConfig.php");
if (isset($_GET['id'])){
	$sql="DELETE FROM fechasDisponibles WHERE idHospedaje=".$_GET['id'];
	$resultado = mysqli_query($con,$sql);
	$sql='DELETE FROM hospedaje WHERE idHospedaje='.$_GET['id'];
	$resultado = mysqli_query($con,$sql);
	if ($resultado){
		    header("Location: ../../Index.php?delete=1");
	}
}
?>
