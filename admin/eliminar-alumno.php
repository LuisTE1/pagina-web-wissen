<?php

    include("conexion.php");
    $id = $_GET['idAlumno'];

    //determino la cantidad de fotos que tiene la publicacion
    $query = "SELECT * FROM fotos WHERE id_alumno = '$id'";
    $result = mysqli_query($conn, $query);

    $directorio = 'fotos/'.$id."/";
 
    //elimino cada uno de los archivos de las fotos de galeria de alumno
    while ($foto = mysqli_fetch_assoc($result)){
        $archivo = $foto['nombre_foto'];
        unlink($directorio.$archivo);
    }

    //eliminar la foto principal del alumno de la carpeta
    $query = "SELECT * FROM alumons WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $foto = mysqli_fetch_assoc($result);
    $archivo = $foto['url_foto_principal'];
    unlink($archivo);

    //eliminamos la carpeta (la cual ya esta vacía)
    rmdir($directorio);

    //Primero eliminamos todas los registros del las fotos de la BD
    $query = "DELETE FROM fotos WHERE id_alumno = '$id'";

    $result = mysqli_query($conn, $query);

    //Ahora elimino el registro del alumno
    $query = "DELETE FROM alumons WHERE id = '$id'";
    mysqli_query($conn, $query);
?>
<script>
    alert("El alumno se eliminó");
    window.location.href = 'listado-alumno.php';
</script>