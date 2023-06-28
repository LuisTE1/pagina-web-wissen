<?php
//Función para obtener el registro de la configuración del sitio
function obtenerConfiguracion()
{
    include("conexion.php");
    //Comprobamos si existe el registro 1 que mantiene la configuraciòn
    //Añadimos un alias AS total para identificar mas facil
    $query = "SELECT COUNT(*) AS total FROM configuracion";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);


    if ($row['total'] == '0') {
        //No existe el registro 1 - DEBO INSERTAR el registro por primera vez
        $query = "INSERT INTO configuracion (id,user,password)
        VALUES (NULL, 'admin', 'admin')";

        if (mysqli_query($conn, $query)) { //Se insertó correctamente

        } else {
            echo "No se pudo insertar en la BD" .mysqli_errno($conn);
        }
    }

    //Selecciono el registro dela configuración
    $query = "SELECT * FROM configuracion  WHERE id='1'";
    $result = mysqli_query($conn, $query);
    $config = mysqli_fetch_assoc($result);
    return $config;
}

//Función que obtiene el total de registros de una tabla
function obtenerTotalRegistros($tabla)
{

    include("conexion.php");
    $query = "SELECT COUNT(*) id FROM $tabla";
    $result = mysqli_query($conn, $query);
    $fila = mysqli_fetch_assoc($result);
    return $fila['id'];
}




//funcion para agrear un nuevo curso a la BD
function agregarNuevoCurso( $curso,$precio,$info,$introducion,$requisitos,$programa){
    include("conexion.php");
    
    //armamos el query para insertar en la tabla cursos
    $query = "INSERT INTO cursos (id, nombre_del_curso, precio_del_curso,info_curso,introducion_curso,requisitos_curso,programa_curso)
    VALUES (NULL,'$curso','$precio','$info','$introducion','$requisitos','$programa')";

    //insertamos en la tabla cursos
    if (mysqli_query($conn, $query)) { //Se insertó correctamente
        $mensaje = "Curso agregado correctamente";
    } else {
        $mensaje = "No se pudo insertar en la BD" . mysqli_errno($conn);
    }
    return $mensaje;
}
?>