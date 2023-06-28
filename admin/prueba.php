<?php
session_start();

if (!$_SESSION['usuarioLogeado']) {
    header("Location:login.php");
}

//funcion que me perimete obtener un alumno por id

function obtenerAlumnooPorId($id_alumno)
{
    //Obtenemos la propiedad en base al id que recibimos por GET
    include("conexion.php");

    //Armamos el query para seleccionar la propiedad
    $query = "SELECT * FROM alumons WHERE id='$id_alumno'";

    //Ejecutamos la consulta
    $resultado_alumno = mysqli_query($conn, $query);
    $alumno = mysqli_fetch_assoc($resultado_alumno);
    return $alumno;
}
//tomo el id que me recibí y busco la propiedad
if(isset($_GET['id'])) {
    $id_alumno = $_GET['id'];
    $alumno = obtenerAlumnooPorId($id_alumno);
    // Resto de tu código utilizando $id_alumno
} else {
    // Manejo de error si no se proporciona el parámetro 'id'
}




/************************************************************* */
function obtenerFotosGaleriaDeAlumno($id_alumno)
{
    include("conexion.php");

    //Armamos el query para seleccionar las fotos
    $query = "SELECT * FROM fotos WHERE id_alumno='$id_alumno'";

    //Ejecutamos la consulta
    $galeria = mysqli_query($conn, $query);
    return $galeria;
}

include("conexion.php");
//Armamos el query para seleccionar los cursos
$query = "SELECT * FROM cursos";

//Ejecutamos la consulta
$resultado_cursos = mysqli_query($conn, $query);
/******************************************************/
/******************************************************* */
//GUARDAMOS AL ALUMNO   
if (isset($_POST['actualizar'])) {
    //nos conectamos a la base de datos
    include("conexion.php");

    //tomamos los datos que vienen del formulario
    $id_alumno = $_POST['id'];
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

    //armamos el query para insertar en la tabla alumnos
    ///S E G U I R A Q U I!!!!!!!!!!!!!!!!!!!!
    $query = "UPDATE alumons SET
     nombre_alumno=$nombre_alumno', 
     informacion_alumno='$informacion_alumno', 
     genero='$genero', 
     fecha_nacimiento='$fecha_nacimiento', 
     dni='$dni',
     direccion='$direccion', 
     correo='$correo', 
     telefono='$telefono', 
     curso='$curso',
     precio='$precio', 
     horario='$horario', 
     dia_clases='$dia_clases',
     fecha_inicio=$fecha_inicio',
     fecha_fin='$fecha_fin',
     forma_pago='$forma_pago',
     numero_cuotas='$numero_cuotas',
     fecha_pago='$fecha_pago'
    WHERE id='$id_alumno'";

    //insertamos en la tabla alumnos
    
}


/******************************************************* */


?>



<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wissen - ADMIN</title>
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
                    <input type="hidden" name="id" value="<?php echo $alumno['id'] ?>">
                    <div class="fila-una-columna">
                        <label for="nombre_alumno">Nombre del Alumno</label>
                        <input type="text" name="nombre_alumno" value="<?php echo $alumno['nombre_alumno'] ?>" required class="input-entrada-texto">
                    </div>

                    <div class="fila-una-colummna">
                        <label for="informacion_alumno">Informacion adicional del alumno</label>
                        <textarea name="informacion_alumno" id="" cols="30" rows="10" class="input-entrada-texto"><?php echo $alumno['informacion_alumno'] ?></textarea>
                    </div>

                    <div class="fila">
                        <div class="box">
                            <label for="genero">Genero</label>
                            <select name="genero" id="" class="input-entrada-texto">
                                
                                
                                <option value="Maculino" <?php if ($alumno['genero'] == "Maculino") {
                                                        echo "selected";
                                                    } ?>>Maculino</option>
                                <option value="Femenino" <?php if ($alumno['genero'] == "Femenino") {
                                                        echo "selected";
                                                    } ?>>Femenino</option>
                            </select>
                        </div>


                        <div class="box">
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <input type="text" name="fecha_nacimiento" value="<?php echo $alumno['fecha_nacimiento'] ?>"class="input-entrada-texto">
                        </div>

                        <div class="box">
                            <label for="dni">DNI</label>
                            <input type="text" name="dni" value="<?php echo $alumno['dni'] ?>"class="input-entrada-texto">
                        </div>
                    </div>

                    <div class="fila">
                        

                        <div class="box">
                            <label for="direccion">Direccion</label>
                            <input type="text" name="direccion" value="<?php echo $alumno['direccion'] ?>"class="input-entrada-texto">
                        </div>

                        <div class="box">
                            <label for="correo">Correo</label>
                            <input type="text" name="correo" value="<?php echo $alumno['correo'] ?>" class="input-entrada-texto">
                        </div>
                        <div class="box">
                            <label for="telefono">Telefono</label>
                            <input type="text" name="telefono" value="<?php echo $alumno['telefono'] ?>"class="input-entrada-texto">
                        </div>
                    </div>

                  

                    <h2>Galería de Fotos</h2>
                    <div class="">
                        
                        <p>Foto principal (<label for="foto1" class="btn-cambiar-foto">Cambiar foto</label>)</p>
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
                            <input type="text" name="curso" value="<?php echo $alumno['curso'] ?>" class="input-entrada-texto">
                            

                        </div>
                        <div class="box">
                            <label for="precio">Precio</label>
                            <input type="text" name="precio" value="<?php echo $alumno['precio'] ?>" class="input-entrada-texto">
                        </div>

                    

                    
                        <div class="box">
                            <label for="horario">Horario</label>
                            <input type="text" name="horario" value="<?php echo $alumno['horario'] ?>" class="input-entrada-texto">
                        </div>

                    </div>

                    <div class="fila">
                        <div class="box">
                            <label for="dia_clases">Dias de Clases</label>
                            <input type="text" name="dia_clases" value="<?php echo $alumno['dia_clases'] ?>" class="input-entrada-texto">
                        </div>
                        <div class="box">
                            <label for="fecha_inicio">Fecha de Inicio</label>
                            <input type="text" name="fecha_inicio" value="<?php echo $alumno['fecha_inicio'] ?>" class="input-entrada-texto">
                        </div>
                        <div class="box">
                            <label for="fecha_fin">Fecha de Fin</label>
                            <input type="text" name="fecha_fin" value="<?php echo $alumno['fecha_fin'] ?>" class="input-entrada-texto">
                        </div>
                    </div>
            
                    <div class="fila">
                        <div class="box">
                            <label for="forma_pago">Forma de pago</label>
                            <select name="forma_pago" id="" class="input-entrada-texto">
                               
                                <option value="Contado" <?php if ($alumno['forma_pago'] == "Contado") {
                                                        echo "selected";
                                                    } ?>>Contado</option>
                                <option value="Cuotas" <?php if ($alumno['forma_pago'] == "Cuotas") {
                                                        echo "selected";
                                                    } ?>>Cuotas</option>
                            </select>
                        </div>
                        <div class="box">
                            <label for="numero_cuotas">Numero de Cuotas</label>
                            <input type="text" name="numero_cuotas" value="<?php echo $alumno['numero_cuotas'] ?>"  class="input-entrada-texto">
                        </div>
                        <div class="box">
                            <label for="fecha_pago">Fecha de Pago</label>
                            <input type="text" name="fecha_pago" value="<?php echo $alumno['fecha_pago'] ?>"  class="input-entrada-texto">
                        </div>
                    </div>
                   
                    <hr>
                    <input type="submit" value="Actualizar  Alumno" name="actualizar" class="btn-accion">

                </form>

            </div>
        </div>
    </div>

    <?php if (isset($_POST['actualizar'])) : ?>

<script>
    alert("<?php echo $mensaje ?>");
    window.location.href = 'listado-alumno.php';
</script>

<?php endif ?>

    <script src="script.js"></script>
    <script src="subirFoto.js"></script>
    <script src="scriptFotosNuevas.js"></script>
    
</body>

</html>