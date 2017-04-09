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
        <title></title>
    </head>
    <body>
        <div>
            <table>

                <?php
                require_once 'php/fun.php';

                $query = TodosConciertos();
                $query2 = array_shift(mysqli_fetch_array($query));
                echo '<tr><td>' . 'Nombre'. '</td><td>' . 'fecha' . '</td><td>' . 'desc' . '</td><td>' . 'id_estilo' . '</td><td>' . 'id_ciudad' . '</td></tr>';
                foreach ($query as $key => $value) {
                    extract($value);
                    
                    echo '<tr><td>' . $nombre . '</td><td>' . $fecha . '</td><td>' . $desc . '</td><td>' . $id_estilo . '</td><td>' . $id_ciudad . '</td></tr>';
                }
                ?>

            </table>
        </div>
    </body>
</html>
