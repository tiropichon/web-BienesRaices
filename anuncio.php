<?php
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /bienesraices');
    }

    //Importar conexion BD
    require 'includes/config/database.php';
    $db = conectarDB();

    // Escribir el query
    $query = "SELECT * FROM propiedades WHERE id = ${id}";

    //Realizar la consulta
    $resultado = mysqli_query($db, $query);

    if(!$resultado->num_rows){
        header('Location: /bienesraices');
    }

    $propiedad = mysqli_fetch_assoc($resultado);

    require 'includes/funciones.php';

    //Añadimos Header
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>

        <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="imagen de la propiedad">

        <div class="resumen-propiedad">
            <p class="precio"><?php echo $propiedad['precio']; ?></p>

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

            <p><?php echo $propiedad['descripcion']; ?></p>
        </div>
    </main>

<?php
    //Cerrar conexion BD
    mysqli_close($db);

    //Añadimos Footer
    incluirTemplate('footer');
?>