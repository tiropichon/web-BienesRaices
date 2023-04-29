<?php
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius erat mi, sed efficitur nunc mollis in. Nullam in felis a lorem lacinia tempor id ut leo.</p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius erat mi, sed efficitur nunc mollis in. Nullam in felis a lorem lacinia tempor id ut leo.</p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius erat mi, sed efficitur nunc mollis in. Nullam in felis a lorem lacinia tempor id ut leo.</p>
            </div>
        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>
        
        <?php
            $limite = 3;

            include 'includes/templates/anuncios.php'; 
        ?>

        <div class="alinear-derecha">
            <a href="/bienesraices/anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Rellene el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad.</p>
        <a href="/bienesraices/contacto.php" class="boton-amarillo">Contáctanos</a>
    </section> <!-- contacto -->

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="/bienesraices/build/img/blog1.webp" type="image/webp">
                        <source srcset="/bienesraices/build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="/bienesraices/build/img/blog1.jpg" alt="texto entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/bienesraices/entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                        <p>
                            Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.
                        </p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="/bienesraices/build/img/blog2.webp" type="image/webp">
                        <source srcset="/bienesraices/build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="/bienesraices/build/img/blog2.jpg" alt="texto entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/bienesraices/entrada.php">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                        <p>
                            Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio.
                        </p>
                    </a>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimonales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una forma excelente, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Mario Ruiz</p>
            </div>
        </section>
    </div>
<?php        
    incluirTemplate('footer');
?>