<?php
require_once ("../../controlador/dbConfig.php");
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$sql = "SELECT idHospedaje FROM hospedaje WHERE titulo = '".$titulo."'";
$resultado = mysqli_query($con,$sql);
if ($resultado->num_rows != 0){
  header ("Location: ../Alta.php?error=3");
  die();
}
$titulo = str_replace(' ','',$titulo);
$descripcion = str_replace(' ','',$descripcion);
if ( (strlen($titulo) == 0) || (strlen($descripcion) == 0) ){
  header("Location: ../Alta.php?error=1");
  die();
}
$imageProperties = getimageSize($_FILES['imagen']['tmp_name']);
$checker = $imageProperties[2];
if (!(in_array($checker , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))){
  header("Location: ../Alta.php?error=2");
  die();
}
$type = $imageProperties['mime'];
$type = str_replace('image/', '', $type);
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
  if ( strpos(getcwd(),"opt") === false ){
  $name="C:/xampp2/htdocs/Grupo7-Final/Grupo7/Site/images/idHospedaje".$rows['idHospedaje'].".".$type;
  }
  else{
    $name="/opt/lampp/htdocs/HomeSwitchHome/Grupo7/Site/images/idHospedaje".$rows['idHospedaje'].".".$type;
  }
  fopen($name,"a");
  copy($tmpName,$name);
  $sql = "UPDATE hospedaje SET imagenData = '".$name."' WHERE idHospedaje = ".$rows['idHospedaje'];
  $resultado = mysqli_query($con,$sql);
  if ($resultado){
    if (isset($_POST['semanas'])){
      if ($_POST['semanas'] > 0){
        for ($i=0;$i<$_POST['semanas'];$i++){
          $sql = "INSERT INTO fechasDisponibles (idHospedaje,inicioSemana) VALUES ('".$rows['idHospedaje']."','".$_POST['semana'.$i]."')";
          $resultado = mysqli_query($con,$sql);
        }
      }
    }
    header("Location: ../../Index.php?exito=1");
  }
}
?>
