<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="votar.css" rel="stylesheet" type="text/css"/>
        <title>VOTAR CONCIERTO</title>
    </head>
    <body> <?php
        session_start();
        $_SESSION["user"] = "pablo";
        if (isset($_SESSION["user"])) {
            // Cogemos la variable de sesión y saludamos al usuario
            $user = $_SESSION["user"];

            require_once 'php/fun.php';
// Si ha pulsado borrar
            ?><div id="votar1"><h1>Apuntate a algun concierto</h1>
                <div id="algo">
                    <?php
                    require_once 'php/fun.php';
                    echo "<form action='' method='POST'>";

                    $query = TodosConciertos();
                    $query2 = array_shift(mysqli_fetch_array($query));
                    ?>
                </div>


                <?php
                require_once 'php/fun.php';

                if (isset($_POST["boton1"])) {
                    // $user = $_SESSION["user"];

                    $id_concierto = $_POST["id_concierto"];
                    if (revisarAcude($id_concierto, $user) == false) {
                        apuntarse($id_concierto, $user);
                    }else{
                    echo "<script>alert('ya estas apuntado')</script>";
                    }
                }

                $query = TodosConciertosFuturos();
                $query2 = array_shift(mysqli_fetch_array($query));
                
                foreach ($query as $key => $value) {
                    extract($value);
                    
                     
                    
                    echo "<div id='concierto'>";
                    echo '<form action="" method="POST">';
                    echo '<input id="link-butt" type="submit"  name="boton1" class="button" value="APUNTARSE">
			<div id="concierto-img">
				<img src="http://lorempixel.com/output/nightlife-q-c-300-150-6.jpg">
			</div>
			<div id="concierto-info">
                         <h2>' . $nombre . '</h2>
                <p>'."Ciudad: " . $id_concierto . '<br>
                ' . "fecha: " . $fecha . '<br>' . "desc: " . $desc . '<br></p>'
                            . '<input name="id_concierto" value=' . $id_concierto . ' style="display:none">';

                    echo'	</div>
		</div>';
                }
                ?>
                <?php
            } else {
                echo "No estás autentificado.";
            }
            ?>

        </div>
    </body>
</html>
