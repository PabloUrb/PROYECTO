<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>HOME</title>
        <link href="OTRA.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="loader.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body onload="loader()" id="body">

        <script type="text/javascript">

            function loader() {

                setTimeout(function () {
                    var d = document.getElementById("body");
                    d.className += " loaded";
                }, 500);

            }
            ;

        </script>

        <div id="loader-wrapper">

            <div id="loader">

            </div>
            <img width="200px" src="./img/logo.png">
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>

        </div>

        <div id="main-top">
            <div id="logo"><img class="avatar" src="./img/logo.png" alt="avatar" title="Imagen de avatar"/></div>

            <div id="redes">
                <form action="search.php" method="POST">
                    <input type="text" name="search">
                    <button id="buscar" type="submit" value="Submit"/>Buscar</button>
                </form>
                <br>
                <div id="conjunto">
                    <div id="login">
                        <button id="login-butt">Login</button>
                        <div id="log-form">
                            <form action="login.php" method="POST">
                                <input type="text" name="user" placeholder="Usuario..." required>
                                <br>
                                <input type="password" name="pass" placeholder="Contraseña..." required>
                                <br>
                                <button type="submit">Entrar</button>
                            </form>
                        </div>
                    </div>
                    <div id="social">
                        <button id="face" type="submit" onclick="location.href = 'http://www.facebook.com';" value="Facebook"/></button>
                        <button id="twit" type="submit" onclick="location.href = 'http://www.twitter.com';" value="Twitter"/></button>
                        <button id="insta" type="submit" onclick="location.href = 'http://www.instagram.com';" value="Instagram"/></button>
                    </div>
                </div>
            </div>
            <div id="menu">
                <a href="index.php">Inicio</a>
                <span>|</span>
                <a href="./grupos.html">Grupos</a>
                <span>|</span>
                <a href="./musicos.html">Musicos</a>
                <span>|</span>
                <a href="./registro.html">Registro</a>
            </div>
        </div>
        <br>

    </div>

    <div id="alto"><h1>Ranking Conciertos</h1>
        <div id="uno"><table id="tabla12">

                <?php
                require_once 'php/fun.php';

                $query = getRanking();
                $query2 = array_shift(mysqli_fetch_array($query));

                foreach ($query as $key => $value) {
                    extract($value);
                    $suma = suma($id_concierto);
                    extract(mysqli_fetch_array($suma));
                    echo '<tr style="height: 0px"><td id="concierto3">' . "<h4> " . $nombre . '</h4>' . "Descripcion: " . $desc . "   Ciudad: " . $id_ciudad . "   Puntos: " . $suma . "   Fecha: " . $fecha . '</td></tr>';
                }
                ?>

            </table></div>
        <div id="granconcierto">
            <?php
            require_once 'php/fun.php';
            $query = getMejorConcierto();
            $query2 = array_shift(mysqli_fetch_array($query));
            foreach ($query as $key => $value) {
                extract($value);
                $suma = suma($id_concierto);
                extract(mysqli_fetch_array($suma));
                echo "<h2>" . $nombre . "</h2>" . "Descripcion: " . $desc . "<br>" . "Ciudad: " . $id_ciudad . "<br>" . "Puntos: " . $suma . "<br>" . "Fecha: " . $fecha;
            }
            ?>
        </div>
    </div>          
    <div style="width: 100%; height: 100%; margin-top: 30px;"><h1></h1>  
        <div style="width: 100%; height: 100%;"> 
            <div style="margin: 0 auto; width: 100%;" id="tabla">
                <?php
                require_once 'php/fun.php';

                $query = getConcierto();

                if (isset($_POST["Inscribirse"])) {

                    if (insertarasistencia($_SESSION["user"], $_POST['concierto'])) {

                        header("Location: index.php");
                    }
                }

                if (isset($_POST["Desinscribirse"])) {

                    if (quitarasistencia($_SESSION["user"], $_POST['concierto'])) {
                        header("Location: index.php");
                    }
                }
                
                foreach ($query as $key => $value) {
                    extract($value);

                    $imagen = "tote.jpg";

                    echo '<div style="padding-right: 0px; padding-left: 0px; color: white; height: 250px; border: 2px solid white; border-radius: 10px;" class="col-md-3"><img style="width: 100%; position: absolute; z-index: -1;" id="back-img" src="' . $imagen . '"> <span>' . "Concierto numero:" . $id_concierto . '</span><br> <span>' . $nombre . '</span><br><span>' . $fecha . '</span> <br> '
                    . '<span>';

                    $_SESSION["tipo"] = "musico";
                    $_SESSION["user"] = "manelelmusico";

                    if (isset($_SESSION["tipo"])) {

                        if ($_SESSION["tipo"] == "musico") {

                            if (verificarasis($_SESSION["user"], $id_concierto) == true) {

                                echo 'Estas inscrito';
                                echo '<form action="" method="post"> <input type="hidden" name="concierto" value="' . $id_concierto . '"> <input type="submit" name="Desinscribirse" value="Desinscribirse               "></form>';
                            } else {
                                echo '<form action="" method="post"> <input type="hidden" name="concierto" value="' . $id_concierto . '"> <input type="submit" name="Inscribirse" value="Inscribirse                     "></form>';
                            }
                        }
                    }
                    echo '</div>';
                }
                ?>

                <!--para poner comentarios-->

            </div></div>
    </div>
    <div id="footer"><div id="footer1">
            <span id="span">®Copyright algun nombre de empresa 2016</span><br><br></div>
        <div id="footer2">correoelectronico: hola@gmail.com<br>
            nº de contacto: 661883344 <br></div>
    </div>
</body>
</html>
