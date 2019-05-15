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



<link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="../css/landing-page.min.css" rel="stylesheet">
    </head>
  <body>
      <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="../../index.php"><img class="logo" title="Home Switch Home" alt="Home Switch Home" src="../../Logos/HSH-Complete.svg" width="200px"></a>
            <a class="btn btn-primary" href="#">Sesion</a>
        </div>
      <div id="condenido">
        <a href="../Index.php" class="btn btn-info btn-md">
          <span class="glyphicon glyphicon-chevron-left"></span> Volver al Listado
        </a>
        <h2> Nuevo Hospedaje </h2>
        <?php if(isset($_GET['error']))
{
  switch ($_GET['error']) {
    case 1:
    ?>
    <script type="text/javascript">
    alert('No puede ingresar campos vacios!');
    </script>
    <?php
      break;
    case 2:
    ?>
    <script type="text/javascript">
    alert('Debe ingresar imagen (formato .JPG, .PNG, .SVG, .JPEG)');
    </script>
    <?php
      break;

    case 3:
    ?>
    <script type="text/javascript">
    alert('Ya existe un hospedaje con el mismo nombre, por favor escoja otro');
    </script>
    <?php
      break;
}
}
?>
        <form enctype="multipart/form-data" action="services/ServicesAlta.php" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="titulo">Ingrese Titulo</label>
              <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" required>
              <label for="cantidad">Ingrese Cantidad de Personas</label>
              <input type="number" class="form-control" id="cantidad" name="cantPersonas" placeholder="Cantidad de Personas" required>
            </div>
            <div class="form-group col-md-6">
              <label for="descripcion">Ingrese Descripcion</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="4" cols="50" required></textarea>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="imagen" name="imagen" required>
              <label class="custom-file-label" for="customFile">Seleccione Imagen</label>
            </div>
            <div class="form-group col-md-6">
              <label for="descripcion">Ingrese Cantidad de Semanas (Opcional)</label>
              <input type="number" class="form-control" id="semanas" name="semanas" placeholder="Cantidad de Semanas">
              <button type="button" class="btn btn-warning">Agregar Semanas</button>
            </div>
            <div id="sem" class"form-group col-md-6"></div>
            <script >
                const button = document.querySelector("button");
                const semanas = document.getElementById("semanas");
                button.addEventListener('click', agregarSemanas);
                function agregarSemanas() {
                  document.getElementById("sem").innerHTML="";
                  var i;
                  for (i=0;i<semanas.value;i++){
                     document.getElementById("sem").innerHTML += '<br /> Ingrese Inicio de semana: <input type="date" name="semana'+i+'" required />';
                  }
                }
            </script>
            <div class="custom-file">
              <input type="submit" class="btn btn-success" value="Agregar Hospedaje">
          </div>
        </div>
        </form>
      <div id="pie">
        <p> Desarrollado por <strong>FAA</strong> - 2019 - copyrigth</p>
      </div>
    </div>
  </body>
</html>
