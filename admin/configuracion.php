<?php
session_start();

if (!$_SESSION['usuarioLogeado']) {
    header("Location:login.php");
}

/******************************************************* */
//GUARDAMOS LOS DATOS DE LA CONFIGURACION
if (isset($_POST['guardar'])) {
    //nos conectamos a la base de datos
    include("conexion.php");

    //tomamos los datos que vienen del formulario

    $oficina_central = $_POST['oficina_central'];
    $telefono1 = $_POST['telefono1'];
    $telefono2 = $_POST['telefono2'];
    $email_contacto = $_POST['email_contacto'];
    $horarios = $_POST['horarios'];
    $mapa = "mapa";
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
  
    $user = $_POST['user'];
    $password = $_POST['password'];
    $email_administrador = $_POST['email_administrador'];

    //armamos el query para insertar en la tabla congiguracion
    $query = "UPDATE configuracion SET

     oficina_central='$oficina_central', 
     telefono1='$telefono1', 
     telefono2='$telefono2', 
     email_contacto='$email_contacto', 
     horarios='$horarios', 
     mapa='$mapa',
     facebook='$facebook',
     twitter='$twitter',
   
     user = '$user',
     password = '$password',
     email_administrador = '$email_administrador'
     WHERE id=1";

    //insertamos en la tabla propiedades
    if (mysqli_query($conn, $query)) { //Se actualizó correctamente
        $mensaje = "Se actualizó la configuración correctamente";
    } else {
        $mensaje = "No se pudo insertar en la BD" . mysqli_error($conn);
    }
}


function obtenerConfiguracion()
{
    include("conexion.php");
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
$config = obtenerConfiguracion();




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
            <div id="configuracion">
                <h2>Configuración del Sitio Web</h2>
                <hr>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                   

                    <div class="box-configuracion">
                        <h3>2 - Configure la información de contacto</h3>

                        <label for="oficina_central">Oficina central</label>
                        <input type="text" value="<?php echo $config['oficina_central'] ?>" placeholder="Oficina Central" name="oficina_central" class="input-entrada-texto">

                        <label for="telefono1">Teléfono 1</label>
                        <input type="text" value="<?php echo $config['telefono1'] ?>" placeholder="Teléfono 1" name="telefono1" class="input-entrada-texto">

                        <label for="telefono2">Teléfono 2</label>
                        <input type="text" value="<?php echo $config['telefono2'] ?>" placeholder="Teléfono 2" name="telefono2" class="input-entrada-texto">

                        <label for="e-mail">Correo Electrónico 1</label>
                        <input type="email" value="<?php echo $config['email_contacto'] ?>" placeholder="Correo Electrónico" name="email_contacto" class="input-entrada-texto">

                        <label for="horarios">Horarios</label>
                        <input type="text" value="<?php echo $config['horarios'] ?>" placeholder="Horarios" name="horarios" class="input-entrada-texto">

                        <label for="horarios">Facebook(dirección url)</label>
                        <input type="text" value="<?php echo $config['facebook'] ?>" placeholder="Dirección de facebook" name="facebook" class="input-entrada-texto">
                        
                        <label for="horarios">Twitter (dirección url)</label>
                        <input type="text" value="<?php echo $config['twitter'] ?>" placeholder="Dirección de Twitter" name="twitter" class="input-entrada-texto">

                    </div>

                    <div class="box-configuracion">
                        <h3>3- Configure la información del administrador</h3>

                        <label for="user">Nombre de usuario</label>
                        <input type="text" value="<?php echo $config['user'] ?>" placeholder="Nombre de usuario" name="user" class="input-entrada-texto" required>

                        <label for="password">Password</label>
                        <input type="text" value="<?php echo $config['password'] ?>" placeholder="Contraseña" name="password" class="input-entrada-texto" required>

                        <label for="email_administrador">Correo electrónico del administrador</label>
                        <input type="email" value="<?php echo $config['email_administrador'] ?>" placeholder="Correo Electrínico" name="email_administrador" class="input-entrada-texto" required>
                    </div>

                    <input type="submit" value="Guardar Configuración" name="guardar" class="btn-accion">
                </form>

                <?php if (isset($_POST['guardar'])) : ?>
                    <script>
                        alert("<?php echo $mensaje ?>");
                        window.location.href = 'index.php';
                    </script>
                <?php endif ?>
            </div>
        </div>
    </div>



    <script>
        $('#link-configuracion').addClass('pagina-activa');
    </script>

    <script src="script.js"></script>

  

</body>

</html>