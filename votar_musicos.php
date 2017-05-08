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
        <div id="votar1"><h1>Vota el musico si te ha gustado</h1>
            <?php
            require_once 'php/fun.php';
            session_start();
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
    // $user = $_SESSION["user"];
    $user = "hola2";
    $musico_username = $_POST["musico_username"];
    if (revisar($musico_username, $user)==false) {
        votar($musico_username);
        
    } 
}



$query = TodosMusicos();

$query2 = array_shift(mysqli_fetch_array($query));
echo '<table>';
echo '<tr><td>' . 'nombrec' . '</td><td>' . 'nombreg' . '</td><td>' . 'nombrea' . '</td><td>' . 'web' . '</td><td>' . 'telef' . '</td><td>' . 'votar' . '</td><td>' . 'puntos' . '</td></tr>';
echo '</table>';
foreach ($query as $key => $value) {
    extract($value);
    $suma = sumamusico($musico_username);
    extract(mysqli_fetch_array($suma));
    echo '<form action="" method="POST">';
    echo '<table>';
    echo '<tr><td>' . $nombrec . '<input name="musico_username" value=' . $musico_username . '" style="display:none"></td><td>' . $nombreg . '</td><td>' . $nombrea . '</td><td>' . $web . '</td><td>' . $telef . '</td><td>' . '<input type="submit"  name="boton1" class="button" value="VOTAR">' . '</td><td>' . $sum . '</td></tr></form>';
    echo '</table>';
}
?>


        </div>
    </body>
</html>
