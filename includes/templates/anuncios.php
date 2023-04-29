<?php
    // Importar BD
    require 'includes/config/database.php';
    $db = conectarDB();

    // Consultar BD
    $query = "SELECT * FROM propiedades LIMIT {$limite}";
    
    // Obtener resultado
    $resultado = mysqli_query($db, $query);

?>

<div class="contenedor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
    <div class="anuncio">

        <img loading="lazy" src="/bienesraices/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Anuncio">

        <div class="contenido-anuncio">
            <h3><?php echo $propiedad['titulo']; ?></h3>
            <p><?php echo substr($propiedad['descripcion'], 0, 120); ?></p>
            <p class="precio"><?php echo $propiedad['precio']; ?> €</p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono w.c.">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="dormitorios">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>

            <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">
                Ver propiedad
            </a>
        </div> <!-- Contenido anuncio-->
    </div> <!-- anuncio -->
    <?php endwhile; ?>
</div> <!-- contenedor-anuncio -->
<?php
    //Cerrar la conexion
    mysqli_close($db);
?>