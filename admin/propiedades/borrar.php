<?php
    require '../../includes/funciones.php';

    $auth = estaAutenticado();

    if(!$auth){
        header('Location: /bienesraices/index.php');
    }
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Borrar</h1>

        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>
    </main>

<?php        
    incluirTemplate('footer');
?>