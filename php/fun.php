<?php

require_once 'conn.php';
function getRanking(){
    
    $con = conectar();
    $query = mysqli_query($con, 'select concierto.nombre, valora.val from concierto inner join valora on valora.id_concierto = concierto.id_concierto group by concierto.nombre order by valora.val desc limit 5');
    
    return $query;
    
}
function getConcierto(){
    
    $con = conectar();
    $query = mysqli_query($con, 'select concierto.nombre, concierto.fecha from concierto order by fecha asc');
    return $query;
}
?>