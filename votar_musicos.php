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
        <title>VOTAR MUSICO</title>
    </head>


    <body>
        <div id="tituloss" style="text-align: center"><h1>Vota el concierto si te ha gustado</h1>
            <?php
            session_start();
            $_SESSION["user"] = "f";
            if (isset($_SESSION["user"])) {
                require_once 'php/fun.php';
                ?>
                <div id="algo">
                    <?php
                    require_once 'php/fun.php';
                    echo "<form action='' method='POST'>";

                    $query = TodosMusicos();
                    $query2 = array_shift(mysqli_fetch_array($query));
                    ?>
                </div>


                <?php
                require_once 'php/fun.php';

                if (isset($_POST["boton1"])) {
                    $user = $_SESSION["user"];

                    $musico_username = $_POST["musico_username"];
                    if (revisarmusico($musico_username, $user) == false) {
                        votarmusico($musico_username, $user);
                    } else {
                        echo "<script>alert('ya has votado')</script>";
                    }
                }
                $query = TodosMusicos();

                $query2 = array_shift(mysqli_fetch_array($query));
                foreach ($query as $key => $value) {
                    extract($value);
                    $suma = sumamusico($musico_username);
                    extract(mysqli_fetch_array($suma));


                    echo "<div id='concierto'>";
                    echo '<form action="" method="POST">';
                    echo '<input id="link-butt" type="submit"  name="boton1"  value="VOTAR">
			<div id="concierto-img">
				<img src="http://lorempixel.com/output/nightlife-q-c-300-150-6.jpg">
			</div>
			<div id="concierto-info">
                         <h2>' . $musico_username . '</h2>
                <p>' . $nombrec . "  " . $nombreg . '<br>
                ' . "contacto: " . $web . '<br>' . "telefono: " . $telef . '<br>'
                    . 'puntos: ' . $sum . '</p>'
                    . '<input name="musico_username" value=' . $musico_username . ' style="display:none">';
                    echo "</form>";
                    echo'	</div>
                        
		</div>';
                }
            } else {
                echo "No estás autentificado.";
            }
            ?>


        </div>
    </body>
</html>
