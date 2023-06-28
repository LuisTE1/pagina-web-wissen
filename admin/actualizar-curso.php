<?php
session_start();

if (!$_SESSION['usuarioLogeado']) {
    header("Location:login.php");
}

//Obtenemos el curso en base al id que recibimos por GET
include("conexion.php");
$id_curso = $_GET['id'];

function obtenerCursoPorId($id_curso)
{
    //Obtenemos el curso en base al id que recibimos por GET
    include("conexion.php");

    //Armamos el query para seleccionar el curso
    $query = "SELECT * FROM cursos WHERE id='$id_curso'";

    //Ejecutamos la consulta
    $resultado_curso = mysqli_query($conn, $query);
    $curso = mysqli_fetch_assoc($resultado_curso);
    return $curso;
}
//tomo el id que me recibí y busco el curso 
$id = $_GET['id'];
$curso = obtenerCursoPorId($id);

//Armamos el query para seleccionar el curso
$query = "SELECT * FROM cursos WHERE id='$id_curso'";

//Ejecutamos la consulta
$result = mysqli_query($conn, $query);
$curso = mysqli_fetch_assoc($result);
/************************************************************* */

if (isset($_POST['modificar'])) { // Cambio $_GET a $_POST

    //nos conectamos a la base de datos
    include("conexion.php");

    //tomamos los datos que vienen del formulario
    $id = $_POST['id']; // Cambio $_GET a $_POST
    $nombre_del_curso = $_POST['nombre_del_curso']; // Cambio $_GET a $_POST
    $precio_del_curso = $_POST['precio_del_curso']; // Cambio $_GET a $_POST
    $info_curso = $_POST['info_curso'];
    $introducion_curso = $_POST['introducion_curso'];
    $requisitos_curso = $_POST['requisitos_curso'];
    $programa_curso = $_POST['programa_curso'];

    //armamos el query para actualizar el curso
    $query = "UPDATE cursos SET 
    nombre_del_curso='$nombre_del_curso',
    precio_del_curso='$precio_del_curso',
    info_curso='$info_curso',
    introducion_curso='$introducion_curso',
    requisitos_curso='$requisitos_curso',
    programa_curso='$programa_curso' 
    WHERE id='$id'" ;

    //actualizamos en la tabla cursos
    if (mysqli_query($conn, $query)) { //Se actualizó correctamente
        $mensaje = "El curso se actualizó correctamente";
    } else {
        $mensaje = "No se pudo actualizar en la BD" . mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilo.css">
    <title>WISSENLP - Admin</title>
</head>

<body>
    <?php include("header.php"); ?>
    <div id="contenedor-admin">
        <?php include("contenedor-menu.php"); ?>

        <div class="contenedor-principal">
            <!-- utilizamos el id de nuevo-curso para aprovechar los estilos ya creados -->
            <div id="nuevo-pais">
                <h2>Actualizar Curso</h2>
                <hr>

                <div class="box-nuevo-tipo">
                    <h3>Actualizar Curso</h3>
                    <hr>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"> <!-- Cambio de GET a POST -->
                        <input type="hidden" name="id" value="<?php echo $curso['id'] ?>"> 
                        <input type="text" name="nombre_del_curso" value="<?php echo $curso['nombre_del_curso'] ?>" placeholder="Nombre del cruso" required>
                        <input type="text" name="precio_del_curso" value="<?php echo $curso['precio_del_curso'] ?>" placeholder="Precio del curso" required>
                        <input type="text" name="info_curso" value="<?php echo $curso['info_curso'] ?>" placeholder="Informacion del cruso" required>
                        <input type="text" name="introducion_curso" value="<?php echo $curso['introducion_curso'] ?>" placeholder="Introduccion del curso" required>
                        <input type="text" name="requisitos_curso" value="<?php echo $curso['requisitos_curso'] ?>" placeholder="Requisitos del cruso" required>
                        <input type="text" name="programa_curso" value="<?php echo $curso['programa_curso'] ?>" placeholder="Programa del curso" required>

                        <input type="submit" name="modificar" value="Modificar" class="btn-accion">
                    </form>

                    <?php if (isset($_POST['modificar'])) : ?> <!-- Cambio de GET a POST -->
                        <script>
                            alert("<?php echo $mensaje ?>");
                            window.location.href = 'listado-cursos.php';
                        </script>
                    <?php endif ?>

                </div>

            </div>
        </div>
    </div>
</body>

</html>