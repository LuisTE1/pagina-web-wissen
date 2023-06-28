<?php
function obtenerConfiguracion()
{
    include("admin/conexion.php");
    //Comprobamos si existe el registro 1 que mantiene la configuraciòn
    //Añadimos un alias AS total para identificar mas facil
    $query = "SELECT COUNT(*) AS total FROM configuracion";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);


    if ($row['total'] == '0') {
        echo "Valor" . $row['total'];
        //No existe el registro 1 - DEBO INSERTAR el registro por primera vez
        $query = "INSERT INTO configuracion (id,user,password)
        VALUES (NULL, 'admin', 'admin')";

        if (mysqli_query($conn, $query)) { //Se insertó correctamente

        } else {
            echo "No se pudo insertar en la BD" . mysqli_error($conn);
        }
    }

    //El regist
    $query = "SELECT * FROM configuracion  WHERE id='1'";
    $result = mysqli_query($conn, $query);
    $config = mysqli_fetch_assoc($result);
    return $config;
}

function obtenerTodosLosCursos()
{
    include("admin/conexion.php");
    $query = "SELECT * FROM cursos";
    $result = mysqli_query($conn, $query);
    return $result;
}





function obtenerCursoPorId($id)
{
    //Obtenemos la propiedad en base al id que recibimos por GET
    include("admin/conexion.php");

    //Armamos el query para seleccionar la propiedad
    $query = "SELECT * FROM cursos WHERE id='$id'";

    //Ejecutamos la consulta
    $resultado_curso = mysqli_query($conn, $query);
    $curso = mysqli_fetch_assoc($resultado_curso);
    return $curso;
}



function obtenerFotosGaleria($id_propiedad)
{
    include("admin/conexion.php");
    $query = "SELECT * FROM fotos WHERE id_propiedad='$id_propiedad'";

    //Ejecutamos la consulta
    $resultado_fotos = mysqli_query($conn, $query);
    return $resultado_fotos;
}



?>