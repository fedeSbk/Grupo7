<!DOCTYPE html>
<html>
  <head>
    <link rel="apple-touch-icon" sizes="180x180" href="../Logos/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../Logos/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Logos/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="../Logos/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

    <title>Home Switch Home Site</title>
    <!--<link rel="shortcut icon" href="favico.ico"/>-->
    <link type="text/css" rel="stylesheet" href="../style.css" media="all">



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
      <a class="navbar-brand" href="../index.php"><img class="logo" title="Home Switch Home" alt="Home Switch Home" src="../Logos/HSH-Complete.svg" width="200px"></a>
            <a href="ABM/Alta.php">Alta Hospedajes</a>
            <a class="btn btn-primary" href="#">Sesion</a>
        </div>
      </nav>
      <div id="condenido">
        <h1 class="mb-5">Listado de Hospedajes</h1>
        <table class="table table">
         <thead>
           <tr>
               <th scope="col">Id</th>
               <th scope="col">Imagen</th>
               <th scope="col">Titulo</th>
               <th scope="col">Precio</th>
               <th scope="col"></th>
               <th scope="col"></th>
           </tr>
         </thead>
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
                <td class="table-primary"><?php echo $rows['idHospedaje'];?></td>
                <td class="table-primary"><?php echo '<img src="..'.$name.'" alt="Imagen'.$rows['titulo'].'" width="150" height="150" />';?></td>
                <td class="table-primary"><?php echo $rows['titulo'];?></td>
                <td class="table-primary"><?php echo $rows['precio'];?></td>
                <td class="table-primary"><a class="btn btn-info" href="#">Ver Detalles</a></td>
                <td class="table-primary"><a class="btn btn-danger" href='ABM/services/ServicesBaja.php?id=<?php echo $rows['idHospedaje'];?>'>Eliminar</a></td>
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
