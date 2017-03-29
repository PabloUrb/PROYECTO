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
                <a href="./home.html">Inicio</a>
                <span>|</span>
                <a href="./grupos.html">Grupos</a>
                <span>|</span>
                <a href="./musicos.html">Musicos</a>
                <span>|</span>
                <a href="./registro.html">Registro</a>
            </div>
        </div>
        <br>


        <div id="mierda">
            <div id="login">
                <button type="submit" value="BOTON1" id="boton1">boton1</button>
                <button type="submit" value="BOTON2" id="boton2">boton2</button>
                <button type="submit" value="BOTON3" id="boton3">boton3</button>
                <button type="submit" value="BOTON4" id="boton4">boton4</button>
            </div>

        </div>

        <div id="alto">
            <div id="uno"><table id="tabla12"><tr id="concierto3">

                        <?php
                        require_once 'php/fun.php';

                        $query = getRanking();

                        $query2 = array_shift(mysqli_fetch_array($query));

                        foreach ($query as $key => $value) {
                            extract($value);

                            echo '<tr><td id="concierto3">' . $nombre . '</td></tr>';
                        }
                        ?>

                </table></div>
            <div id="granconcierto"><h3> gran concierto</h3></div>
        </div>            <div id="publi">
            <h3>publicidad</h3>
        </div>
        <div>
            <div id="table">
                <table id="tabla">
                    <?php
                    require_once 'php/fun.php';
                    $query = getConcierto();
                    extract($value);
                    $imagen ="tote.jpg";
                    echo '<td id="tabla"><img id="back-img" src="'.$imagen.'"> <span>'.$nombre. '</span><br><span>' .$fecha.'</span></td>'; 
                    
                    
                    ?>

                    <!--para poner comentarios-->

                </table></div>
        </div>
        <div id="footer"><div id="footer1">
                <span id="span">®Copyright algun nombre de empresa 2016</span><br>
                <a href="faq.php">PREGUNTAS FRECUENTES</a><br></div>
            <div id="footer2">correoelectronico: pene@gmail.com<br>
                nº de contacto: 661883344 <br></div>
        </div>
    </body>
</html>
