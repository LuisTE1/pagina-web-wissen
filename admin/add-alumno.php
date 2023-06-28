<?php
include("conexion.php");
//Armamos el query para seleccionar los cursos
$query = "SELECT * FROM cursos";

//Ejecutamos la consulta
$resultado_cursos = mysqli_query($conn, $query);
/******************************************************/
/******************************************************* */
//GUARDAMOS AL ALUMNO   
if (isset($_POST['agregar'])) {
    //nos conectamos a la base de datos
    include("conexion.php");

    //tomamos los datos que vienen del formulario
    $nombre_alumno = $_POST['nombre_alumno'];   
    $informacion_alumno = $_POST['informacion_alumno'];
    $genero = $_POST['genero'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $dni = $_POST['dni'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $url_foto_principal = "url";
    $curso = $_POST['curso'];
    $precio = $_POST['precio'];
    $horario = $_POST['horario'];
    $dia_clases = $_POST['dia_clases'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $forma_pago = $_POST['forma_pago'];
    $numero_cuotas = $_POST['numero_cuotas'];
    $fecha_pago = $_POST['fecha_pago'];

    //armamos el query para insertar en la tabla propiedades
    $query = "INSERT INTO alumons
     (id, fecha_alta, nombre_alumno, informacion_alumno, genero, fecha_nacimiento, dni,
     direccion, correo, telefono, url_foto_principal, curso,
     precio, horario, dia_clases,fecha_inicio,fecha_fin,forma_pago,numero_cuotas,fecha_pago)
    VALUES 
    (NULL,CURRENT_TIMESTAMP, '$nombre_alumno', '$informacion_alumno','$genero','$fecha_nacimiento',
    '$dni','$direccion','$correo','$telefono', '',
     '$curso','$precio','$horario','$dia_clases','$fecha_inicio','$fecha_fin','$forma_pago','$numero_cuotas',
     '$fecha_pago')";

     //insertamos en la tabla alumno
    if (mysqli_query($conn, $query)) { //Se insertó correctamente
        include("procesar-foto-principal.php");
        $mensaje = "El curso se inserto correctamente";
    } else {
        $mensaje = "No se pudo insertar en la BD" . mysqli_error($conn);
    }
}


/******************************************************* */


?>



<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WISSENLP - Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilo.css">
    
</head>

<body>
    <?php include("header.php"); ?>

    <div id="contenedor-admin">
        <?php include("contenedor-menu.php"); ?>
     
        <div class="contenedor-principal">
            <div id="nueva-propiedad">
                <h2>Nuevo Alumno</h2>
                <hr>

                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
                    <div class="fila-una-columna">
                        <label for="nombre_alumno">Nombre del Alumno</label>
                        <input type="text" name="nombre_alumno" required class="input-entrada-texto">
                    </div>

                    <div class="fila-una-colummna">
                        <label for="informacion_alumno">Informacion adicional del alumno</label>
                        <textarea name="informacion_alumno" id="" cols="30" rows="10" class="input-entrada-texto"></textarea>
                    </div>

                    <div class="fila">
                        <div class="box">
                            <label for="genero">Genero</label>
                            <select name="genero" id="" class="input-entrada-texto">
                                <option >--------</option>
                                <option value="Maculino">Maculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>

                        <div class="box">
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <input type="text" name="fecha_nacimiento" class="input-entrada-texto">
                        </div>

                        <div class="box">
                            <label for="dni">DNI</label>
                            <input type="text" name="dni" class="input-entrada-texto">
                        </div>
                    </div>

                    <div class="fila">
                        

                        <div class="box">
                            <label for="direccion">Direccion</label>
                            <input type="text" name="direccion" class="input-entrada-texto">
                        </div>

                        <div class="box">
                            <label for="correo">Correo</label>
                            <input type="text" name="correo" class="input-entrada-texto">
                        </div>
                        <div class="box">
                            <label for="telefono">Telefono</label>
                            <input type="text" name="telefono" class="input-entrada-texto">
                        </div>
                    </div>

                  


                    <div>
                        <h2>Foto del alumno</h2>

                        <label for="foto1" class="btn-fotos"> Subir Foto</label>
                        <output id="list" class="contenedor-foto-principal">
                            <img src="<?php echo $alumno['url_foto_principal'] ?>" alt="">
                        </output>
                        <input type="file" id="foto1" accept="image/*" name="foto1" style="display:none">
                    </div>

                    
                    <hr>
                    <?php
                    include("conexion.php");

                    // Armamos el query para seleccionar los cursos con su precio
                    $query = "SELECT * FROM cursos";
                    $resultado_cursos = mysqli_query($conn, $query);

                    ?>  
                    <h2>Asignacion de Curso</h2>
                    <div class="fila">
                        <div class="box">
                            <label for="curso">Seleccione Un Curso</label>
                            <input type="text" name="curso" class="input-entrada-texto">
                            
                        </div>
                        <div class="box">
                            <label for="precio">Precio</label>
                            <input type="text" name="precio" class="input-entrada-texto">
                        </div>

      
                        <div class="box">
                            <label for="horario">Horario</label>
                            <input type="text" name="horario" class="input-entrada-texto">
                        </div>

                    </div>

                    <div class="fila">
                        <div class="box">
                            <label for="dia_clases">Dias de Clases</label>
                            <input type="text" name="dia_clases" class="input-entrada-texto">
                        </div>
                        <div class="box">
                            <label for="fecha_inicio">Fecha de Inicio</label>
                            <input type="text" name="fecha_inicio" class="input-entrada-texto">
                        </div>
                        <div class="box">
                            <label for="fecha_fin">Fecha de Fin</label>
                            <input type="text" name="fecha_fin" class="input-entrada-texto">
                        </div>
                    </div>
            
                    <div class="fila">
                        <div class="box">
                            <label for="forma_pago">Forma de pago</label>
                            <select name="forma_pago" id="" class="input-entrada-texto">
                                <option >--------</option>
                                <option value="Contado">Contado</option>
                                <option value="Cuotas">Cuotas</option>
                            </select>
                        </div>
                        <div class="box">
                            <label for="numero_cuotas">Numero de Cuotas</label>
                            <input type="text" name="numero_cuotas" class="input-entrada-texto">
                        </div>
                        <div class="box">
                            <label for="fecha_pago">Fecha de Pago</label>
                            <input type="text" name="fecha_pago" class="input-entrada-texto">
                        </div>
                    </div>
                   
                    <hr>
                    <input type="submit" value="Agregar Alumno" name="agregar" class="btn-accion">

                </form>

            </div>
        </div>
    </div>

    <?php if (isset($_POST['agregar'])) : ?>
        <script>
            
            window.location.href = 'listado-alumno.php';
        </script>
    <?php endif ?>

    <script>
    $(document).ready(function() {
        $('#link-add-alumno').addClass('pagina-activa');
    });
</script>
    <script src="subirfoto.js"></script>
    
</body>

</html>