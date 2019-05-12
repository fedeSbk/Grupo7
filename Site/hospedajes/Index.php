<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

    <title>Home Switch Home Site</title>
    <!--<link rel="shortcut icon" href="favico.ico"/>-->
    <!--<link type="text/css" rel="stylesheet" href="style.css" media="all"> -->



<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="../css/landing-page.min.css" rel="stylesheet">


    </head>
  <body>
    <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
            <a class="navbar-brand" href="../">Home Switch Home Site</a>
            <a href="../index.php">Home</a>
            <a href="ABM/Alta.php">Alta Hospedajes</a>
            <a class="btn btn-primary" href="#">Sesion</a>
        </div>
      </nav>



      <div id="condenido">
        <h2> Listado de Hospedajes </h2>
        <table border="1">
          <tr>
              <th>Id</th>
              <th>Imagen</th>
              <th>Titulo</th>
              <th>Precio</th>
              <th>Ver Detalles</th>
              <th>Eliminar</th>
          </tr>
          <?php
          if  (isset($_GET['exito'])){
          ?> <div id="exito">
            <label>El hospedaje se AGREGO con <strong>éxito</strong></label>
            </div> <?php
          }
          if  (isset($_GET['delete'])){
          ?> <div id="delete">
            <label>El hospedaje se ELIMINO con <strong>éxito</strong></label>
            </div> <?php
          }
          require_once("controlador/dbConfig.php");
          $sql = "SELECT * FROM hospedaje";
          $resultado = mysqli_query($con,$sql);
          while ($rows = mysqli_fetch_array($resultado)){
            if (strpos($rows['imagenData'],'opt')!== false){
            $name=str_replace('/opt/lampp/htdocs/HomeSwitchHome/Grupo7/Site','',$rows['imagenData']);  
            }
            else{
            $name=str_replace('C:/xampp2/htdocs/Grupo7-Final/Grupo7/Site','',$rows['imagenData']);
             }
              ?>
              <tr>
                <td><?php echo $rows['idHospedaje'];?></td>
                <td><?php echo '<img src="..'.$name.'" alt="Imagen'.$rows['titulo'].'" width="150" height="150" />';?></td>
                <td><?php echo $rows['titulo'];?></td>
                <td><?php echo $rows['precio'];?></td>
                <td><?php echo $rows['descripcion'];?></td>
                <td><a href='ABM/services/ServicesBaja.php?id=<?php echo $rows['idHospedaje'];?>'>Eliminar</a></td>
              </tr>
          <?php
          }
           ?>
       </table>
      </div>
      <div id="pie">
        <p> Desarrollado por <strong>FAA</strong> - 2019 - copyrigth</p>
      </div>
    </div>
  </body>
</html>
