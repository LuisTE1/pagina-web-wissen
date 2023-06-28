<?php
include("funciones.php");

$limInferior = 0;

$config = obtenerConfiguracion();



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAWPI - Inmobiliaria</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilo.css">

    <script>
        function cargarMasPropiedades(str) {
            var conexion;

            if (str == "") {
                document.getElementById("contenedor-propiedades").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) {
                conexion = new XMLHttpRequest();
            }

            conexion.onreadystatechange = function() {
                if (conexion.readyState == 4 && conexion.status == 200) {
                    document.getElementById("contenedor-propiedades").innerHTML += conexion.responseText;
                    document.getElementById("botonCargarMas").value = parseInt(document.getElementById("botonCargarMas").value) + 6;

                }
            }

            conexion.open("GET", "maspropiedades.php?c=" + str, true);
            conexion.send();

        }
    </script>
</head>

<body class="page-propiedades">
    <div class="container">
        <?php include("header.php"); ?>

        
        <br><br>
        <h2 class="titulo-seccion" >Cursos  </h2>
        <div class="contenedor-propiedades" id="contenedor-propiedades">
            <?php while ($propiedad = mysqli_fetch_assoc($result_propiedades)) : ?>
                <div class="fila">
                    <form action="publicacion.php" method="get" id="<?php echo $propiedad['id'] ?>">
                        <input type="hidden" value="<?php echo $propiedad['id'] ?>" name="idPropiedad">
                        <div class="contenedor-propiedad" onclick="document.getElementById('<?php echo $propiedad['id'] ?>').submit();">
                            <div class="contenedor-img">
                                <img src="<?php echo 'admin/' . $propiedad['url_foto_principal'] ?>" alt="">
                                
                            </div>
                            <div class="info">
                               
                                
                                <span class="precio"><?php echo $propiedad['moneda']?> <?php echo number_format($propiedad['precio'],0,'','.')?></span>
                          
                            </div>
                        </div>
                    </form>

                    <?php if ($propiedad = mysqli_fetch_assoc($result_propiedades)) : ?>
                        <form action="publicacion.php" method="get" id="<?php echo $propiedad['id'] ?>">
                            <input type="hidden" value="<?php echo $propiedad['id'] ?>" name="idPropiedad">
                            <div class="contenedor-propiedad" onclick="document.getElementById('<?php echo $propiedad['id'] ?>').submit();">
                                <div class="contenedor-img">
                                    <img src="<?php echo 'admin/' . $propiedad['url_foto_principal'] ?>" alt="">
                                    
                                </div>
                                <div class="info">
                                  
                
                                    <span class="precio"><?php echo $propiedad['moneda']?> <?php echo number_format($propiedad['precio'],0,'','.')?></span>
                               
                                </div>
                            </div>
                        </form>
                    <?php endif ?>

                    <?php if ($propiedad = mysqli_fetch_assoc($result_propiedades)) : ?>
                        <form action="publicacion.php" method="get" id="<?php echo $propiedad['id'] ?>">
                            <input type="hidden" value="<?php echo $propiedad['id'] ?>" name="idPropiedad">
                            <div class="contenedor-propiedad" onclick="document.getElementById('<?php echo $propiedad['id'] ?>').submit();">
                                <div class="contenedor-img">
                                    <img src="<?php echo 'admin/' . $propiedad['url_foto_principal'] ?>" alt="">
                                    <div class="estado">
                                        <?php echo $propiedad['estado'] ?>
                                    </div>
                                </div>
                                <div class="info">
                                    <h2><?php echo $propiedad['titulo'] ?></h2>
                                    <p> <i class="fa-solid fa-location-pin"></i><?php echo $propiedad['ubicacion'] ?></p>
                                    <span class="precio"><?php echo $propiedad['moneda']?> <?php echo number_format($propiedad['precio'],0,'','.') ?></span>
                                  
                                </div>
                            </div>
                        </form>
                    <?php endif ?>
                </div>

            <?php endwhile ?>
        </div>

        <button value="0" onclick="cargarMasPropiedades(this.value)" id="botonCargarMas"> Ver Más</button>

    </div>

    <footer>
            <?php include("contenido-footer.php")?>
    </footer>

    <script src="script.js"></script>
</body>

</html>