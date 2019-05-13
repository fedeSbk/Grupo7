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
            <a class="navbar-brand" href="../../index.php">Home Switch Home Site</a>
            <a href="../../index.php">Home</a>
            <a href="../Index.php">Atras</a>
            <a class="btn btn-primary" href="#">Sesion</a>
          
        </div>
      <div id="condenido">
        <h2> Nuevo Hospedaje </h2>
        <form enctype="multipart/form-data" action="services/ServicesAlta.php" method="post">
            Ingrese Titulo
            <br />
            <input type="text" name="titulo" <?php if (isset($_POST['titulo'])){echo "value='".$_POST['titulo']."'";};?> required />
            <br />
            Ingrese descripcion
            <br />
            <textarea rows="4" cols="50" name="descripcion" required><?php if (isset($_POST['titulo'])){echo $_POST['descripcion'];};?></textarea>
            <br />
            Ingrese precio
            <br />
            <input type="text" name="precio" <?php if (isset($_POST['precio'])){echo "value='".$_POST['precio']."'";};?> required />
            <br />
            Ingrese Imagen (opcional):
            <br />
            <input type="file" name="imagen"/>
            <br />
            Ingrese cantidad de Personas:
            <br />
            <input type="text" name="cantPersonas" <?php if (isset($_POST['cantPersonas'])){echo "value='".$_POST['cantPersonas']."'";};?> required />
            <br />
            Ingrese Fecha de Inicio de Subasta (opcional):
            <br />
            <input type="date" name="fechaSubasta" <?php if (isset($_POST['fechaSubasta'])){echo "value='".$_POST['fechaSubasta']."'";};?> />
            <br />
            Ingrese cantidad de semanas disponibles (opcional): <input type="number" id="semanas" name="semanas" <?php if (isset($_POST['titulo'])){echo "value='".$_POST['semanas']."'";};?> />
            <button type="button" class="Semanas">Agregar Semanas</button>
            <div id="sem"></div>
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
          <input type="submit" value="Terminar">
        </form>
      </div>
      <div id="pie">
        <p> Desarrollado por <strong>FAA</strong> - 2019 - copyrigth</p>
      </div>
    </div>
  </body>
</html>
