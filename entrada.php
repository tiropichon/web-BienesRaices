<?php
    declare(strict_types=1);

    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>

        <picture>
            <source srcset="/bienesraices/build/img/destacada2.webp" type="image/webp">
            <source srcset="/bienesraices/build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="/bienesraices/build/img/destacada2.jpg" alt="imagen de la propiedad">
        </picture>

        <p class="informacion-meta">Escrito el <span>20/10/2021</span> por: <span>Admin</span></p>

        <div class="resumen-propiedad">
            <p>
                Fusce non ipsum sed dolor lacinia lobortis. Fusce varius diam eget nunc ultrices tempus. Vivamus blandit laoreet mollis. Pellentesque pellentesque, nisi vel rutrum lacinia, est dolor dignissim justo, nec porttitor turpis erat ut sem. Morbi non sodales sapien, ac congue tortor. Aliquam quis iaculis velit. Morbi eget magna et elit lacinia aliquet id sit amet risus. Quisque eu est convallis, egestas urna vel, fermentum diam. Aliquam non tristique turpis, vitae ullamcorper velit. Aenean elementum, mi a pulvinar porttitor, velit ligula aliquam tellus, nec fringilla magna dui non ligula.
            </p>

            <p>
                Nulla egestas lacus est, nec tempus urna cursus vel. Duis odio risus, tempus nec enim porta, sagittis varius lacus. Pellentesque vel dolor hendrerit, dignissim mi et, placerat nibh. Morbi quam nibh, condimentum ut nunc et, tempor pellentesque nisi. Sed et purus ut dui mollis finibus. In in convallis velit, fermentum tristique nulla. Vivamus efficitur, velit eget ultrices vulputate, sem odio eleifend dui, euismod molestie nunc leo ut mauris. Morbi et bibendum dolor.
            </p>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>