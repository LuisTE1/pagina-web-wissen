<?php

include("funciones.php");

$config = obtenerConfiguracion();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wissen LP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="estilos.css">
</head>

<body >
<div class="home" id="home">
<div class="container">
        <?php include("header.php");?>
</div>
</div>

    <header class="content header">
         <h2 class="centered" style="font-size: 115px;"  >
         Wissen LP Cursos Personalizados
         </h2>
        <p style="font-size: 26px;">
        Tratar a cada persona de forma personalizada, conociendo sus diferentes inteligencias y enseñarle de acuerdo a sus capacidades
        </p>
    </header>
    
    <section class="content sau">
        <h2 class="title">Lo Mejor de WissenLP</h2>
        <p>
        Clases online en vivo dictadas por docentes especializados , Enfoque 100% práctico, mentorías personalizadas con certificado a nombre del Ministerio de Educacion.
        </p>


        <div class="box-container">
            <div class="box">
         
                <i class="fab fa-library"></i>
                <h3>La mejor educación online a tu alcance</h3>
                
            </div>
            <div class="box">
                <i class="fab fa-android"></i>
                <h3>Tutoria al 100%, en cada paso</h3>
                <
            </div>
            
        </div>
    </section>

    <section class="content price">
        <article class="contain">
      
        </article>
    </section>

    <section class="content about">
        
        <h2 class="title">Testimonios</h2>
     
        <div class="box-container2">
            <div class="box">
                <img src="img/testimonio.jpg" alt="">
                <h3>Aplicaciones Moviles</h3>
                <p>
                    Android Studio
                </p>
                <p>
                Mas allá del Certificado, agradezco el conocimiento que me lleve conmigo durante toda la cursada. Hermosa experiencia, y contento de poder seguir sumando a esto que me gusta tanto ❤
                </p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/testimonio.jpg" alt="">
                <h3>Aplicaciones Moviles</h3>
                <p>
                    Android Studio
                </p>
                <p>
                Mas allá del Certificado, agradezco el conocimiento que me lleve conmigo durante toda la cursada. Hermosa experiencia, y contento de poder seguir sumando a esto que me gusta tanto ❤
                </p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/testimonio.jpg" alt="">
                <h3>Aplicaciones Moviles</h3>
                <p>
                    Android Studio
                </p>
                <p>
                Mas allá del Certificado, agradezco el conocimiento que me lleve conmigo durante toda la cursada. Hermosa experiencia, y contento de poder seguir sumando a esto que me gusta tanto ❤
                </p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
        </div>
  
    
    </section>


</body>

<script src="script.js"></script>

</html>