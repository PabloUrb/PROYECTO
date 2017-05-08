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
function TodosConciertos(){
    
    $con = conectar();
    $query = mysqli_query($con, 'select * from concierto');
    
    return $query;
    
}
function TodosMusicos(){
    
    $con = conectar();
    $query = mysqli_query($con, 'select * from musico');
    
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

function votar($id_concierto, $user){
    $con = conectar();
    $query=  mysqli_query($con, "insert into valora(fan_username, id_concierto, val) values ('".$user."','".$id_concierto."',1)");
    return $query;
    
}
function votarmusico($musico_username){
    $con = conectar();
    $query=  mysqli_query($con, "insert into musico (musico_username, val) values ('".$musico_username."',1)");
    return $query;
    
}
function suma($id_concierto){
    $con = conectar();
    $query=  mysqli_query($con, "select sum(val) as sum from valora where id_concierto='$id_concierto'");
    return $query;
}
function sumamusico($musico_username){
    $con = conectar();
    $query=  mysqli_query($con, "select sum(val) as sum from musico where musico_username='$musico_username'");
    return $query;
}
function revisar($id_concierto, $user){
    $con = conectar();
    $query=  "SELECT * FROM valora where fan_username = '$user' and id_concierto = '$id_concierto'";
    $resultado = mysqli_query($con, $query);
    $filas = mysqli_num_rows($resultado);
    
    if ($filas > 0) {
        return true;
    } else {    // Este else no hace falta
        return false;
    }
}
?>