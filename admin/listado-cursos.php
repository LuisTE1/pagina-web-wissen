<?php
session_start();

if (!$_SESSION['usuarioLogeado']) {
    header("Location:login.php");
}

function obtenerTodosLosCursos()
{
    include("conexion.php");
    $query = "SELECT * FROM cursos";
    $result = mysqli_query($conn, $query);
    return $result;
}

$result = obtenerTodosLosCursos();
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
                <h2>Listado de cursos</h2>
                <hr>
                <div class="contenedor-tabla">
                    <table >
                        <tr>
                            <th>#ID</th>
                            <th>Nombre del curso</th>
                            <th>Precio</th>
                            <th>Informacion</th>
                            <th>Introduccion</th>
                            <th>Requisitos</th>
                            <th>Programa</th>
                            <th>Acciones</th>
                        </tr>

                        <?php while ($curso = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td> <?php echo $curso['id'] ?></td>
                                <td> <?php echo $curso['nombre_del_curso'] ?></td>
                                <td> <?php echo $curso['precio_del_curso'] ?></td>
                                <td> <?php echo $curso['info_curso'] ?></td>
                                <td> <?php echo $curso['introducion_curso'] ?></td>
                                <td> <?php echo $curso['requisitos_curso'] ?></td>
                                <td> <?php echo $curso['programa_curso'] ?></td>
                                <td>
                                    <form action="actualizar-curso.php" method="get" class="form-acciones">
                                        <input type="hidden" name="id" value="<?php echo $curso['id'] ?>">
                                        <input type="submit" value="Actualizar" name="actualizar">
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <script>
        $('#link-listado-cursos').addClass('pagina-activa');
    </script>
</body>

</html>