<?php
session_start();

if (!$_SESSION['usuarioLogeado']) {
    header("Location:login.php");
}

//Obtenemos  en base al id que recibimos por GET
include("conexion.php");
$id_alumno = $_GET['id'];

//Armamos el query para seleccionar la 
$query = "SELECT * FROM alumons WHERE id='$id_alumno'";

//Ejecutamos la consulta
$resultado_alumno = mysqli_query($conn, $query);
$alumno = mysqli_fetch_assoc($resultado_alumno);
/************************************************************* */

function obtenerCurso($id)
{
    include("conexion.php");
    $query = "SELECT * FROM cusos WHERE id='$id'";

    //Ejecutamos la consulta
    $resultado_curso = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($resultado_curso);
    return $row['nombre_del_curso'];
}

function obtenerFotosGaleria($id_alumno)
{
    include("conexion.php");
    $query = "SELECT * FROM fotos WHERE id_alumno='$id_alumno'";

    //Ejecutamos la consulta
    $resultado_fotos = mysqli_query($conn, $query);
    return $resultado_fotos;
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
            <div id="detalle-propiedad">
                <h2>Detalle del Alumno</h2>
                <hr>
                <div class="contenedor-tabla">
                    <h3>Descripción de la Alumno</h3>
                    <table class="descripcion">
                        <tr>
                            <td>ID de la Alumno</td>
                            <td><?php echo $alumno['id'] ?></td>
                        </tr>
                        <tr>
                            <td>Nombre del Alumno:</td>
                            <td> <?php echo $alumno['nombre_alumno'] ?> </td>
                        </tr>

                        <tr>
                            <td>Informacion adicional del alumno</td>
                            <td> <?php echo $alumno['informacion_alumno'] ?> </td>
                        </tr>

                        <tr>
                            <td>Genero</td>
                            <td> <?php echo $alumno['genero'] ?> </td>
                        </tr>

                        <tr>
                            <td>Fecha de Nacimiento</label></td>
                            <td> <?php echo $alumno['fecha_nacimiento'] ?> </td>
                        </tr>

                        <tr>
                            <td>DNI</label></td>
                            <td> <?php echo $alumno['dni'] ?> </td>
                        </tr>

                        <tr>
                            <td>Direccion</label></td>
                            <td> <?php echo $alumno['direccion'] ?> </td>
                        </tr>

                        <tr>
                            <td>Correo</td>

                            <td> <?php echo $alumno['correo'] ?> </td>
                        </tr>

                        <tr>
                            <td>Telefono</td>
                            <td> <?php echo $alumno['telefono'] ?> </td>
                        </tr>

                        
                    </table>
                </div>

                <div class="contenedor-tabla">
                    <h3>Galería de Fotos</h3>
                    <table class="descripcion">
                        <tr>
                            <td>Foto Principal</td>
                            <td><img src="<?php echo $alumno['url_foto_principal'] ?>" alt=""></td>
                        </tr>

                        
                    </table>
                </div>


                <div class="contenedor-tabla">
                    <h3>Datos del Curso</h3>

                    <table class="descripcion">
                    <tr>
                            <td>Curso</td>
                            <td> <?php echo $alumno['curso'] ?> </td>
                        </tr>

                        <tr>
                            <td>Precio del Curso</td>
                            <td> <?php echo $alumno['precio'] ?> </td>
                        </tr>

                        <tr>
                            <td>Horario</td>
                            <td> <?php echo $alumno['horario'] ?> </td>
                        </tr>
                        <tr>
                            <td>Dias de Clases</td>
                            <td> <?php echo $alumno['dia_clases'] ?> </td>
                        </tr>
                        <tr>
                            <td>Fecha de Inicio</td>
                            <td> <?php echo $alumno['fecha_inicio'] ?> </td>
                        </tr>
                        <tr>
                            <td>Fecha de Fin</td>
                            <td> <?php echo $alumno['fecha_fin']?> </td>
                        </tr>
                        <tr>
                            <td>Forma de pago</td>
                            <td> <?php echo $alumno['forma_pago'] ?> </td>
                        </tr>
                        <tr>
                            <td>Numero de Cuotas</td>
                            <td> <?php echo $alumno['numero_cuotas']  ?> </td>
                        </tr>
                        <tr>
                            <td>Fecha de Pago</td>
                            <td> <?php echo $alumno['fecha_pago'] ?> </td>
                        </tr>
                    </table>
                </div>


            </div>
        </div>
    </div>
</body>

</html>