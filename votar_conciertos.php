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
    // $user = $_SESSION["user"];
    $user = "hola3";
    $id_concierto = $_POST["id_concierto"];
    if (revisar($id_concierto, $user)==false) {
        votar($id_concierto, $user);
        
    } 
}



$query = TodosConciertos();

$query2 = array_shift(mysqli_fetch_array($query));
echo '<table>';
echo '<tr><td>' . 'Nombre' . '</td><td>' . 'fecha' . '</td><td>' . 'desc' . '</td><td>' . 'id_estilo' . '</td><td>' . 'id_ciudad' . '</td><td>' . 'votar' . '</td><td>' . 'puntos' . '</td></tr>';
echo '</table>';
foreach ($query as $key => $value) {
    extract($value);
    $suma = suma($id_concierto);
    extract(mysqli_fetch_array($suma));
    echo '<form action="" method="POST">';
    echo '<table>';
    echo '<tr><td>' . $nombre . '<input name="id_concierto" value=' . $id_concierto . '" style="display:none"></td><td>' . $fecha . '</td><td>' . $desc . '</td><td>' . $id_estilo . '</td><td>' . $id_ciudad . '</td><td>' . '<input type="submit"  name="boton1" class="button" value="VOTAR">' . '</td><td>' . $sum . '</td></tr></form>';
    echo '</table>';
}
?>


        </div>
    </body>
</html>
