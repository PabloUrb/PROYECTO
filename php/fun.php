<?php

require_once 'conn.php';
function getRanking(){
    
    $con = conectar();
    $query = mysqli_query($con, 'select concierto.nombre, valora.val 
from concierto 
inner join valora 
on valora.id_concierto = concierto.id_concierto 
where concierto.id_concierto !=
	(select concierto.id_concierto from concierto inner join valora 
on valora.id_concierto = concierto.id_concierto group by concierto.nombre 
order by valora.val desc limit 1) 
group by concierto.nombre 
order by valora.val desc limit 4');
    
    return $query;
    
}
function getMejorConcierto(){
    
    $con = conectar();
    $query = mysqli_query($con, 'select concierto.nombre, valora.val 
from concierto 
inner join valora 
on valora.id_concierto = concierto.id_concierto  
group by concierto.nombre 
order by valora.val desc limit 1');
    
    return $query;
    
}
function getConcierto(){
    
    $con = conectar();
    $query = mysqli_query($con, 'select concierto.nombre, concierto.fecha from concierto order by fecha asc');
    return $query;
}
?>