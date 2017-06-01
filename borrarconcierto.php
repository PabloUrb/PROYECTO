<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="borrar.css" rel="stylesheet" type="text/css"/>
        <title>Borrar concierto</title>
    </head>
    <body><div>
            <?php
            session_start();
            if (isset($_SESSION["user"])) {
                // Cogemos la variable de sesión y saludamos al usuario
                $username = $_SESSION["user"];
                
                require_once 'php/fun.php';
// Si ha pulsado borrar
                if (isset($_POST['borrar'])) {
                    // Recogemos la variable del post (el codigo postal)
                    $id_concierto = $_POST['concierto'];
                    BorrarConcierto($id_concierto);
                } else {
// Formulario que permite escoger ciudad al usuario
                    echo "<form action='' method='POST'>";
                    echo "Escoge el concierto que quieras borrar: ";
                    echo "<select name='concierto'>";
// Traemos los datos de las ciudades
                    $conciertos = selectAllConciertos($username);
                    while ($fila = mysqli_fetch_array($conciertos)) {
                        extract($fila);
                        // Mostramos el código postal y el nombre al usuario
                        // Pero como valor NECESITAMOS guardar el
                        // código postal que es lo que lo identifica en la bbdd
                        echo "<option value='$id_concierto'>$id_concierto-$nombre-$id_ciudad";
                        echo "</option>";
                    }
                    echo "</select>";
                    echo "<input type='submit' name='borrar' value='Borrar'>";
                    echo "</form>";
                }
            } else {
                echo "No estás autentificado.";
            }
            ?>

    </body>
</html>
