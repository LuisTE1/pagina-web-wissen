<?php

//variable donde se guardara el id de la ultimo alumno insertada
$id_ultima_alumno = null;

//Ahora vamos a crear el directorio del alumno, para guardar las fotos allí
//armamos el query para obtener el ultim id insertado de la tabla alumnos
$query = "SELECT * FROM alumons ORDER BY id DESC limit 1";
$resultado = mysqli_query($conn, $query);

if(mysqli_num_rows($resultado)){//obtuvimos el ultimo
    //guardo el resultado en un registro para manejarlo
    $alumno = mysqli_fetch_assoc($resultado);
    $id_ultima_alumno = $alumno['id'];

    $directorio = 'fotos/'.$id_ultima_alumno;

    if(!file_exists($directorio)){
        //Asegurarse que la carpetas tengan permisos de escritura
        mkdir($directorio,0777, true);
        
    }

    //controlamos que haya enviado imagen
    if(isset($_FILES["foto1"])){
        $reporte = null;
        $file = $_FILES["foto1"];
        $nombre = $file['name'];
        $tipo = $file['type'];
        $ruta_provisional = $file["tmp_name"];

        if($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif'){
            $reporte = "El archivo no es una imagen";
        }else{
            //muevo la imagen desde el directorio temporal a nuestra ruta indicada
            move_uploaded_file($file['tmp_name'], $directorio.'/'.$nombre);

            //Armamos la ruta para insertar en la base de datos
            $ruta = 'fotos/'.$id_ultima_alumno;
            $query = "UPDATE alumons SET url_foto_principal = '$ruta/$nombre' WHERE id='$id_ultima_alumno'";

            //Actualizamos en la base de datos
            if(mysqli_query($conn, $query)){
                //se actualizó con exito
            }else{
                echo "No se pudo insertar las imagen de la publicación".mysqli_error($conn);
            }
        }

    }


}else{
    $mensaje = "No se pudo seleccionar el último alumno".mysqli_error($conn);
}


?>