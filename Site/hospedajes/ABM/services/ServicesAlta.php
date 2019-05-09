<?php
require_once ("../../controlador/dbConfig.php");
$imageProperties = getimageSize($_FILES['imagen']['tmp_name']);
$type = $imageProperties['mime'];
$sql = "INSERT INTO hospedaje ( titulo, descripcion, precio, imagenType, cantidadPersonas, cantidadSemanasDisp, tipo, estado) VALUES ('".$_POST['titulo']."','".$_POST['descripcion']."','".$_POST['precio']."','".$type."','".$_POST['cantPersonas']."','".$_POST['semanas']."', 'normal','1')";
$tmpName = $_FILES['imagen']['tmp_name'];
$resultado = mysqli_query($con,$sql);
if($resultado){
  $sql = "SELECT idHospedaje FROM hospedaje WHERE titulo = '".$_POST['titulo']."'";
  $resultado = mysqli_query($con,$sql);
  $rows = mysqli_fetch_assoc($resultado);
  /*En la variable $name tendrian que cambiar mi /opt/lampp/htdocs/
  por c/users/#nombreDeUsuarioEnWindows/wamp/www/#Carpeta donde tengan el proyecto.
  Y una vez que se bajen el repo que subi completo vamos a tener todos lo mismo
  */
  $name="C:/xampp2/htdocs/Grupo7-Final/Grupo7/Site/images/idHospedaje".$rows['idHospedaje'].".".$type;
  fopen($name,"a");
  copy($tmpName,$name);
  $sql = "UPDATE hospedaje SET imagenData = '".$name."' WHERE idHospedaje = ".$rows['idHospedaje'];
  $resultado = mysqli_query($con,$sql);
  if ($resultado){
    header("Location: /Grupo7-Final/Grupo7/Site/hospedajes/Index.php?exito=1");
  }
}
?>
