<?php
    //Código necesario para crear un usuario en la tabla usuarios, para probar la validación de usuarios.
    
    // Importar la conexion
    require 'includes/config/database.php';
    $db = conectarDB();

    //Crear un email y passwd
    $email = "correo@correo.com";
    $password = "123456";

    $passwordHash = password_hash($password,PASSWORD_DEFAULT);

    var_dump($passwordHash);

    //Qquery para crear el usuario
    $query = "INSERT INTO usuarios (email, password) VALUES ('{$email}','{$passwordHash}');";

    //Agregarlo a la BD
    mysqli_query($db, $query);
?>