<?php
session_start();

if (!$_SESSION['usuarioLogeado']) {
    header("Location:login.php");
}

function obtenerTodosLosAlumnos()
{
    include("conexion.php");
    $query = "SELECT * FROM alumons  ORDER BY fecha_alta DESC";
    $result = mysqli_query($conn, $query);
    return $result;
}



$result = obtenerTodosLosAlumnos();

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilo.css">
    <title>WISSENLP - Admin</title>
</head>

<body>
    <?php include("header.php"); ?>

    <div id="contenedor-admin">
        <?php include("contenedor-menu.php"); ?>

        <div class="contenedor-principal">
            <div id="listado-propiedades">
                <h2>Listado de Alumnos</h2>
                <hr>
                <div class="contenedor-tabla">


                    <table>
                        <tr>
                            <th>#ID</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Curso</th>
                            <th>Dia de Clases</th>
                            <th>Horario</th>
                            <th> Acciones </th>
                        </tr>

                        <?php while ($alumno = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td> <?php echo $alumno['id'] ?></td>
                                <td> <?php echo $alumno['nombre_alumno'] ?></td>
                                <td> <?php echo $alumno['telefono'] ?></td>
                                <td> <?php echo $alumno['curso'] ?></td>
                                <td> <?php echo $alumno['dia_clases'] ?></td>
                                <td> <?php echo $alumno['horario'] ?></td>
                                <td>
                                    <form action="ver-detalle-alumno.php" method="get" class="form-acciones">
                                        <input type="hidden" name="id" value="<?php echo $alumno['id'] ?>">
                                        <input type="submit" value="Ver Detalle" name="detalle">
                                    </form>
                                    <form action="actualizar-alumno.php" method="get" class="form-acciones">
                                        <input type="hidden" name="id" value="<?php echo $alumno['id'] ?>">
                                        <input type="submit" value="Actualizar" name="actualizar">
                                    </form>
                                    <a href="#" id="<?php echo $alumno['id'] ?>" onclick="abrirModal(<?php echo $alumno['id'] ?>)" class="btn-eliminar">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </table>
                </div>

                <!-- The Modal para la eliminación -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p>¿Esta seguro que desea eliminar ?</p>
                        <button onclick="eliminarAlumno()">Si</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        $('#link-listado-alumno').addClass('pagina-activa');
    </script>

    <script src="script.js"></script>
</body>

</html>