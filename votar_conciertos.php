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
    <body>
        <div id="votar1"><h1>Vota el concierto si te ha gustado</h1>
            <?php
            require_once 'php/fun.php';
            session_start();
            ?>
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
                //$user = $_SESSION["user"];
                $user = "d";
                $id_concierto = $_POST["id_concierto"];

                if (revisar($id_concierto, $user) == false) {
                    votar($id_concierto, $user);
                } else {
                    echo "<script>alert('ya has votado')</script>";
                }
            }

            foreach ($query as $key => $value) {
                extract($value);
                $suma = suma($id_concierto);
                extract(mysqli_fetch_array($suma));

                echo "<div id='concierto'>";
                echo '<form action="" method="POST">';
                echo '<input id="link-butt" type="submit"  name="boton1"  value="VOTAR">
                    <input name="id_concierto" value="' . $id_concierto . '" style="display:none">
			<div id="concierto-img">
				<img src="http://lorempixel.com/output/nightlife-q-c-300-150-6.jpg">
			</div>
			<div id="concierto-info">
<h2>' . $nombre . '</h2>
                <p>' . $fecha . '<br>
                ' . "descripción: " . $desc . '<br>' . "Ciudad: " . $id_ciudad . '<br>'
                . 'puntos: ' . $suma . '</p>';
                echo "</form>";


                echo'	</div>
		</div>';
            }
            ?>
        </div>
    </body>
</html>
