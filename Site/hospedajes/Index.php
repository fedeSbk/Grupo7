<!DOCTYPE html>
<html>
  <head>
    <title>Home Switch Home Site</title>
    <!--<link rel="shortcut icon" href="favico.ico"/>-->
    <link type="text/css" rel="stylesheet" href="../style.css" media="all">
    </head>
  <body>
    <div id="contenedor">
      <div id="encabezado">
        <h2>Home Switch Home Sitio - Gestion de Hospedajes</h2>
        <p> Bienvenidos a nuestro sitio online </p>
        <div id="menu">
          <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="login/logIn.php">Iniciar Sesion</a></li>
            <li><a href="login/singIn.php">Registrarse</a></li>
            <li><a href="ABM/Alta.php">Alta Hospedajes</a></li>
          </ul>
        </div>
      </div>
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
            <label>El hospedaje se agrego con <strong>éxito</strong></label>
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
                <td></td>
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
