<?php
    require '../../includes/funciones.php';
    $auth = estaAutenticado();

    if(!$auth){
        header('Location: /bienesraices/index.php');
    }
    
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /bienesraices/admin/index.php');
    }

    //Importar conexion BD
    require '../../includes/config/database.php';
    $db = conectarDB();

    //Obtener los datos de la propiedad
    $consulta = "SELECT * FROM propiedades WHERE id = {$id};";
    $resultado = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultado);

    //consulta para obtener los vendedores
    $consulta = "SELECT * FROM vendedores;";
    $resultado = mysqli_query($db, $consulta);

    
    incluirTemplate('header');

    //Arreglo con mensajes de errores
    $errores = [];

    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorId = $propiedad['vendedores_id'];
    $imagenPropiedad = $propiedad['imagen'];

    //Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";

        $titulo = mysqli_real_escape_string($db, $_POST['titulo']); 
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $imagen = $_FILES['imagen'];
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado = date('Y/m/d');

        // Asignar files hacia una variables
        if(!$titulo){
            $errores[]="Debes añadir un título.";
        }

        if(!$precio){
            $errores[]="Debes añadir un precio.";
        }

        // Validar tamaño de imágenes a 100 KB.
        //  $medida = 1000 * 100;

        // if($imagen['size'] > $medida || $imagen['error']){
        //     $errores[]="La imagen es muy grande.";
        // }

        if(!$descripcion){
            $errores[]="Debes añadir una descripción.";
        }

        if(strlen($descripcion) < 50){
            $errores[]="Debes escribir una descripción de al menos 50 caracteres.";
        }

        if(!$habitaciones){
            $errores[]="Debes añadir el número de habitaciones.";
        }

        if(!$wc){
            $errores[]="Debes añadir el número de cuartos de baño.";
        }

        if(!$estacionamiento){
            $errores[]="Debes añadir el número de estacionamientos.";
        }

        if(!$vendedorId){
            $errores[] = "Debes Elegir un vendedor";
        }

        //Revisar que el arreglo de errores esté vacío
        if(empty($errores)){
            //Crear carpeta
            $carpetaImagenes = '../../imagenes/';
            $nombreImagen = '';

            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }


            /* Subida de archivos*/

            if($imagen['name']){
                // Eliminar la imagen previa
                unlink($carpetaImagenes.$propiedad['imagen']);

                //generar un nombre único
                $nombreImagen = md5( uniqid(rand(), true) ).".jpg";

                //Subir la imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
            }else{
                $nombreImagen=$propiedad['imagen'];
            }

            //Actualizar propiedad en la Base de datos.
            $query = "UPDATE propiedades SET titulo = '{$titulo}', precio = {$precio}, imagen = '{$nombreImagen}', descripcion = '{$descripcion}', habitaciones = {$habitaciones}, wc = {$wc},  estacionamiento = {$estacionamiento},  vendedores_id = {$vendedorId} WHERE id={$id}";

            $resultado = mysqli_query($db, $query);

            if($resultado){
                //Redireccionar al usuario

                header('Location: /bienesraices/admin/index.php?resultado=2');
            }
        }
    }
?>

    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>

        <a href="../index.php" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Título propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio propiedad" min="0" value="<?php echo $precio; ?>">

                <label for="imagen">Imágen:</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png" value="<?php echo $imagen['name']; ?>">

                <img src="../../imagenes/<?php echo $imagenPropiedad; ?>" alt="imagen propiedad" class="imagen-small">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input 
                    type="number" 
                    id="habitaciones" 
                    name="habitaciones" 
                    placeholder="Ej. 3" 
                    min="1" 
                    max="9" 
                    value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej. 3" min="1" max="9" value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej. 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedor">
                    <option value="">Seleccione...</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                        <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre']. " " . $vendedor['apellido']; ?></option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
        </form>
    </main>

<?php        
    incluirTemplate('footer');
?>