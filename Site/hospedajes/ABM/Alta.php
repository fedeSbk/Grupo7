<!DOCTYPE html>
<html>
  <head>
    <title>Home Switch Home Site</title>
    <!--<link rel="shortcut icon" href="favico.ico"/>-->
    <link type="text/css" rel="stylesheet" href="../../style.css" media="all">
    </head>
  <body>
    <div id="contenedor">
      <div id="encabezado">
        <h2>Home Switch Home Site - Gestion de Hospedajes - Alta Hospedajes</h2>
        <p> Bienvenidos a nuestro sitio online </p>
        <div id="menu">
          <ul>
            <li><a href="../../index.php">Home</a></li>
            <li><a href="login/logIn.php">Iniciar Sesion</a></li>
            <li><a href="login/singIn.php">Registrarse</a></li>
            <li><a href="../Index.php">Atras</a></li>
          </ul>
        </div>
      </div>
      <div id="condenido">
        <h2> Nuevo Hospedaje </h2>
        <form action="services/ServicesAlta.php" method="post">
            Ingrese Titulo:<input type="text" name="titulo" <?php if (isset($_POST['titulo'])){echo "value='".$_POST['titulo']."'";};?> required />
            <br />
            Ingrese Imagen Principal (Luego podra agregar la galeria de imagenes del hospedaje o dejarlo en blanco):<input type="file" name="imagen"/>
            <br />
            Ingrese descripcion:
            <br />
            <textarea rows="4" cols="50" name="descripcion" required><?php if (isset($_POST['titulo'])){echo $_POST['descripcion'];};?></textarea>
            <br />
            Ingrese cantidad de semanas disponibles: <input type="number" id="semanas" name="semanas" <?php if (isset($_POST['titulo'])){echo "value='".$_POST['semanas']."'";};?> required />
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
