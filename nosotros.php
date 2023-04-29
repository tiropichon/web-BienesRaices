<?php
    declare(strict_types=1);

    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="/bienesraices/build/img/nosotros.webp" type="image/webp">
                    <source srcset="/bienesraices/build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="/bienesraices/build/img/nosotros.jpg" alt="Sobre nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia.
                </blockquote>

                <p>
                    Fusce non ipsum sed dolor lacinia lobortis. Fusce varius diam eget nunc ultrices tempus. Vivamus blandit laoreet mollis. Pellentesque pellentesque, nisi vel rutrum lacinia, est dolor dignissim justo, nec porttitor turpis erat ut sem. Morbi non sodales sapien, ac congue tortor. Aliquam quis iaculis velit. Morbi eget magna et elit lacinia aliquet id sit amet risus. Quisque eu est convallis, egestas urna vel, fermentum diam. Aliquam non tristique turpis, vitae ullamcorper velit. Aenean elementum, mi a pulvinar porttitor, velit ligula aliquam tellus, nec fringilla magna dui non ligula.
                </p>

                <p>
                    Nulla egestas lacus est, nec tempus urna cursus vel. Duis odio risus, tempus nec enim porta, sagittis varius lacus. Pellentesque vel dolor hendrerit, dignissim mi et, placerat nibh. Morbi quam nibh, condimentum ut nunc et, tempor pellentesque nisi. Sed et purus ut dui mollis finibus. In in convallis velit, fermentum tristique nulla. Vivamus efficitur, velit eget ultrices vulputate, sem odio eleifend dui, euismod molestie nunc leo ut mauris. Morbi et bibendum dolor.
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="/bienesraices/build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius erat mi, sed efficitur nunc mollis in. Nullam in felis a lorem lacinia tempor id ut leo.</p>
            </div>

            <div class="icono">
                <img src="/bienesraices/build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius erat mi, sed efficitur nunc mollis in. Nullam in felis a lorem lacinia tempor id ut leo.</p>
            </div>

            <div class="icono">
                <img src="/bienesraices/build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius erat mi, sed efficitur nunc mollis in. Nullam in felis a lorem lacinia tempor id ut leo.</p>
            </div>
        </div>
    </section>

<?php
    incluirTemplate('footer');
?>