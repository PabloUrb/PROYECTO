<!DOCTYPE html>
<!--  Formulario para modificar perfil del usuario -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar contraseña</title>
        <link href="votar.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div>
            <?php
            session_start();
            $_SESSION["user"] = "pablo";
            require_once 'php/fun.php';
            if (isset($_SESSION["user"])) {
                $username = $_SESSION["user"];
                if (isset($_POST["modificar"])) {
                    $pass = $_POST["pass"];
                    $npass = $_POST["npass"];
                    $npass2 = $_POST["npass2"];

                    if ($npass == $npass2) {
                        
                        if (verificarUser($username, $pass)) {  
                            if(vericarContra($username, $pass)){
                            $passcif=  password_hash($npass, PASSWORD_DEFAULT);
                       
                        updateUser($username, $passcif);}
                            }
                         
                        }
                     else {
                        echo "<p>Las contraseñas no coinciden</p>";
                    }
                } else {
                    // Traemos los datos actuales del usuario
                    $datos = getUser($username);
                    $fila = mysqli_fetch_array($datos);
                    extract($fila);
                    echo "<div id='modificar'>";
                    echo "<form action='' method='POST'>";
                    echo "<h1>Perfil de $username</h1>";
                    echo "<p>Password actual: <input id='id_concierto' type='password' name='pass' value=''></p>";
                    echo "<p>Nueva Password: <input id='id_concierto' type='password' name='npass'></p>";
                    echo "<p>Confirmación de la Nueva Password: <input id='id_concierto' type='password' name='npass2'></p>";
                    echo "<p><input id='link-butt' type='submit' name='modificar' value='Modificar'></p>";
                    echo "</form>";
                    echo "</div>";
                }
                
                
            } else{
                echo "Usuario no autentificado";
                echo "<a href='index.php'>menu principal</a>";
            }
            ?>


        </div>
    </body>
</html>
