<?php
    require 'includes/config/database.php';
    $db = conectarDB();

    $errores = [];

    //Autenticar el usuario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = mysqli_real_escape_string($db, filter_var($_POST['email'],FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email){
            $errores[] = "El email es obligatorio o no es válido";
        }

        if(!$password){
            $errores[] = "El password es obligatorio";
        }

        if(empty($errores)){
            //Revisar si el usuario existe.
            $query = "SELECT * FROM usuarios WHERE email = '{$email}' ";
            $resultado = mysqli_query($db, $query);

            if($resultado->num_rows){
                //Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);

                //Verificar si el pass es correcto o no
                $auth = password_verify($password,$usuario['password']);

                if($auth){
                    //El usuario está autenticado
                    session_start();

                    // Llenar el arreglo de la sesión
                    $_SESSION['usuario']=$usuario['email'];
                    $_SESSION['login']= true;

                    header('Location: /bienesraices/admin/index.php');

                }else{
                    //El password es incorrecto
                    $errores[]='El password es incorrecto';
                }
            }else{
                $errores[] = 'El usuario no existe';
            }
        }
    }

    //incluye el header
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = false);
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST">
            <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Tu email" id="email" required>

                <label for="password">password</label>
                <input type="password" name="password" placeholder="Tu password" id="password" required>

            </fieldset>

            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>
    </main>

<?php        
    incluirTemplate('footer');
?>